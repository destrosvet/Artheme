<?php
/**
 * Created by PhpStorm.
 * User: Filip Uhlir
 * Date: 01.08.2017
 * Time: 23:32
 */
?>
<div class="row main-magazine">
        <div class="bar-info">
            <div class="col-md-8 col-sm-6 col-xs-12">Nejnovější články</div>
            <div class="col-md-4 col-sm-6 noleftpadding">Inzerce</div>
        </div>
        <div class="col-md-8 col-sm-12 col-xs-12 noleftpadding" id="posts" >
            <?php
            if (is_tax() || is_category() || is_tag() ) {

                $qobj = get_queried_object();
                //var_dump($qobj); // debugging only

                $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

                // concatenate the query
                $args = array(
                    'post_type' => 'post',
                    'posts_per_page' => 10,
                    'paged' => $paged,
                    'tax_query' => array(
                        array(
                            'taxonomy' => $qobj->taxonomy,
                            'field' => 'id',
                            'terms' => $qobj->term_id,
                            //    using a slug is also possible
                            //    'field' => 'slug',
                            //    'terms' => $qobj->name
                        )
                    )
                );

                $query = new WP_Query($args);

            };

            ?>
            <?php if ($query -> have_posts()): ?>
            <?php while ($query -> have_posts()) : $query->the_post(); ?>

            <?php
            if((!artalk_in_artservis() || artalk_get_current_category() == 'foto-report') && !is_tag()) {
                get_template_part('templates/post', artalk_get_current_category() );
            } else {
                get_template_part('templates/post-artservis', artalk_get_current_category() );
            }?>

            <?php endwhile; ?>
            <?php getFurtherContentButton(); ?>
            <?php endif; ?>

        </div>
<?php wp_reset_postdata(); ?>
<?php wp_reset_query(); ?>