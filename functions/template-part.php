<?php
/**
 * Created by Teapot.
 * based on Mau
 * User: Filip Uhlir
 * Date: 06.02.2017
 * Time: 15:47
 */
/* LOGO */
add_action( 'artalk_logo', 'artalk_logo' );
function artalk_logo() {
    echo '<img class="site-logo" src="'.get_stylesheet_directory_uri().'/assets/images/artalk-logo-sm.png" alt="Artalk Logo" />';
}


/* FAVICON */

add_action( 'artalk_favicons', 'artalk_favicons' );
function artalk_favicons() {
    $v    = 'GvvJlrO725';
    $uri  = get_stylesheet_directory_uri().'/assets/favicons';
    $col  = '#ff3e6c';
    $out  = '';
    $out .= '<link rel="apple-touch-icon" sizes="57x57" href="'.$uri.'/apple-touch-icon-57x57.png?v='.$v.'">';
    $out .= '<link rel="apple-touch-icon" sizes="60x60" href="'.$uri.'/apple-touch-icon-60x60.png?v='.$v.'">';
    $out .= '<link rel="apple-touch-icon" sizes="72x72" href="'.$uri.'/apple-touch-icon-72x72.png?v='.$v.'">';
    $out .= '<link rel="apple-touch-icon" sizes="76x76" href="'.$uri.'/apple-touch-icon-76x76.png?v='.$v.'">';
    $out .= '<link rel="apple-touch-icon" sizes="114x114" href="'.$uri.'/apple-touch-icon-114x114.png?v='.$v.'">';
    $out .= '<link rel="apple-touch-icon" sizes="120x120" href="'.$uri.'/apple-touch-icon-120x120.png?v='.$v.'">';
    $out .= '<link rel="apple-touch-icon" sizes="144x144" href="'.$uri.'/apple-touch-icon-144x144.png?v='.$v.'">';
    $out .= '<link rel="apple-touch-icon" sizes="152x152" href="'.$uri.'/apple-touch-icon-152x152.png?v='.$v.'">';
    $out .= '<link rel="apple-touch-icon" sizes="180x180" href="'.$uri.'/apple-touch-icon-180x180.png?v='.$v.'">';
    $out .= '<link rel="icon" type="image/png" href="'.$uri.'/favicon-32x32.png?v='.$v.'" sizes="32x32">';
    $out .= '<link rel="icon" type="image/png" href="'.$uri.'/favicon-194x194.png?v='.$v.'" sizes="194x194">';
    $out .= '<link rel="icon" type="image/png" href="'.$uri.'/favicon-96x96.png?v='.$v.'" sizes="96x96">';
    $out .= '<link rel="icon" type="image/png" href="'.$uri.'/android-chrome-192x192.png?v='.$v.'" sizes="192x192">';
    $out .= '<link rel="icon" type="image/png" href="'.$uri.'/favicon-16x16.png?v='.$v.'" sizes="16x16">';
    $out .= '<link rel="manifest" href="'.$uri.'/manifest.json?v='.$v.'">';
    $out .= '<link rel="shortcut icon" href="'.$uri.'/favicon.ico?v='.$v.'">';
    $out .= '<meta name="apple-mobile-web-app-title" content="Artalk.cz">';
    $out .= '<meta name="application-name" content="Artalk.cz">';
    $out .= '<meta name="msapplication-TileColor" content="'.$col.'">';
    $out .= '<meta name="msapplication-TileImage" content="'.$uri.'/mstile-144x144.png?v='.$v.'">';
    $out .= '<meta name="msapplication-config" content="'.$uri.'/browserconfig.xml?v='.$v.'">';
    $out .= '<meta name="theme-color" content="'.$col.'">';
    echo $out;
}

