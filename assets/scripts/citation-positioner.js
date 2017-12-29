/**
 * Created by Filip Uhlir on 1.09.2017.
 * Positioner for citation blocks
 */

$(document).ready(function() {
    if ($( window ).width() > 1200) {

        $.each($('.citate-left'), function (index, value) {
            colliders_selector = this;

            $.each($('.citate-left'), function (index, value) {
                obstacles_selector = this;
                if (colliders_selector != obstacles_selector && $(colliders_selector).collision(obstacles_selector).length !== 0) {
                    offsetPosition = $(colliders_selector).offset().top + $(colliders_selector).outerHeight(true) - $(obstacles_selector).offset().top + 20;
                    $(colliders_selector).collision(obstacles_selector).css({"top": "+=" + offsetPosition + "px"});

                }
            });

        });
    }

});