<?php get_header(); ?>

    <div class="row">

        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12 ">

            <div class="row">

				<?php

				if( have_posts() ):

					while( have_posts() ): the_post(); ?>

						<?php get_template_part('content', 'search'); ?>

					<?php endwhile;

				endif;

				?>
            </div>

        </div>

        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 ">
            <br>
	        <?php  get_template_part('templates/widgets/sidebar-popular-posts') ?>
        </div>

    </div>

<?php get_footer(); ?>