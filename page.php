<?php get_header(); ?>
    <div class="row single" xmlns="http://www.w3.org/1999/html">
    <div class="col-lg-8 col-md-8  col-sm-12 col-xs-12 no-margin no-padding-sm single-content">
    <article>
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

            <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12 article-single-title">
                <h1><?php the_title(); ?></h1>
            </div>

        <div class="col-lg-9 col-sm-12 col-xs-12 padding-sm-12 single-text-container">
            <?php artalk_content_format(); ?>

            <?php endwhile; else: ?>

                <h3>Omlouváme se, nic jsme nenašli.</h3>

            <?php endif;?>

            <div class="clear"></div>
        </div>
    </article>

    </div>

    <?php //get_template_part('templates/sidebar', 'single'); ?>

    <div class="clear"></div>


<?php get_sidebar(); ?>

<?php get_footer(); ?>