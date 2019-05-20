/**
 * Created by Filip Uhlir on 1.09.2017.
 * Positioner for citation blocks
 */

$(document).ready(function() {
    /* var lineDiv = '<div class="redline" ' +
        'style="border: 1px solid #ff0000;height:4px;width:800px;z-index: 1000; position:absolute;">'+
        '</div>';
    var lineCitDiv = '<div class="redline" ' +
        'style="border: 1px solid #00ff00;height:4px;width:400px;z-index: 1000; position:absolute;">'+
        '</div>'; */
    if ($( window ).width() > 1200) {
        $('a[href*="#_ftnref"]').each(function() {
            var suffix= $(this).attr("href").match(/\d+/);
            //console.log($('a[href="#_ftn'+suffix+'"]').position().top);
            var position = $('a[href="#_ftn'+suffix+'"]').position();

            $(this).parent().attr("class", "citate-left");
            $(this).parent().css({"top":  + position.top + "px"});
        });
        for (var i = 0; i < 1; i++) {
            $.each($('.citate-left'), function (index, value) {
                colliders_selector = this;

                $.each($('figure'), function (index, value) {
                    figure_selector = this;
                    if (colliders_selector != figure_selector && $(colliders_selector).collision(figure_selector).length !== 0) {

                        figure_center = $(figure_selector).position().top + ($(figure_selector).outerHeight(true) / 2);

                        //$(lineDiv).appendTo(figure_selector).css({"top":  + figure_center + "px"});

                        coliders_selector_bottom = $(colliders_selector).position().top + $(colliders_selector).outerHeight(true);
                        //$(lineCitDiv).appendTo(figure_selector).css({"top":  + $(colliders_selector).position().top + "px","height": + $(colliders_selector).outerHeight(true)+ "px"});

                        if (coliders_selector_bottom < figure_center) {
                            offsetPosition = coliders_selector_bottom - $(figure_selector).position().top + 10;
                            newPosition = $(colliders_selector).position().top - offsetPosition;
                            $(colliders_selector).css({"top": + newPosition + "px"});

                            //console.log($(figure_selector).collision(colliders_selector))
                        } else {
                            offsetPosition = ($(figure_selector).position().top + $(colliders_selector).outerHeight(true)) - $(colliders_selector).position().top + 20;
                            newPosition = $(colliders_selector).position().top + offsetPosition;
                            $(figure_selector).collision(colliders_selector).css({"top": + newPosition + "px"});
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
                            if ($(figure_selector).collision(objectInCollision).length !== 0) {
                                offsetPosition = $(figure_selector).outerHeight(true);
                                $(figure_selector).collision(objectInCollision).css({"top": "+=" + offsetPosition + "px"});
                            }
                        });

                    }
                });

            });

            $.each($('.citate-left'), function (index, value) {
                colliders_selector = this;

                $.each($('figure'), function (index, value) {
                    figure_selector = this;
                    if (colliders_selector != figure_selector && $(colliders_selector).collision(figure_selector).length !== 0) {

                        $('.citate-left').each(function() {
                            $(this).removeClass( "citate-left" );
                        });
                    }
                });

            });
        }
    }

});