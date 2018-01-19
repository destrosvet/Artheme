<?php
/**
 * Artalk Revue Single Template
 * User: Filip Uhlir
 * Date: 22.09.2017
 * Time: 12:32
 */
?>

<?php (is_category()?'':get_header());?>

    <div class="col-lg-8 col-md-8  col-sm-12 col-xs-12 no-margin no-padding-sm single-content">
        <article>
            <?php if (have_posts()) : while (have_posts()) : the_post();?>

            <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12 article-single-title">
                <h1><?php the_title(); ?></h1>
            </div>

            <div class="post-meta-single ">
                <span><?php the_author_posts_link(); ?></span> | <time><?php the_time( get_option( 'date_format' ) ); ?></time>
                <span class="post-meta-single-category"> |
                    <?php do_action('artalk_post_cats','',array('separator' => ' | ','main-category' => true),true); ?>
                        </span>
                <span><?php edit_post_link( 'edit', ' | ' ); ?></span>
            </div>

            <div class="col-lg-9 col-sm-12 col-xs-12 padding-sm-12 single-text-container">
                <?php the_content(); ?>

                <?php endwhile; else: ?>

                    <h3>Omlouváme se, nic jsme nenašli.</h3>

                <?php endif;?>

                <div class="clear"></div>
            </div>

        </article>
        <div class="col-lg-12 col-md-12 col-xs-12 norightpadding noleftpadding no-padding-right-md">
            <div id="tags">
                <?php  get_post_tags($post->ID); ?>
            </div>
            <div id="comments">
                <?php  comments_template(); ?>
            </div>
        </div>
    </div>

<!--    <?php /*get_template_part('templates/sidebar-revue', 'single'); */?>

    --><?php /*get_sidebar(); */?>

    <?php get_footer(); ?>

