<?php

/* 
    Created on : 5.2.2016, 12:02:05
    Author     : Filip Uhlir
    Description: Utils for Artheme
*/

 /**
   * Get current category slug
   */
  function artalk_get_current_category($field='slug') {
    if ( is_search() )
      return 'search';
    if ( ! is_category() )
      return false;
    return get_category(get_query_var('cat'))->slug;
  }

  function artalk_get_post_headings($post=null) {
    if ( ! $post || empty($post->post_content) )
      return array();
    // preg_match_all('|<h[^>]+>(.*)</h[^>]+>|iU', $post->post_content, $headings);
    preg_match_all('|<h2>(.*)</h2>|iU', $post->post_content, $headings);
    if ( empty($headings) || empty($headings[1]) )
      return array();
    $headings = $headings[1];
    $headings = array_map('wp_strip_all_tags',$headings);
    $headings = array_map('artalk_remove_more_tag',$headings);
    $headings = array_map('artalk_remove_headings_numbers',$headings);
    $headings = array_filter($headings);
    return $headings;
  }
  /**
   * Featured posts by Mau
   */
  
  function artalk_get_featured_posts($args='') {

  $defaults = array(
    'post_type'      => 'post',
    'posts_per_page' => 1,
    'meta_key'       => '_mau_feat_order',
    'orderby'        => '_mau_feat_order',
    'order'          => 'ASC',
  );
  $args = wp_parse_args( $args, $defaults );
  $featured = get_posts( $args );
  $feat_count = count($featured );

  // add up missing places from normal posts
  if ( $feat_count < $args['posts_per_page'] ) {
    unset($args['meta_key']);
    $args['posts_per_page'] = $args['posts_per_page'] - $feat_count;
    $args['orderby'] = 'post_date';
    $args['order']   = 'DESC';
    $featured = array_merge( $featured, (array) get_posts($args) );
  }

  return $featured;
}

/**
   * Custom excerpt output by Mau
   */
  function artalk_get_the_excerpt( $post_ID = null, $excerpt_length = null , $excerpt_more = null, $allowed_tags = '<a>', $trimChar = null ) {

  	//global $post;
  	$post_obj = get_post($post_ID);
  	if ( ! $post_obj )
  		return false;

    if ( ! $excerpt_length = absint($excerpt_length) )
      $excerpt_length = apply_filters('excerpt_length', 55);

    if ( ! is_string($excerpt_more) )
      $excerpt_more = apply_filters('excerpt_more', ' ...');

    $text = empty( $post_obj->post_excerpt ) ? $post_obj->post_content : $post_obj->post_excerpt;

    $text = strip_shortcodes( $text );
    $text = apply_filters('the_content', $text);
    $text = str_replace(']]>', ']]&gt;', $text);
    $text = strip_tags($text,$allowed_tags);

    $words = preg_split("/[\n\r\t ]+/", $text, $excerpt_length + 1, PREG_SPLIT_NO_EMPTY);
    if ( count($words) > $excerpt_length ) {
        array_pop($words);
        $text = implode(' ', $words);
        if ($trimChar && $trimChar < strlen ( $text )){
            $text = short_title_text_letter ($text,'',$trimChar);
        }

        $text = $text . $excerpt_more;
    } else {
        $text = implode(' ', $words);
    }

    $text = force_balance_tags($text);

    $text = wpautop($text);

  	return $text;

  }
  /* FOOTER */
	add_action( 'artalk_copyright', 'artalk_copyright' );
	function artalk_copyright() {
		$s_year = 2007;
		$c_year = date('Y');
		$year = $s_year == $c_year ? $s_year : "$s_year - $c_year";
		echo "&copy; COPYRIGHT $year Artalk.cz. Jakékoliv užití obsahu včetně převzetí, šíření či dalšího zpřístupňování článků a fotografií je bez souhlasu Artalk z.s., zakázáno.";
	}

/**
 * Popular Posts by Destrosvet
 */

function recent_popular_posts($post_id) {
    $count_key = 'popular_posts';
    $count = get_post_meta($post_id, $count_key, true);
    if ($count == '') {
        $count = 0;
        delete_post_meta($post_id, $count_key);
        add_post_meta($post_id, $count_key, '0');
    } else {
        $count++;
        update_post_meta($post_id, $count_key, $count);
    }
}
function recent_track_posts($post_id) {
    if (!is_single()) return;
    if (empty($post_id)) {
        global $post;
        $post_id = $post->ID;
    }
    recent_popular_posts($post_id);
}
add_action('wp_head', 'recent_track_posts');


/**
 * Test whether current post is in artservis category or descendant
 */
