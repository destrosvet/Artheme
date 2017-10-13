<!--<div class="post-meta">-->
	<span class="author-link"><?php the_author_posts_link(); ?></span> | <time><?php the_time( get_option( 'date_format' ) ); ?></time>
    <?php //edit_post_link( 'edit', ' | ' ); ?>
    <span class="post-meta-category">
        <?php do_action('artalk_post_cats','',array('separator' => ' ','main-category' => true),true); ?>
    </span>

<!--</div>-->