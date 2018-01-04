<?php get_header();
echo "child"?>
<div class="row">
	<article>
		<div class="col-lg-8 col-md-8  col-sm-8 col-xs-12 no-margin no-padding-sm single-content">

			<?php if (have_posts()) : while (have_posts()) : the_post();?>

			<div class="col-lg-9 col-md-9 col-sm-12 col-xs-12 padding-left-sm-10 article-single-title nopadding-i">
				<h1><?php the_title(); ?></h1>
			</div>
			<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 padding-right-sm-45 no-padding-left padding-right-45-lg">

			</div>


			<div class="col-lg-12 col-sm-12 col-xs-12 padding-sm-12 single-fotoreport-container">
				<?php
				the_content();
				?>

				<?php break;endwhile; else: ?>

					<h3>Omlouváme se, nic jsme nenašli.</h3>

				<?php endif;

				?>

				<div class="clear"></div>
			</div>

		</div>




		<div id="comments" class="col-lg-8 col-md-8 col-xs-12 noleftpadding no-padding-right-md">
			<?php  get_post_tags($post->ID); ?>
			<?php  comments_template(); ?>
	</article>
</div><!--//content-->

