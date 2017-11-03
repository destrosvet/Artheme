jQuery(document).ready( function($) {
    var ppp = 10; // Post per page
    var pageNumber = 1;
    var cat = $('#more-posts').data('category');
    var author = $('#more-posts').data('author');

    function load_posts() {
        pageNumber++;
        $.ajax({
            type: "POST",
            dataType: "html",
            url: ajax.ajaxurl,
            data: {
                'cat': cat,
                'author_id':author,
                'ppp': ppp,
                'pageNumber': pageNumber,
                'action': 'more_post_ajax'
            },
            beforeSend: function (xhr) {
                // $('#posts').find('article').remove();
                $("#more-posts").text('Načítá se obsah, prosím čekejte ...');
                $(window).scrollTop($("#more-posts").offset().top);
            },
            success: function (data) {
                var $data = $(data);
                console.log(data.length);
                if (data.length > 1) {
                    //$("#loading").remove();

                    $("#posts").append($data);
                    $("#more-posts").attr("disabled", false);
                    $("#more-posts").text('Načíst další obsah');
                    $("#posts").append($(".further-content"));
                } else {
                    $("#more-posts").attr("disabled", true);
                    $(".further-content").remove();
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
