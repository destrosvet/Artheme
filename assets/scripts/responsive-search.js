/**
 * Responsive search for version(480px - 768px)
 */

$(document).ready(function() {
  if($(window).width() < 769){
    $("#search-button").prop( "disabled", true );
  }
  $("#search-button img").click(function() {
    if($(window).width() < 769){
      $("#search-text").show();
      $("#search-button-mobile").show();
    }  
  });
  $(window).resize(function(){
    if($(window).width() < 769){
      $("#search-button").prop( "disabled", true );
    }else{
      $("#search-button").prop( "disabled", false );
      $("#search-button-mobile").hide();
    }
  });
});
