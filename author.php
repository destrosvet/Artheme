<?php
/**
 * Author Template
 * User: Filip Uhlir
 * Date: 22.08.2017
 * Time: 12:32
 */
?>
<?php get_header();?>
    <div class="row main-magazine author-archive">
    <div class="bar-info">
        <div class="col-md-8 col-sm-6 col-xs-12 small-left-padding">Nejnovější články</div>
        <div class="col-md-4 col-sm-6"></div>
    </div>
    <?php get_template_part('templates/sidebar-author-bio'); ?>
    <div id="posts" class="col-md-8 col-sm-12 col-xs-12 noleftpadding norightpadding" >
        <?php
        $author = get_user_by( 'slug', get_query_var( 'author_name' ) );
        $author_id =$author->ID;
        $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
            $query = new WP_Query(array(
                'post_type' => 'post',
                'ignore_sticky_posts' => true,
                'paged' => $paged,
                'posts_per_page' => 10,
                'author' => $author_id
            ));
        ?>

        <?php while ($query -> have_posts()) : $query->the_post(); ?>

            <?php get_template_part('templates/post-artservis', artalk_get_current_category() ); ?>

        <?php endwhile; ?>
        <?php getFurtherContentButton(0,0,$author_id); ?>

    </div>

<?php wp_reset_query(); ?>

<?php get_template_part('templates/sidebar-author'); ?>
<?php get_sidebar(); ?>
<?php get_footer(); ?>
