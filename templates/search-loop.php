<?php
/**
 * Search page
 * User: Filip Uhlir
 * Date: 01.08.2017
 * Time: 23:32
 */
?>
<?php global $query_string; ?>
<div class="row main-magazine">
        <div class="bar-info">
            <div class="col-md-8 col-sm-6 col-xs-12 small-left-padding">Výskedky vyhledávání</div>
            <div class="col-md-4 col-sm-6">Inzerce</div>
        </div>
        <div class="col-md-8 col-sm-12 col-xs-12 noleftpadding norightpadding" id="posts" >
            <?php

              //    var_dump($query_string);
              //  $qobj = get_queried_object();
              //  var_dump($qobj); // debugging only

                $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;


                $str = sanitize_text_field($_GET["s"]);
                $author = sanitize_text_field($_GET["author"]);
                $tag = sanitize_text_field($_GET["tag"]);
                $category = sanitize_text_field($_GET["category"]);
                if($category == "Vše vybráno"){
                  $category = "";
                }

                $dateQuery = array('date_query' => array());
                if($_GET["dateFrom"]!=""){
                  $dateFrom = explode( '/', $_GET["dateFrom"]);
                  $dateFrom =  array(
                    'year'  => $dateFrom[2],
                    'month' => $dateFrom[1],
                    'day'   => $dateFrom[0],
                  );
                }else{
                  $dateFrom = "";
                }
                if($_GET["dateTo"]!=""){
                  $dateTo = explode( '/', $_GET["dateTo"]);
                  $dateTo = array(
                    'year'  => $dateTo[2],
                    'month' => $dateTo[1],
                    'day'   => $dateTo[0],
                  );

                }else{
                  $dateTo = "";
                }

                $args = array(
                    's'=> $str,
                    'post_type' => 'post',
                    'posts_per_page' => 10,
                    'paged' => $paged,
                    'category_name' => $category,
                    'tag' => $_GET["tag"],
                    'date_query' => array(
                      array(
                        'before' => $dateTo,
                        'after' => $dateFrom,
                      )
                    )


                //    'tax_query' => array(
                  //      array(
                        //    'taxonomy' => $qobj->taxonomy,
                        //    'field' => 'id',
                        //    'terms' => $qobj->term_id,
                            //    using a slug is also possible
                            //    'field' => 'slug',
                            //    'terms' => $qobj->name
                //  //      )
              );
          //      $search_query = wp_parse_str( $query_string );
          //      var_dump(the_search_query());
          //      $query = new WP_Query($args);

        //    $args = array(
        //        's'=>get_search_query(),
        //    );
            $query = new WP_Query($args);

            ?>
            <?php if ($query -> have_posts()): ?>
            <?php while ($query -> have_posts()) : $query->the_post(); ?>

            <?php
                get_template_part('templates/post-artservis', artalk_get_current_category() );
            ?>

            <?php endwhile; ?>
            <?php getFurtherContentButton($qobj->taxonomy,$qobj->term_id); ?>
            <?php endif; ?>

        </div>
<?php wp_reset_postdata(); ?>
<?php wp_reset_query(); ?>