/* CATEGORIES */
add_action( 'artalk_post_cats', 'artalk_post_cats',10,4);
function artalk_post_cats( $post_id=null, $args='', $echo=true,$revue=false ) {

    if ( ! absint($post_id) )
        $post_id = get_the_ID();
    if ( ! $post_id = absint($post_id) )
        return false;

    $defaults = array(
        'separator' => ' ',
        'main-category' => false,
        'sub-category' => true
    );
    $args = wp_parse_args( $args, $defaults );
    $cats = wp_get_object_terms($post_id, 'category', $args);
    if ( empty($cats) )
        return false;

    if ($args['sub-category'])
    {
        if ($args['main-category'])
        {
            $cats_out = array();
            foreach ($cats as $key => $cat) {
                if ('E-mail newsletter' == $cat->name)
                    continue;
                $pre = '';
                $parent = get_category_parents($cat->parent, 'false', false, ' &raquo; ');

                if ($parent != 'artservis' && $parent != 'arena' && $parent != 'artalk-revue') {
                    $cats_tree = get_category_parents($cat->parent, 'true', '||', ' &raquo; ');

                    if (is_string ($cats_tree ))
                    {
                        $cats_Arr = explode('||', $cats_tree);
                    }
                    //$cats_out = $cats_Arr[1];
                    $cats_out[] = '<li>' . $cats_Arr[1] . '</li>';

                } else {
                    $catName= ($revue ? 'Artalk Revue '.explode('%',$cat->name)[1]: $cat->name);
                    $cats_out[] = '<li>' . $pre . '<a href="' . esc_url(get_term_link($cat)) . '">' . $catName . '</a></li>';
                }

            }

            $cats_out = '<ul class="post-categories">' . join($args['separator'], $cats_out) . '</ul>';
            //var_dump($cats_out);
        }
        else
        {
            $cats_out = array();
            foreach ($cats as $key => $cat) {
                if ('E-mail newsletter' == $cat->name)
                    continue;
                $pre = '';

                $cats_out[] = '<li>' . $pre . '<a href="' . esc_url(get_term_link($cat)) . '">' . $cat->name . '</a></li>';
            }

            $cats_out = '<ul class="post-categories">' . join($args['separator'], $cats_out) . '</ul>';
        }
    }
    else
    {
        if ($args['main-category'])
        {
            $cats_out = '';
            foreach ( $cats as $key => $cat )
            {
                if ('E-mail newsletter' == $cat->name)
                    continue;
                $parent = get_category_parents($cat->parent, 'false', false, ' &raquo; ');
                if ($parent != 'artservis' && $parent != 'arena') {
                    $cats_tree = get_category_parents($cat->parent, 'true', '||', ' &raquo; ');

                    $cats_Arr = explode('||', $cats_tree);
                    $cats_out = $cats_Arr[1];

                } else {
                    $cats_out = '<a href="' . esc_url(get_term_link($cat)) . '">' . $cat->name . '</a>';
                }
            }
        }
        else
        {
            $cats_out = 'subcategory not implemented';
        }
    }

    if ( ! $echo )
        return $cats_out;
    echo $cats_out;
}

add_action( 'artalk_sub_cats', 'artalk_sub_cats' );
function artalk_sub_cats() {
    if ( ! is_category() )
        return false;
    $current_cat = get_queried_object();
    if ( in_array( $current_cat->slug, array('artservis','arena') ) || is_home() )
        return false;
    $i       = 0;
    $out     = '';
    $cats    = get_categories(array('parent'=>$current_cat->term_id));
    $count   = count($cats);
    $classes = 'columns small-6 medium-2';
    foreach(  $cats as $cat ) { $i++;
        if ( $count == $i )
            $classes .= ' end';
        $out .= '<li class="'.esc_attr($classes).'"><a href="'.esc_url( get_category_link( $cat->term_id ) ).'">'.esc_html($cat->name).'</a></li>';
    }
    $out = '<div id="sub-cats" class="sub-cats row text-center"><ul>'.$out.'</ul></div>';
    echo $out;
}
add_action ('artalk_service_part','artalk_service_part');
function artalk_service_part ($title='',$category='',$class='',$echo=true,$num=6,$col=1,$liClass='')
{
    // Get the ID of a given category
    $category_id = get_cat_ID( $category );

    // Get the URL of this category
    $category_link = get_category_link( $category_id );

    /*    var_dump(is_category(2));
        if ( ! is_category($category))
        {
            if ( ! $echo )
                return 'neplatná kategorie';
            echo 'neplatná kategorie';
            return;
        }*/

    $serContent = '<div class="'.$class.'">';
    $serContent .= '<div class="s-header"><a href="'.$category_link.'"><h5>'.$title.'</h5></a></div>';
    $serContent .= '<ul class="col-md-12 col-xs-12 no-paddin-right-lg">';

    $QArgsActual = array( 'category_name' => $category,'posts_per_page' => $num );
    query_posts($QArgsActual);
    while ( have_posts() ) : the_post();
        $serContent .= '<li class='.$liClass.'>';
        $serContent .= '<a href="'.get_permalink().'" title="'.get_the_title(false).'">&#9679; ';
        //$serContent .= the_date('d.m.Y','<time>','</time><br />');
        $Actualtitle = get_the_title();
        $serContent .= wp_trim_words( $Actualtitle, $num_words = 12, $more = '… ' );
        $serContent .= '</a></li>';
    endwhile;

    // Reset Query
    wp_reset_query();
    $serContent .= '</ul>';
    $serContent .= '</div>';

    if ( ! $echo )
        return $serContent;
    echo $serContent;
}


