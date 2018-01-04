
<?php  query_posts( '&posts_per_page=1' ); ?>
<article>
        <div class="col-md-12 ">
            <div class="col-md-6">
            <header class="header-revue">
                <h2 class="post-title-child no-margin no-margin-bottom" style="width: 80%; margin-top: 10px;">Artalk Revue</h2>
                <h2 class="post-title-child no-margin no-margin-bottom" style="width: 20%; float: right; margin-top: 10px;"><?php  the_time('n/Y'); ?></h2>
            </header>
            <?php if ( has_post_thumbnail() ) :?>
                <div class="" >
                    <a class="thumb-link" href="<?php the_permalink(); ?>">
                        <?php echo get_the_post_thumbnail($post, 'featured',array('class' => 'img-responsive')); ?>
                    </a>
                </div>
            <?php endif; ?>
            </div>
            <div class="col-md-6">
            <h2 class="post-title-child no-margin" style="margin-top: 10px;"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title() ?> </a></h2>

            <div class="content excerpt">
                <?php  the_excerpt();  ?>
            </div>
            </div>


        </div>

</article>

