/**
 * Responsive short menu for version(480px - 768px)
 */
$(document).ready(function() {
    if($("#myNavbar").height() > 30 && $("#myNavbar").height() < 100 ){
      if ($( "#myNavbar li" ).size() > 7){
          $("#myNavbar li:nth-child(6)").after(
            "<li id='short-menu-button'><a>Více <span class='caret'></span></a></li>"
          );
          liNumber = 0;
          $("#myNavbar li").each(function(){
            liNumber++;
            if(liNumber > 7){
              $(this).addClass("short-menu");
            }
          });
          $("#myNavbar li:nth-child("+ $( "#myNavbar li" ).size() +")").removeClass("short-menu");
          $("li.short-menu").css("display", "none");
          $(".navbar-nav > li.short-menu").css("float", "right");
          $(".navbar-nav > li.short-menu").css("border-top", "1px solid");
          $(".navbar-nav > li.short-menu").css("clear", "both");
          $(".navbar-nav > li.short-menu").css("width", "225px");
          $(".navbar-nav > li.short-menu").css("text-align", "center");
          $("#short-menu-button a").css("display", "block");
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
    $(window).resize(function(){
      if($("#myNavbar").height() > 30 && $("#myNavbar").height() < 100 ){
          $("li.short-menu").css("display", "none");
          $(".navbar-nav > li.short-menu").css("float", "right");
          $(".navbar-nav > li.short-menu").css("border-top", "1px solid");
          $(".navbar-nav > li.short-menu").css("clear", "both");
          $(".navbar-nav > li.short-menu").css("width", "225px");
          $(".navbar-nav > li.short-menu").css("text-align", "center");
          $("#short-menu-button a").css("display", "block");
      }else{
          $("li.short-menu").css("display", "block");
          $(".navbar-nav > li.short-menu").css("float", "left");
          $(".navbar-nav > li.short-menu").css("border-top", "none");
          $(".navbar-nav > li.short-menu").css("clear", "none");
          $(".navbar-nav > li.short-menu").css("width", "auto");
          $("#short-menu-button a").css("display", "none");
      }
    });
});
