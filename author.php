<?php
/**
 * Author Archive Template
 * User: Filip Uhlir
 * Date: 22.08.2017
 * Time: 12:32
 */
?>
<?php get_header(); ?>
    <div class="row main-magazine">
    <div class="col-md-8 col-sm-12 col-xs-12 noleftpadding" id="posts">
        <?php
        $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
            $query = new WP_Query(array(
                'post_type' => 'post',
                'ignore_sticky_posts' => true,
                'paged' => $paged,
                'posts_per_page' => 12,
                'category_name' => artalk_get_current_category()
            ));
        ?>

        <?php while ($query -> have_posts()) : $query->the_post(); ?>


            <?php
                get_template_part('templates/post-category', artalk_get_current_category() );
            ?>

        <?php endwhile; ?>

        <?php next_posts_link( '<div class="further-content">Načíst další obsah</div>' ); ?>

    </div>

<?php wp_reset_query(); ?>
       <!--//single_left-->

<?php get_template_part('templates/sidebar', 'author'); ?>


<?php get_sidebar(); ?>

<?php get_footer(); ?>