/* FEATURE POST big picture on home page*/
add_action( 'artalk_feature', 'artalk_feature' );
function artalk_feature() {
    $args = array('posts_per_page' => 1,'post__in'  => get_option( 'sticky_posts' ),'ignore_sticky_posts' => 1 );
    $featured='';
    //$featuredPost = get_posts ($args);
    query_posts($args);
    while ( have_posts() ) : the_post();
        $featured .='<header><h2 class="margin-left-sm-10 margin-right-sm-10">';
        $featured .='<a href="'.get_permalink().'" title="'.get_the_title(false).'">'.get_the_title().'</a></h2></header>';
        $featured .='<div class="featured-excerpt margin-left-sm-10 margin-right-sm-10">';
        $featured .= artalk_get_the_excerpt( get_the_ID(), $num_words = 30, $more = '… ',$allowed_tags = '<a>');
        $featured .='</div>';
        $featured .='<footer class="margin-left-sm-10 margin-right-sm-10">';
        $featured .= '<span class="author-link">'.get_the_author_posts_link().'</span> | <time>'. get_the_time( get_option("date_format"),get_the_ID() ).'</time> | ';
        $featured .= '<span class="post-meta-single-category">'.artalk_post_cats(get_the_ID(), array('separator' => ' | ' ,'main-category' => true), false).'</span>';
        $featured .='</footer>';
        if( has_post_thumbnail() ){
            $featured .= '<div class="featured-img margin-left-sm-10 margin-right-sm-10"><a href="'. get_permalink() .'" />';
            $featured .= get_the_post_thumbnail(get_the_ID(),'featured',array( 'class' => 'img-responsive' ));
            $featured .= '</a></div>';
        }else{
            $featured .='Náhled nebyl nalezen.';
        }
        echo $featured;
    endwhile;
    wp_reset_query();
}
/*
 * Single post by category
 */
add_filter('single_template', 'check_category_single_template');
function check_category_single_template( $t )
{

    foreach( (array) get_the_category() as $cat )
    {
        if ( file_exists(TEMPLATEPATH . "/templates/single-{$cat->slug}.php") ) {
            return TEMPLATEPATH . "/templates/single-{$cat->slug}.php";
        } //else return TEMPLATEPATH . "single.php";
        if($cat->parent)
        {

            //$cat = get_the_category_by_ID( $cat->parent );
            //var_dump($cat);
            //if ( file_exists(TEMPLATEPATH . "/templates/single-{$cat->slug}.php") ) return TEMPLATEPATH . "/templates/single-{$cat->slug}.php";
        }
    }
    return $t;
}
/*
 *  Tags
 */
function get_post_tags ($postID, $echo=true)
{
    $terms = wp_get_post_tags($postID);
    $tags = '';
    foreach($terms as $term) {
        $tags .= '<span class="single-tags-tag"><a class="taglink" href="'. get_tag_link($term->term_id) .'">'. $term->name . '</a></span>';
    }

    if ( ! $echo )
        return $tags;
    echo $tags;
}
/*
 *  Comments template
 */

