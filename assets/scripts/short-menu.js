/**
 * Responsive short menu for version(480px - 768px)
 */
$(document).ready(function() {
    if($(window).width() > 769 && $(window).width() < 990 ){
      if ($( "#myNavbar li" ).size() > 7){
          $("#myNavbar li:nth-child(6)").after(
            "<li id='short-menu-button'><a>Více</a></li>"
          );
          liNumber = 0;
          $("#myNavbar li").each(function(){
            liNumber++;
            if(liNumber > 7){
              $(this).addClass("short-menu");
            }
          });
          $("#myNavbar li:nth-child("+ $( "#myNavbar li" ).size() +")").removeClass("short-menu");
      }
      $( document ).on( "click", "#short-menu-button", function() {
        if ($('.short-menu').is(':visible')) {
          $(".short-menu").hide("slow");
            $("#myNavbar li:eq(10)").after($("#myNavbar li:eq(7)"));
        }else{
          $(".short-menu").show("slow");
          $("#myNavbar li:eq(7)").before($("#myNavbar li:eq(10)"));
        }
      });
    }
});
