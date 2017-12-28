/**
 * Responsive search for version(480px - 768px)
 */

$(document).ready(function() {
  $("#search-button").click(function(event){
    if($(window).width() < 769){
      event.preventDefault();
      $("#search-text").show();
      $("#search-button-mobile").show();
    }
  });
  $(window).resize(function(){
    if($(window).width() > 768){
      $("#search-button-mobile").hide();
    }
  });
});
