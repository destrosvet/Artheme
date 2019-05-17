/**
 * Created by Filip Uhlir on 1.09.2017.
 * Positioner for citation blocks
 */

$(document).ready(function() {
    if ($( window ).width() > 1200) {
        $('a[href*="#_ftnref"]').each(function() {
            var suffix= $(this).attr("href").match(/\d+/);
            console.log($('a[href="#_ftn'+suffix+'"]').position().top);
            var position = $('a[href="#_ftn'+suffix+'"]').position();

            $(this).parent().attr("class", "citate-left");
            $(this).parent().css({"top":  + position.top + "px"});
        });

        $.each($('.citate-left'), function (index, value) {
            colliders_selector = this;

            $.each($('figure'), function (index, value) {
                figure_selector = this;
                if (colliders_selector != figure_selector && $(colliders_selector).collision(figure_selector).length !== 0) {


                    figure_center = $(figure_selector).offset().top + ($(figure_selector).outerHeight(true) / 2);
                    coliders_selector_bottom = $(colliders_selector).offset().top + $(colliders_selector).outerHeight(true);

                    if (coliders_selector_bottom < figure_center) {
                        offsetPosition = $(colliders_selector).offset().top + $(colliders_selector).outerHeight(true) - $(figure_selector).offset().top + 20;
                        console.log(offsetPosition);
                        console.log($(colliders_selector).collision(figure_selector));
                        $(figure_selector).collision(colliders_selector).css({"top": "-=" + offsetPosition + "px"});
                    }

                }
            });

        });

        $.each($('.citate-left'), function (index, value) {
            colliders_selector = this;

            $.each($('.citate-left'), function (index, value) {
                obstacles_selector = this;
                if (colliders_selector != obstacles_selector && $(colliders_selector).collision(obstacles_selector).length !== 0) {
                        offsetPosition = $(colliders_selector).offset().top + $(colliders_selector).outerHeight(true) - $(obstacles_selector).offset().top + 20;
                        objectInCollision = $(colliders_selector).collision(obstacles_selector);
                        objectInCollision.css({"top": "+=" + offsetPosition + "px"});


                        $.each($('figure'), function (index, value) {
                            figure_selector = this;
                            if ($(figure_selector).collision(objectInCollision).length !== 0 ) {
                                offsetPosition = $(figure_selector).outerHeight(true);
                                $(figure_selector).collision(objectInCollision).css({"top": "+=" + offsetPosition + "px"});
                            }
                    });

                }
            });

        });
    }

});