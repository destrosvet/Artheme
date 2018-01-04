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

function get_child_cat_by_term(){
	$parent_term_id = get_queried_object()->term_id; // term id of parent term
	$taxonomies = array(
		'taxonomy' => 'category'
	);

	$args = array(
		// 'parent'         => $parent_term_id,
		'child_of'      => $parent_term_id
	);

	$terms = get_terms($taxonomies, $args);
//	var_dump($terms);
	if (sizeof($terms)>0)
	{
		foreach ( $terms as $term ) {
			// return posts
			$args = array(
				'tax_query' => array(
					array(
						'taxonomy' =>'category',
						'field' => 'id',
						'terms' =>  $term->term_id
					)
				)
			);

			$post_query = new WP_Query( $args );

			if ( $post_query->have_posts() ): ?>


					<?php while ( $post_query->have_posts() ): $post_query->the_post(); ?>
                        <li class="revude-sidebar""><a class="related-link" href="<?php the_permalink();?>">
                        <?php the_title(); ?></a></li>
                         <li class="revue-sidebar-author">
                          <?php the_author_posts_link() ?>
						</li>
					<?php endwhile; wp_reset_postdata(); ?>

				</ul>
			<?php endif;
		}
	}
}
function bg_popular_post($no_posts = 4,$category_name="") {
	$ppost = '';



    $popular = get_posts ($args);
    foreach ( $popular as $post ) : setup_postdata( $post );
//        var_dump(wp_get_post_categories($post->ID));
	    $show = short_title_text($post->post_title,'',10);
	    ?>
        <a href="<?php echo get_author_posts_url(get_the_author_meta( 'ID' )); ?>"><li class="revude-sidebar"><?php  echo "Artalk Revue". $id += 1; ?></a></li>
	    <?php
	    echo $ppost = '<ul><li class="revue-sidebar-author"><a class="related-link" href="'.get_permalink($post).'" title="'.get_the_title($post).'">'.$show.'</a></li></ul>';




    endforeach;
    $ppost.='</ul>';
    wp_reset_postdata();


}