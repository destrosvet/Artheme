/**
 * Responsice panel notes
 */
$(document).ready(function() {
  $( '.citate-left' ).each(function() {
    if ($(window).width() < 1200) {
    $(".citate-left").hide();
    $("article .single-text-container").after($(".citate-left").html());
    }
  });
});
