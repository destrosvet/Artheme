<?php
/**
 * Newsleeter form
 * User: Filip Uhlir
 * Date: 20.01.2017
 * Time: 15:30
 */
?>
<div class="row">
    <div class="col-md-12 col-xs-12 recent-header nobottommargin">
        <h5>Artalk newsletter</h5>
    </div>
    <div class="artalk-widget newsletter-widget">

        <?php $form_widget = new \MailPoet\Form\Widget();
        echo $form_widget->widget(array('form' => 1, 'form_type' => 'php')); ?>

    </div>
</div>

