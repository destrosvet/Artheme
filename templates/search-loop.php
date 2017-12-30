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
            <div class="col-md-4 col-sm-6"></div>
        </div>
        <div class="col-md-8 col-sm-12 col-xs-12" id="posts" >
            <?php

              //    var_dump($query_string);
              //  $qobj = get_queried_object();
              //  var_dump($qobj); // debugging only

                $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

                if(isset($_GET["s"])){
                  $str = sanitize_text_field($_GET["s"]);
                }else{
                  $str = "";
                }
                if(isset($_GET["author"])){
                  if($_GET["author"]==""){
                    $author = "";
                  }else{
                    $author = sanitize_text_field($_GET["author"]);
                    global $wpdb;
                    $authorLoop = $wpdb->get_results("SELECT id FROM $wpdb->users WHERE display_name = '".$author."'");
                    $author = $authorLoop[0]->id;
                  }
                }else{
                  $author = "";
                }
                if(isset($_GET["tag"])){
                  $tag = sanitize_text_field($_GET["tag"]);
                }else{
                  $tag = "";
                }
                if(isset($_GET["category"])){
                  $category = sanitize_text_field($_GET["category"]);
                }else{
                  $category = "";
                }
                if(isset($_GET["dateFrom"])){
                  $dateFromStr = sanitize_text_field($_GET["dateFrom"]);
                }else{
                  $dateFromStr = "";
                }
                if(isset($_GET["dateTo"])){
                  $dateToStr = sanitize_text_field($_GET["dateTo"]);
                }else{
                  $dateToStr = "";
                }
                if($category == "Vše vybráno"){
                  $category = "";
                }


                if($dateFromStr!=""){
                  $dateFrom = explode( '/', $dateFromStr);
                  $dateFrom =  array(
                    'year'  => $dateFrom[2],
                    'month' => $dateFrom[1],
                    'day'   => $dateFrom[0],
                  );
                }else{
                  $dateFrom = "";
                }
                if($dateToStr!=""){
                  $dateTo = explode( '/', $dateToStr);
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
                    'tag' => $tag,
                    'author' => $author,
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
            <?php getFurtherContentButton(null , null, $author, $str, $category, $tag, $dateToStr, $dateFromStr); ?>
            <?php endif; ?>

        </div>
<?php wp_reset_postdata(); ?>
<?php wp_reset_query(); ?>
