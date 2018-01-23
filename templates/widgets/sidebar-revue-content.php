<?php
/**
 * Artalk Revue Content Widget
 * User: Filip Uhlir
 * Date: 22.09.2017
 * Time: 12:32
 */
?>
<div class="revue-content-title"><span>Obsah čísla</span></div>
<?php

    if (is_category()) {

        if (get_query_var('cat') == get_cat_ID('Artalk Revue')) {
            $RevueCat = get_Revue_Categories(true)->cat_ID;

        }
            else
        {
            $RevueCat  = get_query_var('cat');
        }
    }
        else
    {
        $category = get_the_category();
        $RevueCat = $category[0]->cat_ID;
    }

    do_action(artalk_revue_content($RevueCat),true);

?>
