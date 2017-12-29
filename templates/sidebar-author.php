<aside id="sidebar" class="author-sidebar col-md-4 col-lg-4 col-md-4 col-sm-4 col-xs-12 noleftpadding sidebar_right text-center">

    <?php wp_author_info_box();?>

<!--        <div class="relatedposts">-->
<!--            <?php
/*            if (get_the_author_posts() > 1): */?>
            <div class="col-md-12 col-xs-12 recent-header nobottommargin">
                <h5>Dlaší články autora</h5>
            </div>
            <div class="relatedthumb">
                <?php /*echo get_related_author_posts() */?>
            </div>
        --><?php /*endif; */?>

<!--        </div>-->
    <?php get_template_part('templates/widgets/dynamic'); ?>
    <?php get_template_part('templates/widgets/social'); ?>
    <?php get_template_part('templates/widgets/dynamic2'); ?>
    <?php get_template_part('templates/widgets/dynamic3'); ?>
</aside>
<div class="clear"></div>
