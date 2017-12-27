/**
 * Created by Teapot on 1.12.2017.
 */
;(function ($, window, undefined) {
    'use strict';
    $(document).ready(function () {
        $(function () {
            $('.datepicker-from input, .datepicker-until input').datepicker({
                format: "dd/mm/yyyy",
                todayBtn: true,
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
        $("input[name='category']").val($("button.ms-choice > span").text());
    });
})(jQuery, this);
