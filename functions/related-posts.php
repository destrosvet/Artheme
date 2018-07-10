<?php

/**
 * Related Posts
 *
 */
function artalk_get_related_posts($post_id = null, $args = '', $stop_tags = array(), $stop_cats = array())
{

    // Settings
    $addup = true; // whether to add up by cats to by tags or use only as a fallback
    $stop_tags = array('Svět', 'Česko', 'Slovensko', 'Praha', 'Brno'); // @TODO get from args or options
    $stop_cats = array('Artservis', 'Service', 'E-mail newsletter'); // @TODO get from args or options
    $load_from_cache = !is_user_logged_in();
    $log = WP_DEBUG && current_user_can('update_core');
    if ($log) {
        error_log(' ');
    }
    // No ID no fun
    if (!absint($post_id) && is_main_query()) {
        if (!$post_id = get_the_ID()) {
            if ($log) {
                error_log('>>> artalk_get_related_posts(): ' . 'MISSING OR WRONG ID');
            }
            return false;
        }
    }
    // Try cache
    if ($load_from_cache && $cached_posts_ids = get_transient('artalk_related_posts_for_' . $post_id)) {
        if ($cached_posts = get_posts(array('post__in' => $cached_posts_ids))) {
            if ($log) {
                error_log('>>> artalk_get_related_posts(): ' . 'LOADING FROM CACHE');
            }
            return $cached_posts;
        }
    }
    // Set shared args
    // @TODO merge with passed $args
    $args = array(
        'post_type' => array('post', 'blacksquare'),
        'post__not_in' => array($post_id),
        'posts_per_page' => 5,
    );
    // Get by current tags
    // @TODO/IDEA get by two or more tags first by separating tags into two or more groups and searching for posts who match at least on of both
    // @TODO/IDEA simpler version just with 'AND' operator??
    if ($log) {
        error_log('>>> artalk_get_related_posts(): ' . 'LOADING BY TAGS');
    }
    $post_tags = wp_get_object_terms($post_id, 'post_tag', array('orderby' => 'count', 'order' => 'DESC', 'fields' => 'all'));
    $post_tags_ids = array();
    foreach ($post_tags as $key => $post_tag) {
        if (!in_array($post_tag->name, $stop_tags)) {
            $post_tags_ids[] = $post_tag->term_id;
            if ($log) {
                error_log('>>> artalk_get_related_posts(): ' . 'ADDED TAG ' . $post_tag->name);
            }
        }
    }
    if ($log) {
        error_log('>>> artalk_get_related_posts(): ' . count($post_tags_ids) . '/' . count($post_tags) . ' TAGS VALID');
    }
    $args['tax_query'] = array(
        array(
            'taxonomy' => 'post_tag',
            'field' => 'term_id',
            'terms' => $post_tags_ids,
            //'operator' => '' /// ???
        ),
    );
    $related_posts = get_posts($args);
    $related_posts_count = $related_posts ? count($related_posts) : 0;
    if ($log) {
        error_log('>>> artalk_get_related_posts(): ' . 'FOUND ' . $related_posts_count . ' POSTS BY TAGS');
    }
    $related_posts_ids = array();
    foreach ($related_posts as $related_post)
        $related_posts_ids[] = $related_post->ID; // or add to post__not_in
    // if empty or incomplete add up by current category
    if ($related_posts_count < $args['posts_per_page']) {
        $post_cats = wp_get_object_terms($post_id, 'category', array('orderby' => 'count', 'order' => 'DESC', 'fields' => 'all'));
        $post_cats_ids = array();
        foreach ($post_cats as $key => $post_cat) {
            if (!in_array($post_cat->name, $stop_cats)) {
                if ($log) {
                    error_log('>>> artalk_get_related_posts(): ' . 'ADDED CAT ' . $post_cat->name);
                }
                $post_cats_ids[] = $post_cat->term_id;
            }
        }
        $args['post__not_in'] = array_merge($args['post__not_in'], $related_posts_ids);
        $args['posts_per_page'] = $args['posts_per_page'] - $related_posts_count;
        $args['tax_query'] = array(
            array(
                'taxonomy' => 'category',
                'field' => 'term_id',
                'terms' => $post_cats_ids,
            ),
        );
        $related_by_cat = get_posts($args);
        $related_posts = array_merge($related_posts, $related_by_cat);
        if ($log) {
            error_log('>>> artalk_get_related_posts(): ' . 'FOUND ' . count($related_by_cat) . ' POSTS BY CAT');
        }
    }
    // if still empty return false ... any better idea???
    if (!$related_posts)
        return false;
    // save into cache
    // @TODO get only ids with get_posts
    $cache_time = 120;
    $related_posts_ids = array();
    // @TODO DRY
    foreach ($related_posts as $related_post) {
        $related_posts_ids[] = $related_post->ID;
    }
    // Set cache
    set_transient('artalk_related_posts_for_' . $post_id, $related_posts_ids, $cache_time);
    return $related_posts;
}
