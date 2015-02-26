if (typeof jQuery != 'undefined') {
    (function($) {
        $(document).ready(function(){
            $('.carousel').each(function(index, element) {
                $(this)[index].slide = null;
            });
        });
    })(jQuery);
}
