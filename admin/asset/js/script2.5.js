jQuery(document).ready(function(){
    var div = jQuery('#ztTestimonialModule').parent();
    div.css("margin-left","5px");
    var style = jQuery('#jform_params_styleTestimonial');
    //alert(style.val());
    loadStyle();
    function loadStyle(){

        var item = jQuery('#jform_params_item').parent();
        var arrowSetting = jQuery('#jform_params_arrow').parent();
        var indicatorBar = jQuery('#jform_params_indicators').parent();
        var descriptionAboutUs = jQuery('#jform_params_descriptionAboutUs').parent();

        switch (style.val()){
            case 'default':
                item.hide();
                descriptionAboutUs.hide();
                arrowSetting.show();
                indicatorBar.show();
                break;
            case 'aboutUs':
                item.show();
                descriptionAboutUs.show();
                arrowSetting.hide();
                indicatorBar.hide();
                break;
        }
    }
    style.on('change',function(e){
        loadStyle();
    });
    var titleTestimonial = jQuery(".zt-testimonial-title");
    function smallContainer(title) {
        var container = jQuery(title).parents(".container");
        var handel = container.prev(".ztTestimonialHandle");
        if(container.height() <60){
            container.css("height","100%");
            handel.css("height","100%");
        } else {
            container.css("height","30px");
            handel.css("height","30px")
        }
    }
    titleTestimonial.on('click',function() {
        smallContainer(this);
    });
});