function artalk_in_artservis($categoryID=0 , $args='') {
    //@TODO set and get cat dynamically
    $servis_category = 'artservis';
    if (!$categoryID)
    {

        if ( is_category() ) {
            $curent_category = artalk_get_current_category();
            return $servis_category == $curent_category || artalk_term_is_descendant( $curent_category, $servis_category );
        }
        if ( is_single() ) {
            $post_categories = wp_get_object_terms( get_the_ID(), 'category', array('fields'=>'slugs') );
            return in_array($servis_category, $post_categories) || artalk_term_is_descendant( $post_categories, $servis_category );
        }
        return false;
    }
    else
    {
        $servisID = get_cat_ID('Service');
        return cat_is_ancestor_of($servisID,$categoryID);
    }
}
/**
 * Test whether any of the terms is a descendant of the ancestor term
 *
 * @param (string|array) $terms Term slug or an array of slugs to check
 * @param (string) $ancestor Term slug of the ancestor
 * @param (string) $taxonomy Taxonomy to check
 *
 * @return (bool)
 */
function artalk_term_is_descendant( $terms=array(), $ancestor='', $taxonomy='category' ) {
    if ( empty($terms) || empty($ancestor) )
        return false;
    if ( ! $ancestor = get_term_by( 'slug', $ancestor, $taxonomy ) )
        return false;
    $descendants = get_term_children( $ancestor->term_id, $taxonomy );
    if ( empty($descendants) || is_wp_error($descendants) )
        return false;
    foreach ( (array) $terms as $term ) {
        if ( ! $term = get_term_by( 'slug', $term, $taxonomy ) )
            continue;
        if ( in_array($term->term_id, $descendants) )
            return true;
    }
    return false;
}

function template_part( $atts, $content = null ){
    $tp_atts = shortcode_atts(array(
        'path' =>  null,
    ), $atts);
    ob_start();
    get_template_part($tp_atts['path']);
    $ret = ob_get_contents();
    ob_end_clean();
    return $ret;
}
add_shortcode('template_part', 'template_part');

function load_template_part($template_name, $part_name=null) {
    ob_start();
    get_template_part($template_name, $part_name);
    $var = ob_get_contents();
    ob_end_clean();
    return $var;
}

function feat_get_author( $post_id = 0 ){
    $post = get_post( $post_id );
    return $post->post_author;
}
function short_title($after = '', $length) {
	$mytitle = explode(' ', get_the_title(), $length);
//	$title = explode(' ', get_the_title(), $length);
	if (count($mytitle)>=$length) {
		array_pop($mytitle);
		$mytitle = implode(" ",$mytitle). $after;
	} else {
		$mytitle = implode(" ",$mytitle);
	}
	return $mytitle;
}
function short_title_text($text, $after = '', $length) {
	$mytitle = explode(' ', $text, $length);

	if (count($mytitle)>=$length) {
		array_pop($mytitle);
		$mytitle = implode(" ",$mytitle). $after;
	} else {
		$mytitle = implode(" ",$mytitle);
	}
	return $mytitle;
}
/**
 * Shortens an UTF-8 encoded string without breaking words.
 * based on https://wordpress.stackexchange.com/questions/11085/truncating-custom-fields/11089#11089
 * @param  string $string     string to shorten
 * @param  int    $max_chars  maximal length in characters
 * @param  string $append     replacement for truncated words.
 * @return string
 */
function short_title_text_letter($text,$after = '',$max_chars = 100) {


        $text = strip_tags( $text );
        $text = html_entity_decode( $text, ENT_QUOTES, 'utf-8' );
        // \xC2\xA0 is the no-break space
        $text = trim( $text, "\n\r\t .-;–,—\xC2\xA0" );
        $length = strlen( utf8_decode( $text ) );

        // Nothing to do.
        if ( $length < $max_chars )
        {
            return $text;
        }

        // mb_substr() is in /wp-includes/compat.php as a fallback if
        // your the current PHP installation doesn’t have it.
        $text = mb_substr( $text, 0, $max_chars, 'utf-8' );

        // No white space. One long word or chinese/korean/japanese text.
        if ( FALSE === strpos( $text, ' ' ) )
        {
            return $text . $after;
        }

        // Avoid breaks within words. Find the last white space.
        if ( extension_loaded( 'mbstring' ) )
        {
            $pos   = mb_strrpos( $text, ' ', 'utf-8' );
            $short = mb_substr( $text, 0, $pos, 'utf-8' );
        }
        else
        {
            // Workaround. May be slow on long strings.
            $words = explode( ' ', $text );
            // Drop the last word.
            array_pop( $words );
            $short = implode( ' ', $words );
        }

        return $short . $after;

/*    $text = preg_replace(" (\[.*?\])",'',$text);
    $text = strip_shortcodes($text);
    $text = strip_tags($text);
    $text = mb_substr($text, 0, $letters);

    $text = mb_substr($text, 0, mb_strripos($text, " "));
    var_dump($text);
    $text = trim(preg_replace( '/\s+/', ' ', $text));*/
    //$text .= $after;
/*    $myTitle=$text;
    if (preg_match('/^.{1,'.$letters.'}\b/s', $text, $match))
    {
        $myTitle = $match[0]. $after;
    }*/
    //return $text;
}



function ns_filter_avatar($avatar, $id_or_email, $size, $default, $alt, $args)
{
	$headers = @get_headers( $args['url'] );
	if( ! preg_match("|200|", $headers[0] ) ) {
		return;
	}
	return $avatar;
}
add_filter('get_avatar','ns_filter_avatar', 10, 6);


