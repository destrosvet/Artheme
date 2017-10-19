jQuery(document).ready( function($) {
    var ppp = 10; // Post per page
    var pageNumber = 2;
    var cat = $('#more-posts').data('category');

    function load_posts() {
        pageNumber++;
        $.ajax({
            type: "POST",
            dataType: "html",
            url: ajax.ajaxurl,
            data: {
                'cat': cat,
                'ppp': ppp,
                'pageNumber': pageNumber,
                'action': 'more_post_ajax'
            },
            beforeSend: function (xhr) {
                // $('#posts').find('article').remove();
                $("#more-posts").text('Načítá se obsah, prosím čekejte ...');
                //$("#posts").append('<h4 id="loading"> Příspěvky se načítají, prosím čekejte ... </h4>');
                $(window).scrollTop($("#more-posts").offset().top);
            },
            success: function (data) {
                var $data = $(data);

                if (data.length) {
                    //$("#loading").remove();

                    $("#posts").append($data);
                    $("#more-posts").attr("disabled", false);
                    $("#more-posts").text('Načíst další obsah');
                    $("#posts").append($(".further-content"));
                } else {
                    $("#more-posts").attr("disabled", true);
                }
            },
            error: function (jqXHR, textStatus, errorThrown) {
                $loader.html(jqXHR + " :: " + textStatus + " :: " + errorThrown);
            }
        });
        return false;
    }

    jQuery(function ($) {
        $('#more-posts').click(function () { // When btn is pressed.
            $("#more-posts").attr("disabled", true); // Disable the button, temp.
            load_posts();
        });
    })
});
