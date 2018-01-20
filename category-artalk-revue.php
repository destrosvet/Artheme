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
    if (get_queried_object()->parent) {
        $ActualRevue = get_queried_object();
        $ActualRevueName = explode('%',$ActualRevue->name);

    }
    else {
        $ActualRevue = get_Revue_Categories(true);
        $ActualRevueName = explode('%',$ActualRevue->name);
    }

?>
<div class="row revue">
    <div class="col-lg-8 col-md-8  col-sm-12 col-xs-12 revue-feature">
        <div class="col-md-6 noleftpadding">
            <div class="revue-name">
                Artalk Revue
                <span class="revue-actual-date"><?php echo $ActualRevueName[1]; ?></span>
            </div>
            <div class="revue-number"> <?php echo $ActualRevueName[0]; ?></div>
        </div>
        <div class="col-md-6">
            <div class="revue-name">
                <?php echo $ActualRevueName[2]; ?>
            </div>
            <div class="revue-decription">
                <?php echo $ActualRevue->description; ?>
            </div>
        </div>

    </div>
    <?php get_template_part('templates/sidebar-revue', 'single'); ?>

    <?php get_sidebar(); ?>

    <?php  include(locate_template('templates/single-revue.php')); ?>
