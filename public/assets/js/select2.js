(function ($) {
    'use strict';

    if ($('.countries').length) {
        $(".countries").select2();
    }
    if ($(".dropdown-select-single").length) {
        $(".dropdown-select-single").select2();
    }
    if ($(".dropdown-select-multiple").length) {
        $(".dropdown-select-multiple").select2();
    }
})(jQuery);