//function get_the_content_reformatted ($var, $more_link_text = '(more...)', $stripteaser = 0, $more_file = '') {
//	$content = get_the_content($more_link_text, $stripteaser, $more_file);
//	$content = apply_filters('the_content', $content);
//	$content = str_replace(range(700,1400), $var, $content);
//	return $content;
//}

// regex pokusy

//add_filter('the_content', 'add_image_responsive_class');
//function filter_images($content){
//	return preg_replace('/<img (.*) \/>\s*/iU', '<span class="className"><b><img \1 /></b></span>', $content);
//}
//
//add_filter('the_content', 'filter_images');
//function filter_p($content){
//    return preg_replace('/<p>\s*/iU', '<span class="class"> </span>', $content);
//}
//
//add_filter('the_content', 'filter_p');

//function insert_inline_style( $content = null ){
//
//	if( null === $content )
//		return $content;
//
//	return str_replace( '<p>', '<p style="color:red;width: 200px;">', $content );
//
//}
//add_filter( 'the_content', 'insert_inline_style', 10, 1 );


// responsive images auto class
//function add_image_responsive_class($content) {
//	global $post;
//	$pattern ="/<img(.*?)class=\"(.*?)\"(.*?)>/i";
//	$replacement = '<img$1class="$2 img-responsive"$3>';
//	$content = preg_replace($pattern, $replacement, $content);
//	return $content;
//}
//add_filter('get_the_content', 'add_image_responsive_class');
//

//function remove_comment_fields($fields) {
//	unset($fields['comment-notes']);
//	return $fields;
//}
//add_filter('comment_form_default_fields','remove_comment_fields');

//function fb_unautop_references( $content ) {
//
//    $content =  preg_replace('<a href="_ftnref">', '<b class="class"> </b>', $content);
//    return $content;
//}
//add_filter( 'the_content', 'fb_unautop_references', 98 );

// end regex pokus;


//apply_filters('the_content',get_the_content()) ;

//function filter_images($content){
//	return preg_replace('/<img (.*) \/>\s*/iU', '<div class="col-md-12 responsive"><img \1 /></div>', $content);
//}
//add_filter('the_content', 'filter_images');
//add_theme_support( 'post-thumbnails' );
//remove_filter( 'the_content', 'wp_make_content_images_responsive' );

function add_custom_query_var( $vars ){
    $vars[] = "c";
    return $vars;
}
add_filter( 'query_vars', 'add_custom_query_var' );

function define_class ($args) {/*== Set classes of menu container ==*/
	$args['container_class'] = str_replace(' ','-',$args['theme_location']).'-nav'; return $args;
}
add_filter ('wp_nav_menu_args', 'define_class');

//add_image_size( 'wp-post-image', 700, 200, true );
//add_image_size( 'img-responsive wp-post-image', 700, 200, true );

/**
 * Filter the except length to 20 words.
 *
 * @param int $length Excerpt length.
 * @return int (Maybe) modified excerpt length.
function wpdocs_custom_excerpt_length( $length ) {
	return 15;
}
add_filter( 'excerpt_length', 'wpdocs_custom_excerpt_length', 999 );

/**
 * Filter the excerpt "read more" string.
 *
 * @param string $more "Read more" excerpt string.
 * @return string (Maybe) modified "read more" excerpt string.
 */
function wpdocs_excerpt_more( $more ) {
	return '';
}

// Load JS script with Ajax
function misha_my_load_more_scripts() {
//    global $wp_query;
//    $published_posts = wp_count_posts()->publish;
//    $posts_per_page = get_option('posts_per_page');
//    $page_number_max = ceil($published_posts / $posts_per_page);

    // In most cases it is already included on the page and this line can be removed
    wp_enqueue_script('jquery');

    // register our main script but do not enqueue it yet
    wp_register_script( 'my_loadmore', get_stylesheet_directory_uri() . '/assets/scripts/ajax-scripts.js', array('jquery') );
    // now the most interesting part
    // we have to pass parameters to myloadmore.js script but we can get the parameters values only in PHP
    // you can define variables directly in your HTML but I decided that the most proper way is wp_localize_script()
    wp_localize_script( 'my_loadmore', 'ajax', array(
//        'ajaxurl' => site_url() . '/wp-admin/admin-ajax.php', // WordPress AJAX
//        'query_vars' => json_encode( $wp_query->query )
        'ajaxurl' => site_url() . '/wp-admin/admin-ajax.php', // WordPress AJAX
//            'posts' => serialize( $wp_query->query_vars ), // everything about your loop is here
//            'current_page' => get_query_var( 'paged' ) ? get_query_var('paged') : 1,
    ) );

    wp_enqueue_script( 'my_loadmore' );
}
add_action( 'wp_enqueue_scripts', 'misha_my_load_more_scripts' );


add_filter( 'excerpt_more', 'wpdocs_excerpt_more' );

// Get Id from category name
function get_category_id(){
    $category = get_queried_object();
    return $category->term_id;
}