if ( ! function_exists( 'fws_comment' ) ) :
	function fws_comment( $comment, $args, $depth ) {
		$GLOBALS['comment'] = $comment;

				// Proceed with normal comments.
				global $post;
				?>
                <li class="commented-list padding-left-sm-10" id="li-comment-<?php comment_ID(); ?>">
                    <article id="comment-<?php comment_ID(); ?>" class="comment-article row">
                        <header class="col-md-3 noleftpadding">
							<?php
							// user name, email and web page
                            echo '<ul class="comment-author-bio">';

							printf( '<li class="">%1$s %2$s</li>',
								'<a href="mailto:'.get_comment_author_email().'">'.short_title_text_letter(get_comment_author(),'',30).'</a>'
                                ,'<a href="'.get_comment_author_url().'">'.short_title_text_letter(get_comment_author_url(),'',20).'</a>',
								// If current post author is also comment author, make it known visually.
								( $comment->user_id === $post->post_author ) ? '<span> ' . __( '(Autor příspěvku) ', 'fws' ) . '</span>' : ''
							);
							echo '</ul>';

							?>
                        </header><!-- .comment-meta -->

						<?php if ( '0' == $comment->comment_approved ) : ?>
                            <p class="comment-awaiting-moderation"><?php _e( 'Čéka se na schváení komentáře.', 'fws' ); ?></p>
						<?php endif; ?>

                        <section class="col-md-6">
							<?php
                            //<a class="links"href="%1$s"></a>
							printf( '<time datetime="%2$s">%3$s</time>',
								esc_url( get_comment_link( $comment->comment_ID ) ),
								get_comment_time( 'c' ),
								/* translators: 1: date, 2: time */
								sprintf( __( '%1$s ( %2$s  )', 'fws' ), get_comment_date(), get_comment_time() )
							);
							comment_text(); ?>
							<?php edit_comment_link( __( 'upravit', 'fws' ), '<p class="edit-link">', '</p>' ); ?>
                        </section><!-- .comment-content -->

                        <div class="col-md-3">
							<?php comment_reply_link( array_merge( $args, array(
								'reply_text' => __( 'odpovědět', 'fws' ),
								'depth'      => $depth,
								'max_depth'  => $args['max_depth']
							) ) ); ?>
                        </div><!-- .reply -->
                    </article><!-- #comment-## -->
                </li>
				<?php
//				break;
//		endswitch; // end comment_type check
	}
endif;

function get_related_author_posts() {
	global $authordata, $post;

	$authors_posts = get_posts( array( 'author' => $authordata->ID, 'post__not_in' => array( $post->ID ), 'posts_per_page' => 5 ) );

	$output = "";
    $output .= '<div class="col-md-12 col-xs-12 side-recent-item">';
    $output .= "<ul>";
	foreach ( $authors_posts as $authors_post ) {
		$output .= '<li class="bott-border triple-sm"><a class="related-link" href="' . get_permalink( $authors_post->ID ) . '">' . short_title_text_letter(apply_filters( 'the_title', $authors_post->post_title, $authors_post->ID ),'...',50) . '</a></li>';
	}
    $output .= "</ul>";
    $output .= "</div>";
	return $output;
}

