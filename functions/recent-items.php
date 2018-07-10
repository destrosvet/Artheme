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
    $args = array('post_type' => 'post', 'posts_per_page' => $no_posts, 'meta_key' => 'popular_posts', 'orderby' => 'meta_value_num', 'category_name' => artalk_get_current_category(), 'date_query' => array('after' => '1 month ago'), 'order' => 'DESC' );

    $popular = get_posts ($args);

    $ppost.='<ul class="popular-posts">';
    foreach ( $popular as $post ) : setup_postdata( $post );
        $ppost.= '<li class="twice-sm bott-border"><a  href="'.get_author_posts_url( get_the_author_meta( 'ID' )).'" class="popular-posts-name">&#9679; '.get_the_author().'</a>
<a class="xs-top-margin" href="'.get_permalink($post).'" title="'.get_the_title($post).'">'.short_title_text_letter ($post->post_title,'...',56).'</a></li>';

    endforeach;
    $ppost.='</ul>';
    wp_reset_postdata();
    echo $ppost;
}
