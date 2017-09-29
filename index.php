<?php get_header(); ?>
<?php  get_template_part('templates/magazine'); ?>
<?php  get_template_part('templates/main-loop'); ?>
<?php //get_template_part('templates/pagination'); ?>

<?php get_footer();
global $_wp_additional_image_sizes;
print '<pre>';
print_r( $_wp_additional_image_sizes );
print '</pre>';?>