function get_related_posts() {
    $related_posts = artalk_get_related_posts();


    //global $authordata, $post;

    //$authors_posts = get_posts( array( 'author' => $authordata->ID, 'post__not_in' => array( $post->ID ), 'posts_per_page' => 5 ) );

    $output = "";
    $output .= '<div class="col-md-12 col-xs-12 side-recent-item">';
    $output .= "<ul>";
    foreach ( $related_posts as $post ) {
        $output .= '<li class="bott-border triple-sm"><a class="related-link" href="' . get_permalink( $post->ID ) . '">' . short_title_text_letter(apply_filters( 'the_title', $post->post_title, $post->ID ),'...',50) . '</a></li>';
    }
    $output .= "</ul>";
    $output .= "</div>";
    return $output;

    /*

	        <?php
	        //loop thru author posts
            $author_id = get_the_author_meta( 'ID' );
            $tags = wp_get_post_tags($post->ID);
	        if ($tags) {
		        $first_tag = $tags[0]->term_id;
		        $args=array(
                    'author' => $authordata->ID,
			        'posts_per_page'=>5,
			        'ignore_sticky_posts'=>1
		        );
		        $my_query = new WP_Query($args);
		        if( $my_query->have_posts() ) {
			        while ($my_query->have_posts()) : $my_query->the_post(); ?>
                        <a class="related-link" href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php echo short_title('...',6); ?></a>

				        <?php
			        endwhile;
		        }
		        wp_reset_query();
	        }
	        ?>
<!--        --><?php
//        $orig_post = $post;
//        global $post;
//        $tags = wp_get_post_tags($post->ID);
//
//        if ($tags) {
//            $tag_ids = array();
//            foreach($tags as $individual_tag) $tag_ids[] = $individual_tag->term_id;
//            $args=array(
//                'tag__in' => $tag_ids,
//                'post__not_in' => array($post->ID),
//                'posts_per_page'=>4, // Number of related posts to display.
//                'ignore_sticky_posts'=>1
//            );
//
//            $my_query = new wp_query( $args );
//
//            while( $my_query->have_posts() ) {
//                $my_query->the_post();
//                ?>
<!---->
<!---->
<!--                    <a class="external_link" rel="external" href="--><?// the_permalink()?><!--">-->
<!--                        --><?php //the_title(); ?>
<!--                    </a>-->
<!---->
<!---->
<!--            --><?php //}
//
//        }
//        $post = $orig_post;
//        wp_reset_query();
        ?>*/
}

function artalk_content_format() {
    $html = "";
    // Create DOM from string
    $html = str_get_html(get_the_content_without_citate());
    //$html = str_get_html($content);
    //global
    $arr_citate_under_text = array();
    $arr_citate_anchors    = array();
    $arr_citate_replace    = array();
    $cont                  = "";

    if($html->find(' * [href^=#_ftnref] ')){
        //	                    find citation text under post
        foreach ( $html->find( 'p a[href*=ref]' ) as $e ) {
            $arr_citate_under_text[] = $e->parent();
        }

//		find citation anchors from text
        foreach ( $html->find( 'p a[href*=_ftn]' ) as $el ) {
            $arr_citate_anchors[] = $el;

        }
        $len = count($arr_citate_anchors);
        $firsthalf = array_slice($arr_citate_anchors, 0, $len / 2);

//						anchors from text content
        for ( $i = 0; $i < count( $arr_citate_under_text ); $i ++ ) {
            $arr_citate_replace[ $i ] = $firsthalf[ $i ] . '<div class="citate-left">' . $arr_citate_under_text[ $i ] . '</div>';
            //						deleted matched citate text under post
            $cont = get_the_content_without_citate( $arr_citate_under_text[ $i ], $cont, "", "", "" );
            //						moved citate text under post behind anchors in text
            $cont = get_the_content_with_formatting_replace( $firsthalf[ $i ], $arr_citate_replace[ $i ], $cont, "", "", "" );
        }
        echo $cont;
    }else {
        the_content();
    }
}

