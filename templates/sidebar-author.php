<div class="author-sidebar col-lg-4 col-md-4 col-sm-12 col-xs-12 noleftpadding sidebar_right">
    <aside id="sidebar" class="col-md-12 col-sm-12 col-xs-12 no-margin norightpadding padding-right-sm-10 sidebar-wrapper d-md-block d-sm-none text-center">

        <?php wp_author_info_box();?>

        <div class="relatedposts">
<!--            <?php
/*            if (get_the_author_posts() > 1): */?>
                <div class="col-md-12 col-xs-12 recent-header nobottommargin">
                    <h5>Dlaší články autora</h5>
                </div>
                <div class="relatedthumb">
                    <?php /*echo get_related_author_posts() */?>
                </div>
            --><?php /*endif; */?>

        </div>
        <?php get_template_part('templates/widgets/dynamic'); ?>
        <?php get_template_part('templates/widgets/dynamic2'); ?>
    </aside>
    <div class="clear"></div>
</div>