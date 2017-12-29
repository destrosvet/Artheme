<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 noleftpadding sidebar_right">
    <aside id="sidebar" class="col-md-12 col-sm-12 col-xs-12 no-margin norightpadding padding-right-sm-10 sidebar-wrapper d-md-block d-sm-none text-center">

        <?php wp_author_info_box();?>

        <?php get_template_part('templates/widgets/sidebar-author-related-posts'); ?>
        <?php get_template_part('templates/widgets/sidebar-related-posts'); ?>
        <?php get_template_part('templates/widgets/dynamic'); ?>
        <?php get_template_part('templates/widgets/social') ?>
        <?php get_template_part('templates/widgets/dynamic2'); ?>
    </aside>

    <div class="clear"></div>
</div>