function get_the_content_without_citate ($citate='', $ref_content='', $more_link_text = '(více...)', $stripteaser = 0, $more_file = '') {
    if($ref_content == ''){
        $content = get_the_content($more_link_text, $stripteaser, $more_file);
        $content = apply_filters('the_content', $content);
        $content = str_replace(']]>', ']]&gt;', $content);
        $content = str_replace($citate, '' ,$content);
        //$content = preg_replace('/<p>\s*(<a .*>)?\s*(<imgResize .*>)\s*(<\/a>)?\s*<\/p>/iU', '<div class="full-width">'.'\1\2\3'.'</div>', $content);
        return $content;
    }
    else {
        $content = $ref_content;
        $content = apply_filters('the_content', $content);
        $content = str_replace(']]>', ']]&gt;', $content);
        $content = str_replace($citate, '' ,$content);
        return $content;
    }
}
function get_the_content_with_formatting_replace ($citate='' , $replace,  $ref_content='', $more_link_text = '(více...)', $stripteaser = 0, $more_file = '') {
    if($ref_content == ''){
        $content = get_the_content($more_link_text, $stripteaser, $more_file);
        $content = apply_filters('the_content', $content);
        $content = str_replace(']]>', ']]&gt;', $content);
        $content = str_replace($citate, $replace ,$content);
        return $content;
    }
    else {
        $content = $ref_content;
        $content = apply_filters('the_content', $content);
        $content = str_replace(']]>', ']]&gt;', $content);
        $content = str_replace($citate, $replace ,$content);
        return $content;
    }
}
function getRegistredImageSize () {
    global $_wp_additional_image_sizes;
    print '<pre>';
    print_r( $_wp_additional_image_sizes );
    print '</pre>';
}
// Further Button for AJAX posts
function getFurtherContentButton ($taxonomy='', $terms=0, $author=0, $search_string=0, $search_category=0, $search_tag=0, $search_dateTo=0, $search_dateFrom=0 ) {
    $content ="<div class=\"further-content-margin\"> </div><div class=\"further-content\">";
    $content .="<div id=\"more-posts\" data-taxonomy=\"".$taxonomy."\" data-terms=\"".$terms."\" data-author=\"". $author ."\" data-category=\"". (is_home()?3862:get_category_id()) ."\" data-search_string=\"".$search_string."\" data-search_category=\"".$search_category."\" data-search_tag=\"".$search_tag."\" data-dateTo=\"".$search_dateTo."\" data-dateFrom=\"".$search_dateFrom."\">Načíst další obsah</div>";
    $content .="</div>";
    echo  $content;
    //get_category_id()
}

/**
 * Get more posts AJAX
 *
 * @see ajax_load_posts
 * @param none
 * @return posts in template
 */

 function more_post_ajax(){
     $ppp = (isset($_POST["ppp"])) ? $_POST["ppp"] : 10;
     $page = (isset($_POST['pageNumber'])) ? $_POST['pageNumber'] : 0;
     $cat = (isset($_POST['cat'])) ? $_POST['cat'] : 0;
     $taxonomy = (isset($_POST['taxonomy'])) ? $_POST['taxonomy'] : 0;
     $terms = (isset($_POST['terms'])) ? $_POST['terms'] : 0;
     $author_id = (isset($_POST['author_id'])) ? $_POST['author_id'] : 0;
     $search_string = (isset($_POST['search_string'])) ? $_POST['search_string'] : 0;
     $search_category = (isset($_POST['search_category'])) ? $_POST['search_category'] : 0;
     $search_tag = (isset($_POST['search_tag'])) ? $_POST['search_tag'] : 0;
     $search_dateTo = (isset($_POST['search_dateTo'])) ? $_POST['search_dateTo'] : 0;
     $search_dateFrom = (isset($_POST['search_dateFrom'])) ? $_POST['search_dateFrom'] : 0;
     header("Content-Type: text/html");

     //$sticky =  get_option( 'sticky_posts' );
     //rsort($sticky);



     if($search_dateFrom!=""){
       $search_dateFrom = explode( '/', $search_dateFrom);
       $search_dateFrom =  array(
         'year'  => $search_dateFrom[2],
         'month' => $search_dateFrom[1],
         'day'   => $search_dateFrom[0],
       );
     }else{
       $search_dateFrom = "";
     }
     if($search_dateTo!=""){
       $search_dateTo = explode( '/', $search_dateTo);
       $search_dateTo = array(
         'year'  => $search_dateTo[2],
         'month' => $search_dateTo[1],
         'day'   => $search_dateTo[0],
       );

     }else{
       $search_dateTo = "";
     }

    if ($cat == null and $taxonomy == null ){
       $args = array(
           's'=> $search_string,
           'post_type' => 'post',
           'posts_per_page' => 10,
           'paged' => $page,
           'category_name' => $search_category,
           'tag' => $search_tag,
           'author' => $author_id,
           'date_query' => array(
             array(
               'before' => $search_dateTo,
               'after' => $search_dateFrom,
             )
           )

        );
     }else{
       if ($author_id) {
           $args = array(
               'suppress_filters' => true,
               'post_type' => 'post',
               'posts_per_page' => $ppp,
               'paged' => $page,
               'author'=>$author_id,
               'cat' => $cat,
               //'post__not_in' => array($sticky[0]),
               'ignore_sticky_posts' => 1,
           );

       }
       else
       {
           $args = array(
               'post_type' => 'post',
               'posts_per_page' => 10,
               'paged' => $page,
               'post__not_in' => array($sticky[0]),
               'ignore_sticky_posts' => 1,
               'tax_query' => array(
                   array(
                       'taxonomy' => $taxonomy,
                       'field' => 'id',
                       'terms' => $terms,
                       //    using a slug is also possible
                       //    'field' => 'slug',
                       //    'terms' => $qobj->name
                   )
               )
           );

       }


     }
     $query = new WP_Query($args);
     while ($query -> have_posts()) : $query->the_post();
     //var_dump($taxonomy);
         if(((artalk_in_artservis($terms) || artalk_get_current_category() == 'foto-report' || $taxonomy == 'post_tag' || $author_id) || ($search_string || $search_category || $search_tag || $search_dateTo || $search_dateFrom) ) and $cat != '3876') {
                 get_template_part('/templates/post-artservis');

             } else {
                 get_template_part('/templates/post');
             }
     endwhile;
     //if( have_posts() ) :
     //    while( have_posts() ): the_post();
     //       get_template_part('templates/post', artalk_in_artservis() );
     //  endwhile;
     //endif;
     wp_reset_postdata();
     //die();
 }
 add_action('wp_ajax_nopriv_more_post_ajax', 'more_post_ajax');
 add_action('wp_ajax_more_post_ajax', 'more_post_ajax');



