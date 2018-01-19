<?php
/**
 * Artalk Revue Template
 * User: Filip Uhlir
 * Date: 22.08.2017
 * Time: 12:32
 */
?>

<?php (!is_category()?'':get_header());?>
<?php
$lastCategory = get_last_subcategory();
$lastCategoryName = explode('%',$lastCategory->name);
?>
<div class="row revue">
    <div class="col-lg-8 col-md-8  col-sm-12 col-xs-12 revue-feature">
        <div class="col-md-6">
            <div class="revue-name">
                Artalk Revue
                <?php echo $lastCategoryName[1]; ?>
            </div>
            <div class="revue-number"> <?php echo $lastCategoryName[0]; ?></div>
        </div>
        <div class="col-md-6">
            <div class="revue-decription">
                <?php echo $lastCategoryName[2]; ?>
                <?php echo $lastCategory->description; ?>
            </div>
        </div>

    </div>
    <?php get_template_part('templates/sidebar-revue', 'single'); ?>

    <?php get_sidebar(); ?>

    <?php  get_template_part('templates/single-revue'); ?>
