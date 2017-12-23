/**
 * Responsive short menu for version(480px - 768px)
 */
 $(document).ready(function() {
   $(window).resize(function(){
     $(".main-menu").css('visibility','hidden');
     $(".main-menu").show();
     $(".short-main-menu").hide();
     if($("#myNavbar").height() > 40 && $("#myNavbar").height() < 100 ){
       $(".main-menu").hide();
       $(".short-main-menu").show();
     }else{
       $(".main-menu").css('visibility','visible');
       $(".main-menu").show();
       $(".short-main-menu").hide();
     }
   });
   $(".main-menu").css('visibility','hidden');
   $(".main-menu").show();
   $(".short-main-menu").hide();
   if($("#myNavbar").height() > 40 && $("#myNavbar").height() < 100 ){
     $(".main-menu").hide();
     $(".short-main-menu").show();
   }else{
     $(".main-menu").css('visibility','visible');
     $(".main-menu").show();
     $(".short-main-menu").hide();
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
