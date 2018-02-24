<?php
/**
 * Artalk Revue Sidebar Template
 * User: Filip Uhlir
 * Date: 22.09.2017
 * Time: 12:32
 */
?>

<aside id="sidebar" class="col-md-4 col-xs-12 <?php echo (is_category()? '':'norightpadding');?> revue-sidebar d-md-block">
    <?php get_template_part('templates/widgets/sidebar-revue-content'); ?>
</aside>
