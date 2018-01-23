/**
 * Created by Teapot on 1.12.2017.
 */
;(function ($, window, undefined) {
    'use strict';
    $(document).ready(function () {
        $(function () {
            $('.datepicker-from input, .datepicker-until input').datepicker({
                format: "dd/mm/yyyy",
                todayBtn: "linked",
                clearBtn: true,
                language: "cs",
                orientation: "bottom auto",
                toggleActive: false
            });
        });
        $(function () {
            $('#category-select').multipleSelect({
                width: '70%'
            });
            $('#category-select').multipleSelect("checkAll");
        });
    });




    $( document ).on( "change", ".ms-drop input[type='checkbox']", function() {
      if($("button.ms-choice > span").text() == "Vše vybráno" ){
        $("input[name='category']").val($("button.ms-choice > span").text());
        $("input[name='categoryText']").val($("button.ms-choice > span").text());
      }else {
        $("input[name='category']").val("");
        var  countCategories =  $( ".category-select li" ).length;
        var i = 1;
        while(countCategories >= i){
          if( $(".category-select li:nth-child("+i+") input").is(':checked') ){
            $("input[name='category']").val($("input[name='category']").val() +","+  $(".category-select li:nth-child("+i+") input").val());
          }
          i++;
        }
        $("input[name='category']").val($("input[name='category']").val().replace(/^,|,$/g,''));
        $("input[name='categoryText']").val($("button.ms-choice > span").text());
      }
    });

})(jQuery, this);

$(document).ready(function() {
    $(window).load(function() {
      if($( "input[name='categoryText']" ).val() != ""){
        $( "button.ms-choice span" ).text($( "input[name='categoryText']" ).val());
      }
      var categories = $( "input[name='category']" ).val();
      if(categories != ""){
      $( ".ms-drop input[type='checkbox']" ).prop( "checked", false );
      var category = categories.split(',');
      $( category ).each(function() {

            $( ".ms-drop input[value='"+this+"']" ).prop( "checked", true );
      });
      }
  });
});