function wp_author_info_box() {
			global $post;

            // Detect if it is a single post with a post author
			if ( (is_single() || is_author()) && isset( $post->post_author ) ) {

            // Get author's display name
				$display_name = get_the_author_meta( 'display_name', $post->post_author );

                // If display name is not available then use nickname as display name
			    if ( empty( $display_name ) ) {
					$display_name = get_the_author_meta( 'nickname', $post->post_author );
				}

                // Get author's biographical information or description
				$user_description = get_the_author_meta( 'user_description', $post->post_author );

                // Get author's website URL
				$user_website = get_the_author_meta( 'url', $post->post_author );

                // Get link to the author archive page
				$user_posts = get_author_posts_url( get_the_author_meta( 'ID', $post->post_author ) );

				if ( ! empty( $display_name ) ) {
					$author_details = '<div class="author-heading"><h2><a href="'.esc_url(get_author_posts_url(get_the_author_meta( 'ID', $post->post_author ))).'">' . $display_name . '</a></h2></div>';
				}

				if ( ! empty( $user_description ) ) // Author avatar and bio

				{
					$author_details .= '<p class="author_details">' . get_avatar( get_the_author_meta( 'user_email' ), 200 ,'403',null, array('class' => array('img-responsive', 'img-rounded') )) . nl2br( $user_description ) . '</p>';
				}

                // $author_details .= '<p class="author_links"><a href="'. $user_posts .'">View all posts by ' . $display_name . '</a>';

                // Check if author has a website in their profile
				if ( ! empty( $user_website ) ) {

                // Display author website link
					$author_details .= ' | <a href="' . $user_website . '" target="_blank" rel="nofollow">Website</a></p>';

				} else {
                // if there is no author website then just close the paragraph
					$author_details .= '</p>';
				}

                // Pass all this info to post content

				echo ' <div class="author-bio-section" >' . $author_details . '</div>';

			}
		}

/**
 * Get authors
 *
 * @see wp_list_authors()
 * @param $args Array
 * @return $authors Array
 */
