<?php get_header();   ?>
    <div class="row">
        <article>
            <div class="col-lg-8 col-md-8  col-sm-8 col-xs-12 no-margin no-padding-sm single-content">

				<?php if (have_posts()) : while (have_posts()) : the_post();?>

                <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12 padding-left-sm-10 nopadding-i"><h1><?php the_title(); ?></h1>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 padding-right-md-20 padding-right-lg-45">
                    <?php get_template_part('templates/social-icon') ?>
                </div>
                <div class="post-meta-single padding-left-sm-10 ">
                    <span><?php the_author_posts_link(); ?></span> | <time><?php the_time( get_option( 'date_format' ) ); ?></time>
                    <span><?php edit_post_link( 'edit', ' | ' ); ?></span>
                    <span class="post-meta-single-category">
                        <?php do_action('artalk_post_cats','',array('separator' => ' ','main-category' => true),true); ?>
                    </span>
                </div>

                <div class="col-md-4 col-sm-4 col-xs-4 noleftpadding padding-right-md-20 padding-right-lg-45 float-right">
                    <div class="single-tags-container">
			            <?php

			            $terms = wp_get_post_tags($post->ID);
			            //                   echo '<p>';
			            foreach($terms as $term) {

				            //                            echo $term->name; //the output
				            //                            echo get_tag_link($term->term_id);
				            echo '<span class="single-tags-tag"><a class="taglink" href="'. get_tag_link($term->term_id) .'">'. $term->name . '</a></span>';
				            //                            echo $string .= '<span class="tagbox"><a class="taglink" href="'. get_tag_link($tag->term_id) .'">'. $tag->name . '</a></span>' . "\n"   ;

			            }
			            //                    echo '</p>';
			            //  the_tags('', '' ,'' ); ?>
                    </div>
		            <?php
		            do_action( 'side_matter_list_notes' );
		            ?>
                </div>
                <!--                --><?php //$var = '600';echo get_the_content_reformatted($var);?>

                <div class="col-lg-8 col-sm-8 col-xs-8 padding-sm-10 single-text-container">
					<?php
					the_contents();
					?>

					<?php endwhile; else: ?>

                        <h3>Sorry, no posts matched your criteria.</h3>

					<?php endif;


					?>

                    <div class="clear"></div>
                </div>



            </div>



                <!--//single_left-->

            <?php get_template_part('templates/sidebar', 'single'); ?>


			<?php  comments_template(); ?>
        </article>
    </div><!--//content-->

<?php get_sidebar(); ?>

<?php get_footer(); ?>