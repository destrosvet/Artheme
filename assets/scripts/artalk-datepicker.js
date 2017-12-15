/**
 * Created by Teapot on 1.12.2017.
 */
;(function ($, window, undefined) {
    'use strict';
    $(document).ready(function () {
        $(function () {
            $('.datepicker-from input, .datepicker-until input').datepicker({
                todayBtn: true,
                clearBtn: true,
                language: "cs",
                orientation: "bottom auto",
                toggleActive: false
            });
        });
    });
})(jQuery, this);