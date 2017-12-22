<div class="relatedposts">
    <?php
    if (get_the_author_posts() > 1): ?>
        <div class="col-md-12 col-xs-12 recent-header nobottommargin">
            <h5>Další články autora</h5>
        </div>
        <div class="relatedthumb">
            <?php echo get_related_author_posts() ?>
        </div>
    <?php endif; ?>
</div>