function artalk_get_authors( $args = '', $letter = '') {
    global $wpdb;
    $letter = (get_query_var( 'c' ) == ''? 'A':get_query_var( 'c' ) );
    $defaults = array(
        'orderby'       => array('post_count' => 'DESC', 'name' => 'ASC'), // irelevant see usort below
        'number'        => '',
        'exclude'       => '',
        'include'       => '',
        'fields'        => 'all',
        'hide_empty'    => false,
    );
    //get_the_author_meta('description', $author->ID)
    $args = wp_parse_args( $args, $defaults );
    $query_args = wp_array_slice_assoc( $args, array( 'orderby', 'number', 'exclude', 'include', 'fields' ) );
    if ( ! $authors = get_users( $query_args ) )
        return array();
    $author_count = array();
    foreach ( (array) $wpdb->get_results( "SELECT DISTINCT post_author, COUNT(ID) AS count FROM $wpdb->posts WHERE " . get_private_posts_cap_sql( 'post' ) . " GROUP BY post_author" ) as $row ) {
        $author_count[$row->post_author] = $row->count;
    }

    foreach ( $authors as $author_index => $author ) {
       // var_dump(get_the_author_meta('description', $author_index));
        $posts = isset( $author_count[$author->ID] ) ? $author_count[$author->ID] : 0;
        if ( ! $posts && $args['hide_empty'] ) {
            unset($authors[$author_index]);
        }
        //var_dump(strlen(get_the_author_meta('description', $author->ID))>0);
        if (strlen(get_the_author_meta('description', $author->ID)) == 0 ){
           unset($authors[$author_index]);
        }
    }
    // sort by last name
    usort($authors, create_function('$a, $b', 'return strnatcasecmp(remove_accents($a->last_name), remove_accents($b->last_name));'));
    //echo $authors->data->display_name;

    //echo $filtered = array_filter($array, create_function('$a', 'return $a[0] == "' . $letter . '";'));
    $authors = array_filter($authors, create_function('$a', 'return remove_accents(end((explode(\' \',$a->data->display_name))))[0] == "' . $letter . '";'));
    //foreach ( $authors as $author ) {
        //var_dump($author);
        //var_dump(get_the_author_meta('description', $author->ID));
    //}
    //array_filter($authors, 'GetNamesByLetter use($that)');
    //var_dump($authors);
    return $authors;

}




function author_letter_line() {
    foreach (range('A', 'Z') as $char) {
        echo '<a href="'.esc_url( add_query_arg( 'c', $char ) ).'">'.$char . " ".'</a>';
    }
}
/**
 * Return author awatar if exists
 *
 * @see wp_list_authors()
 * @param $author Object
 * @return $content Html image or blank frame
 */
function artalk_awatar($authorID) {
    //var_dump(get_avatar($authorID));
    $content ='<div class="author-list-awatar '.(get_avatar($authorID) !== false? 'author-list-awatar-empty':'').'">';
    $content .= get_avatar($authorID , 200 ,'403',null, array('class' => array('img-responsive') )) ;
    $content .='</div>';
    return $content;

}

add_action ('artalk_revue_content','artalk_revue_content');
function artalk_revue_content ($category='',$echo=true,$class='',$liClass='')
{
    $args = array(
        'cat'=> $category,
        'post_type' => 'post'
    );

    $query = new WP_Query($args);


    $output = "";
    $output .= '<div class="col-md-12 col-xs-12 revue-sidebar-list nopadding">';
    $output .= "<ul>";
    while ($query -> have_posts()) : $query->the_post();
        $output .= '<li class="bott-border revue-list"><a class="revue-content-link" href="'.get_permalink().'"><span class="revue-sidebar-list">' . short_title_text_letter(''.get_the_title().'','...',43) . '</span><span class="revue-sidebar-name">' . get_the_author() . '</span></a></li>';
    endwhile;

    wp_reset_postdata();

    $output .= "</ul>";
    $output .= "</div>";


    if ( ! $echo )
        return $output;
    echo $output;
}
add_action ('artalk_revue_archive','artalk_revue_archive');
function artalk_revue_archive ($echo=true,$class='',$liClass='')
{

    $RevueArchive = get_Revue_Categories(false,'ASC');
    $output = "";
    $output .= '<div class="col-md-12 col-xs-12 revue-sidebar-list nopadding">';
    $output .= '<ul>';
    foreach ( $RevueArchive as $Revue ) {
        $RevueName=explode('%',$Revue->name);
        $output .= '<li class="bott-border revue-list"><a class="" href="' . get_category_link( $Revue->cat_ID ) . '"><span class="revue-sidebar-list">Artalk Revue ' . $RevueName[0] . '</span><span class="revue-sidebar-name">' . $RevueName[2] . '</span></a></li>';
    }
    $output .= "</ul>";
    $output .= "</div>";

    if ( ! $echo )
        return $output;
    echo $output;
}
