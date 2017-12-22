/**
 * Responsive short menu for version(480px - 768px)
 */
 $(document).ready(function() {
   $(window).resize(function(){
     $("#menu-main-menu-top").css('visibility','hidden');
     $("#menu-main-menu-top").show();
     $("#menu-short-main-menu").hide();
     if($("#myNavbar").height() > 40 && $("#myNavbar").height() < 70 ){
       $("#menu-main-menu-top").hide();
       $("#menu-short-main-menu").show();
     }else{
       $("#menu-main-menu-top").css('visibility','visible');
       $("#menu-main-menu-top").show();
       $("#menu-short-main-menu").hide();
     }
   });
   $("#menu-main-menu-top").css('visibility','hidden');
   $("#menu-main-menu-top").show();
   $("#menu-short-main-menu").hide();
   if($("#myNavbar").height() > 40 && $("#myNavbar").height() < 70 ){
     $("#menu-main-menu-top").hide();
     $("#menu-short-main-menu").show();
   }else{
     $("#menu-main-menu-top").css('visibility','visible');
     $("#menu-main-menu-top").show();
     $("#menu-short-main-menu").hide();
   }

   $( ".menu-item-has-children" ).click(function(event) {
     event.preventDefault();
   if($(".sub-menu").is(':visible')){
     $(".sub-menu").hide("slow");
   }else{
     $(".sub-menu").show("slow");
   }
 });
 });
