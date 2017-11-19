<?php
/**
 *
 * User: Filip Uhlir
 * Date: 20.01.2017
 * Time: 15:27
 */
function bg_recent_comments($no_comments = 3, $comment_len = 30, $avatar_size = 48) {
    $comments_query = new WP_Comment_Query();
    $comments = $comments_query->query( array( 'number' => $no_comments ) );
    $comm = '<ul class="recent-comments">';
    if ( $comments ) : foreach ( $comments as $comment ) :
        $comm .= '<li class="bott-border"><a class="recent-comments-post xs-top-margin" href="' . get_permalink( $comment->comment_post_ID ). '">&#9679; '.short_title_text_letter($comment->post_title,'...',45).'</a>';
        $comm .= ''.short_title_text_letter($comment->comment_author,'',50).': ';
        $comm .= '<a class="recent-comments-excerpt" href="' . get_permalink( $comment->comment_post_ID ) . '#comment-' . $comment->comment_ID . '">';
        $comm .= short_title_text_letter( $comment->comment_content,'...',100 ). '</a></li>';
        //$comm .= '<li><a class="author" href="' . get_permalink( $comment->comment_post_ID ) . '#comment-' . $comment->comment_ID . '">';
        //$comm .= $comment->post_title . '</a> ';
        //$comm .= '<p>' .  wp_trim_words( $comment->comment_content , $num_words = 8, $more = '… ' ).'</p></li>';
    endforeach; else :
        $comm .= 'No comments.';
    endif;
    $comm .= '</ul>';
    echo $comm;
}

function bg_popular_post($no_posts = 4) {
    $ppost ='';
    //$popular = new WP_Query(array('posts_per_page'=>1, 'meta_key'=>'popular_posts', 'orderby'=>'meta_value_num', 'order'=>'DESC'));
    $args = array('post_type' => 'post', 'posts_per_page' => $no_posts, 'meta_key' => 'popular_posts', 'orderby' => 'meta_value_num','order' => 'DESC' );
    //$args = array('meta_key'=>'popular_posts');
/*    $args = array(
        'posts_per_page' => 5,
        'meta_query' => array(
            array(
                'key'     => 'popular_posts',
                'value'   => '0',
                'compare' => '>'
        ),
    ),
);*/
    $popular = get_posts ($args);

    //echo $GLOBALS['wp_query']->request;
    //while ($popular->have_posts()) : $popular->the_post();
     //   echo the_title();
	//$ppost.='<li><a href="'.the_permalink().'">'.the_title().'</a></li>';
    //endwhile;
    //var_dump($popular);
    $ppost.='<ul class="">';
    foreach ( $popular as $post ) : setup_postdata( $post );
        $ppost.= '<li class="twice-sm bott-border"><a class="xs-top-margin" href="'.get_permalink($post).'" title="'.get_the_title($post).'">&#9679; '.$post->post_title.'</a></li>';

    endforeach;
    $ppost.='</ul>';
    wp_reset_postdata();
    echo $ppost;
}