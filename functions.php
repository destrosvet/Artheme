<?php

//function getImage() {
//    global $more;
//    $more = 1;
//    $link = get_permalink();
//    $content = get_the_content();
//    $count = substr_count($content, '<img');
//
//    for($i=1;$i<=$count;$i++) {
//	    //move $start = 0 inside the loop
//	    $start = 0;
//	    $imgBeg = strpos($content, '<img', $start);
//	    $post = substr($content, $imgBeg);
//	    $imgEnd = strpos($post, '>');
//	    $postOutput = substr($post, 0, $imgEnd+1);
//	    $postOutput = preg_replace('/width="([0-9]*)" height="([0-9]*)"/', 'width="136%" height="400px"',$postOutput);;
//	    if(stristr($postOutput,'<img')) { echo $postOutput; }
//	    $content = substr($content,$imgEnd+1);
//    }
//    $more = 0;
//}
//add_filter( 'img_caption_shortcode', 'cleaner_caption', 10, 3 );


//add_image_size('lrg-hdr', 1170, 544, true);
//add_image_size('med-hdr', 750, 400, true);
//add_image_size('sml-hdr', 500, 325, true);
add_image_size('size-full', 1100, 600, true);
add_action( 'after_setup_theme', 'artalk_theme_init', 10 );




//add_action('after_setup_theme', 'mytheme_theme_setup');
//if ( ! function_exists( 'mytheme_theme_setup' ) ){
//    function mytheme_theme_setup(){
//        add_action( 'wp_enqueue_scripts', 'mytheme_scripts1');
//    }
//}
//
//if ( ! function_exists( 'mytheme_scripts1' ) ){
//    global $wp_query;
//    function mytheme_scripts1() {
//        wp_enqueue_script( 'ajax-scripts', get_template_directory_uri().'/js/ajax-scripts.js', array( 'jquery'), '1.0.0', true );
//        wp_localize_script( 'ajax-scripts', 'ajaxpagination', array(
//            'ajaxurl' => admin_url( 'admin-ajax.php' ),
//            'query_vars' => json_encode( $wp_query->query )
//
//        ));
//        wp_enqueue_script( 'ajax-scripts');
//    }
//}

function misha_my_load_more_scripts() {

    global $wp_query;

    $published_posts = wp_count_posts()->publish;
    $posts_per_page = get_option('posts_per_page');
    $page_number_max = ceil($published_posts / $posts_per_page);

    // In most cases it is already included on the page and this line can be removed
    wp_enqueue_script('jquery');

    // register our main script but do not enqueue it yet
    wp_register_script( 'my_loadmore', get_stylesheet_directory_uri() . '/assets/scripts/ajax-scripts.js', array('jquery') );

    // now the most interesting part
    // we have to pass parameters to myloadmore.js script but we can get the parameters values only in PHP
    // you can define variables directly in your HTML but I decided that the most proper way is wp_localize_script()
    wp_localize_script( 'my_loadmore', 'ajax', array(
//        'ajaxurl' => site_url() . '/wp-admin/admin-ajax.php', // WordPress AJAX
//        'query_vars' => json_encode( $wp_query->query )
            'ajaxurl' => site_url() . '/wp-admin/admin-ajax.php', // WordPress AJAX
            'posts' => serialize( $wp_query->query_vars ), // everything about your loop is here
            'current_page' => get_query_var( 'paged' ) ? get_query_var('paged') : 1,
            'max_page' => $wp_query->max_num_pages,
             'noposts' => __('No older posts found', 'twentyfifteen'),


    ) );

    wp_enqueue_script( 'my_loadmore' );
}
add_action( 'wp_enqueue_scripts', 'misha_my_load_more_scripts' );



function more_post_ajax(){

    $ppp = (isset($_POST["ppp"])) ? $_POST["ppp"] : 10;
    $page = (isset($_POST['pageNumber'])) ? $_POST['pageNumber'] : 0;
    $cat     = (isset($_POST['cat'])) ? $_POST['cat'] : 0;
    header("Content-Type: text/html");

    $args = array(
        'suppress_filters' => true,
        'post_type' => 'post',
        'posts_per_page' => $ppp,
        'paged'    => $page,
        'cat'      => $cat
    );

    query_posts( $args );

    if( have_posts() ) :

        // run the loop
        while( have_posts() ): the_post();

            // look into your theme code how the posts are inserted, but you can use your own HTML of course
            // do you remember? - my example is adapted for Twenty Seventeen theme
//            get_template_part( 'single', get_post_format() );
            // for the test purposes comment the line above and uncomment the below one

                get_template_part('templates/post', artalk_in_artservis() );

        endwhile;
    endif;
    wp_reset_postdata();
    die();
}

add_action('wp_ajax_nopriv_more_post_ajax', 'more_post_ajax');
add_action('wp_ajax_more_post_ajax', 'more_post_ajax');

function artalk_theme_init() {

	/* INIT */
	include_once('functions/init.php');

	/* ASSETS */
	include_once('functions/assets.php');

    /* TEMPLATE PARTS */
    include_once('functions/template-part.php');

    /* RECENT ITEMS */
    include_once('functions/recent-items.php');

	/* CITACE  */
	include_once ('functions/simple_html_dom.php');

	/* MEDIA */
	include_once('functions/media.php');

	/* TEMPLATE TAGS */
	//include_once('functions/template_tags.php');

	/* BLACKSQUARE */
	//include_once('functions/blacksquare.php');

	/* FEATURED POSTS */
	//include_once('functions/featured.php');

	/* RELATED POSTS */
	//include_once('functions/related_posts.php');

	/* AJAX LOADER */
	//include_once('functions/ajax_loader.php');

	/* NAVIGATION */
	// include_once('functions/nav.php');

	/* SHORTCODES */
	// include_once('functions/shortcodes.php');

	/* SEARCH */
	// include_once('functions/search.php');

	/* UTILITIES */
	include_once('functions/utils.php');

	/* ADMIN */
	/*if ( is_admin() )
		include_once('functions/admin.php');
         *
         */

	/* DEVELOPMENT */
	/*if ( current_user_can('update_core') )
		include_once('functions/develop.php');
         
         */

	/* DEBUGGING */
	if ( WP_DEBUG && current_user_can('update_core') )
		include_once('functions/debug.php');


}