<article>
    <div class="col-md-6 col-sm-6 post-container-grid">
        <div class="post-category post-service-content">
            <header>
                <h2 class="post-title">
                    <a href="<?php the_permalink(); ?>" rel="bookmark"><?php echo short_title('...',12  );?></a>
                </h2>
            </header>

            <div class="content-service-excerpt hidden-text">
                <?php echo short_title_text_letter(get_the_excerpt($post),'...',260); ?>
            </div>
            <footer class="post-meta">
                <?php get_template_part('templates/post-meta'); ?>
            </footer>
        </div>
    </div>

</article>
