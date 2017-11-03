<?php get_header();   ?>
    <div class="row">
        <article>
            <div class="col-lg-8 col-md-8  col-sm-8 col-xs-12 no-margin no-padding-sm single-content">

                <?php if (have_posts()) : while (have_posts()) : the_post();?>

                <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12 padding-left-sm-10 nopadding-i"><h1><?php the_title(); ?></h1>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 padding-right-sm-45 no-padding-left padding-right-45-lg">
                    <?php get_template_part('templates/social-icon') ?>
                </div>
                <div class="post-meta-single padding-left-sm-10 ">
                    <span><?php the_author_posts_link(); ?></span> | <time><?php the_time( get_option( 'date_format' ) ); ?></time>
                    <span class="post-meta-single-category"> |
                        <?php do_action('artalk_post_cats','',array('separator' => ' ','main-category' => true),true); ?>
                    </span>
                    <span><?php edit_post_link( 'edit', ' | ' ); ?></span>
                </div>

                <div class="col-lg-12 col-sm-12 col-xs-12 padding-sm-12 single-fotoreport-container">
                    <?php
                        the_content();
                    ?>

                    <?php endwhile; else: ?>

                        <h3>Omlouváme se, nic jsme nenašli.</h3>

                    <?php endif;

                    ?>

                    <div class="clear"></div>
                </div>

            </div>


            <?php get_template_part('templates/sidebar', 'single'); ?>

            <div id="comments" class="col-lg-8 col-md-8 col-xs-12 noleftpadding no-padding-right-md">
                <?php  get_post_tags($post->ID); ?>
                <?php  comments_template(); ?>
        </article>
    </div><!--//content-->

<?php get_sidebar(); ?>

<?php get_footer(); ?>