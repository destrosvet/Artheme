<?php

add_action('wp_enqueue_scripts', 'artalk_assets');

/* new jQuery override*/
/*function modify_jquery_version() {
    if (!is_admin()) {
        wp_deregister_script('jquery');
        wp_register_script('jquery',
            'http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js', false, '2.0.s');
        wp_enqueue_script('jquery');
    }
    else
    {
        wp_deregister_script('jquery');
    }
}
if (!is_admin()) {
    add_action('init', 'modify_jquery_version');
}*/
//function to load WordPress Default jQuery
/*function load_admin_query_function(){
    wp_deregister_script('jquery_1_9_1');
    wp_register_script('jquery', ("/wp-includes/js/jquery/jquery.js"), false, 'latest', false);
    wp_enqueue_script('jquery');
}
*/
//function to load latest jQuery
/*function load_front_end_jquery_function() {
    //load latest jquery CDN from jquery.com
    wp_deregister_script('jquery');
    wp_register_script('jquery_2_0_2', ("http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"), false, 'latest', false);
    wp_enqueue_script('jquery_2_0_2');
    //load admin_init action
    add_action( 'admin_init', 'load_admin_query_function' );//call function load_admin_query_function to load default jquery
}*/
//hook wp_loaded action
//add_action( 'wp_loaded', 'load_front_end_jquery_function' );




/* */
/* SCRIPTS */
function artalk_assets()
{
    global $wp_query;
    $dir = get_stylesheet_directory_uri();
    $ver = '1.0.23';
    $deps = array();

    // JQuery
    wp_deregister_script('jquery');
    wp_enqueue_script(
        'jquery',
        $dir . '/assets/scripts/jquery-2.2.0.min.js',
        array(),
        '2.2.0',
        false
    );
    $deps[] = 'jquery';

    // modernizr
    /*wp_enqueue_script(
        'modernizr',
        $dir.'/bower_components/foundation/js/vendor/modernizr.js',
        array(),
        $ver,
        false
    );
    $deps[] = 'modernizr';*/
    // webfontloader
    /*	wp_enqueue_script(
            'jquery',
            $dir.'/assets/scripts/jquery-2.2.0.min.js',
            array(),
            '2.2.0',
            false
        );
        $deps[] = 'jquery';*/

    // AJAX
//    wp_enqueue_script(
//        'ajax-scripts',
//        $dir.'/assets/scripts/ajax-scripts.js',
//        array('jquery'),
//        '1.0.0',
//        false
//    );
//    $deps[] = 'ajax-scripts';

    wp_enqueue_script(
        'bootstrap4-js',
        $dir . '/assets/scripts/bootstrap-4.js',
        array('jquery'),
        $ver,
        false
    );
    $deps[] = 'bootstrap4-js';

    // webfontloader
    wp_enqueue_script(
        'webfontloader',
        $dir . '/assets/scripts/webfontloader/webfont.js',
        array(),
        $ver,
        false
    );
    $deps[] = 'webfontloader';

    // scripts for home
    /*        if ( is_home() || is_category( array('artservis','arena','magazine') ) || is_single() ) {
                        $theme_scripts = array(
                            'slick.min',
                        'artalk.featured'
                );
                foreach ( $theme_scripts as $script_handle ) {
                        wp_enqueue_script(
                                $script_handle,
                                $dir.'/assets/scripts/'.$script_handle.'.js',
                                $deps,
                                $ver,
                                true
                        );
                        $deps[] = $script_handle;
                }
            }*/
    if (in_category('foto-report')) {
       wp_enqueue_script(
            'lightbox',
            $dir . '/assets/scripts/lightbox/simple-lightbox.min.js',
            array(),
            $ver,
            false
        );
        $deps[] = 'jquery';

        wp_enqueue_script(
            'lightbox-init',
            $dir . '/assets/scripts/artalk.gallery.js',
            array(),
            $ver,
            true
        );
        $deps[] = 'jquery';
    }

    if (is_single()) {
        // jQuery-Collision
        wp_enqueue_script(
            'jQuery-Collision',
            $dir . '/assets/scripts/jquery-collision.min.js',
            array('jquery'),
            $ver,
            false
        );
        $deps[] = 'jQuery-Collision';

        // citation positioner
        wp_enqueue_script(
            'citation-positioner',
            $dir . '/assets/scripts/citation-positioner.js',
            array(),
            $ver,
            true
        );
        $deps[] = 'citation-positioner';
    }



	// foundation
	/*wp_enqueue_script(
		'foundation',
		$dir.'/bower_components/foundation/js/foundation.min.js',
		array('modernizr','jquery','fastclick'),
		$ver,
		true
	);
	$deps[] = 'foundation';*/

	//@TODO rewrite is_single() to a custom artalk_has_gallery() check
	/*if ( is_home() || is_category( array('artservis','arena','magazine') ) || is_single() ) {

		// slick
		wp_enqueue_style('slick', $dir.'/bower_components/slick.js/slick/slick.css', array(), $ver);
		wp_enqueue_script(
			'slick',
			$dir.'/bower_components/slick.js/slick/slick.min.js',
			array('jquery'),
			$ver,
			true
		);
		$deps[] = 'slick';
	}

	if ( is_home() || is_archive() || is_search() || is_author() ) {

		// masonry
		wp_enqueue_script('jquery-masonry');
		$deps[] = 'jquery-masonry';

		// handlebars
		wp_enqueue_script(
			'handlebars',
			$dir.'/assets/vendor/handlebars.min.js',
			array(),
			'3.0.0',
			true
		);
		$deps[] = 'handlebars';

		// imagesLoaded
		wp_enqueue_script(
			'imagesloaded',
			$dir.'/bower_components/imagesloaded/imagesloaded.pkgd.min.js',
			array(),
			'3.1.8',
			true
		);
		$deps[] = 'imagesloaded';
	}*/

	// main style, dashicons & scripts
	/*wp_enqueue_style('artalk', $dir.'/style.css', array( 'dashicons' ), $ver);
	$theme_scripts = array(
		'artalk.gallery',
		'artalk.navigation',
		'artalk.featured',
		'artalk.loader',
		'artalk.utils',
		'mau.sticky', // @TODO move to vendors
		'artalk',
	);
	foreach ( $theme_scripts as $script_handle ) {
		wp_enqueue_script(
			$script_handle,
			$dir.'/assets/scripts/build/'.$script_handle.'.min.js',
			$deps,
			$ver,
			true
		);
		$deps[] = $script_handle;
	}*/


	/*wp_localize_script( 'artalk', 'ArtalkL10n', array(
		'loading'   => __('Načítám...','artalk'),
		'thats_all' => __("No more posts",'artalk'),
	) );

	wp_localize_script( 'artalk', 'ArtalkData', array(
		'query' => (object) $wp_query->query,
	) );*/

}