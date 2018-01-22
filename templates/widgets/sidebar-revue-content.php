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

    do_action(artalk_revue_content(get_query_var('cat'),true));

?>
