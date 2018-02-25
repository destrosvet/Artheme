<?php
/**
 * Artalk Revue Single Template
 * User: Filip Uhlir
 * Date: 22.09.2017
 * Time: 12:32
 */
?>

<?php (is_category()?'':get_header());?>

<div class="row revue">
    <?php
      if (is_category()){
        get_template_part('templates/sidebar-revue', 'sidebar-revue');
      }
    ?>
    <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 padding-sm-12 <?php echo (is_category()? '':'noleftpadding norightpadding');?> no-padding-sm single-content">
        <article>
            <?php
            if (is_category()) {
                $args = array(
                    'cat'=> $ActualRevue->cat_ID,
                    'post_type' => 'post',
                    'showposts' => 1
                );
                $query = new WP_Query($args);

            }
            ?>

            <?php if (is_category() && $query->have_posts()): while ($query->have_posts()) : $query->the_post();?>


            <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12 revue-single-title">
                <h1><?php the_title(); ?></h1>
            </div>
            <div class="post-meta-single ">
                <span><?php the_author_posts_link(); ?></span> | <time><?php the_time( get_option( 'date_format' ) ); ?></time>
                <span class="post-meta-single-category"> |
                    <?php do_action('artalk_post_cats','',array('separator' => ' ','main-category' => true),true,true); ?>
                </span>
            </div>

            <div class="col-lg-9 col-sm-12 col-xs-12 padding-sm-12 single-revue single-text-container">

                <?php the_content(); ?>
                <div class="clear"></div>
            </div>

                <?php endwhile; elseif ( have_posts()): while (! isset ( $loop_first ) && have_posts()) : the_post(); ?>

                <?php $loop_first = 1; ?>
                <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12 revue-single-title">
                    <h1><?php the_title(); ?></h1>
                </div>
                <div class="col-lg-9 col-sm-12 col-xs-12 padding-sm-12">
                  <div class=" post-meta-single">
                      <span><?php the_author_posts_link(); ?></span> | <time><?php the_time( get_option( 'date_format' ) ); ?></time>
                      <span class="post-meta-single-category"> |
                          <?php do_action('artalk_post_cats','',array('separator' => ' ','main-category' => true),true,true); ?>
                      </span>
                  </div>
                  <div class="col-lg-4  col-md-12 col-sm-12 col-xs-12 revue-download-block-mobile">
                      <?php get_revue_download() ?>
                  </div>
                  <div class=" single-revue single-text-container">

                      <?php the_content(); ?>
                      <div class="clear"></div>
                  </div>
                </div>
                <div class="col-lg-3  col-md-12 col-sm-12 col-xs-12 revue-download-block">
                    <?php get_revue_download() ?>
                </div>
                    <?php endwhile; else:?>
                    <h3>Omlouváme se, nic jsme nenašli.</h3>
                <?php endif;?>




        </article>
        <div class="col-lg-12 col-md-12 col-xs-12 norightpadding noleftpadding no-padding-right-md">
            <div id="tags">
                <?php  get_post_tags($post->ID); ?>
            </div>
<!--            <div id="comments">
                <?php /* comments_template(); */?>
            </div>-->
        </div>
    </div>
    <?php
      if (!is_category()){
                get_template_part('templates/sidebar-revue', 'sidebar-revue');
      }
    ?>
  </div>

    <?php wp_reset_query(); ?>
    <?php wp_reset_postdata(); ?>

    <?php get_footer(); ?>
