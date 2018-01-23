jQuery(document).ready( function($) {
    var ppp = 10; // Post per page
    var pageNumber = 1;
    var cat = $('#more-posts').data('category');
    var author = $('#more-posts').data('author');
    var taxonomy = $('#more-posts').data('taxonomy');
    var terms = $('#more-posts').data('terms');
    var search_string = $('#more-posts').data('search_string');
    var search_category = $('#more-posts').data('search_category');
    var search_tag = $('#more-posts').data('search_tag');
    var search_dateTo = $('#more-posts').data('dateto');
    var search_dateFrom = $('#more-posts').data('datefrom');
    function load_posts() {
        pageNumber++;
        $.ajax({
            type: "POST",
            dataType: "html",
            url: ajax.ajaxurl,
            data: {
                'cat': cat,
                'taxonomy': taxonomy,
                'terms': terms,
                'author_id':author,
                'ppp': ppp,
                'pageNumber': pageNumber,
                'search_string' : search_string,
                'search_category' : search_category,
                'search_tag' : search_tag,
                'search_dateTo' : search_dateTo,
                'search_dateFrom' : search_dateFrom,
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
