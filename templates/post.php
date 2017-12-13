<article>
	<div class="col-md-6 col-sm-6 post-container-grid">
        <div class="post post-content">
            <header>
                <h2 class="post-title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title() ?></a></h2>
            </header>
                <?php if ( has_post_thumbnail() ) : ?>
                    <div class="image_container">
                        <a class="thumb-link" href="<?php the_permalink(); ?>">
                        <?php echo get_the_post_thumbnail($post, 'post-thumbnail',array('class' => 'img-responsive')); ?>
                        </a>
                    </div>
                <?php endif; ?>

            <div class="content-excerpt">
                <?php echo the_excerpt();  ?>
            </div>
            <footer class="post-meta">
                <?php get_template_part('templates/post-meta'); ?>
            </footer>
        </div>
	</div>

</article>
