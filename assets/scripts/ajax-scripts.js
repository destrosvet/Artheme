jQuery(document).ready( function($) {
    var ppp = 10; // Post per page
    var pageNumber = 2;
    var cat = $('#more_posts').data('category');

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
                $('#posts').find('article').remove();
                $("#posts").prepend('<h4 id="loading"> Příspěvky se načítají, prosím čekejte ... </h4>');
                $(window).scrollTop($(".logo-search-container").offset().top);
            },
            success: function (data) {
                var $data = $(data);

                if (data.length) {
                    $("#loading").remove();

                    $("#posts").prepend($data);
                    $("#more_posts").attr("disabled", false);
                } else {
                    $("#more_posts").attr("disabled", true);
                }
            },
            error: function (jqXHR, textStatus, errorThrown) {
                $loader.html(jqXHR + " :: " + textStatus + " :: " + errorThrown);
            }
        });
        return false;
    }

    jQuery(function ($) {
        $('#more_posts').click(function () { // When btn is pressed.
            $("#more_posts").attr("disabled", true); // Disable the button, temp.
            load_posts();
        });
    })
});
