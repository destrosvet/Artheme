<?php
/**
 * Popular posts
 * User: Filip Uhlir
 * Date: 20.01.2017
 * Time: 15:30
 */

        if(preg_match('/artalkr/',artalk_get_current_category()) == 1){
?>
<div class="row">
    <div class="col-md-12 col-xs-12 recent-header">
            <h5>Child</h5>
    </div>
    <div class="col-md-12 col-xs-12 side-recent-item">
	    <?php get_child_cat_by_term()?>

</div>
    <br>
    <div class="col-md-12 col-xs-12 recent-header">
        <h5>Parent</h5>
    </div>
    <br>
    <div class="col-md-12 col-xs-12 side-recent-item">
	    <?php bg_popular_post(6); ?>
    </div>
</div>
<?php
         }
        else{ ?>
<div class="row">
    <div class="col-md-12 col-xs-12 recent-header">
            <h5>Nejčtenější články</h5>
    </div>

    <div class="col-md-12 col-xs-12 side-recent-item">
        <?php bg_popular_post(); ?>
</div>
</div>
<?php
        }
?>

