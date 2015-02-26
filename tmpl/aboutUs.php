<?php
defined( '_JEXEC' ) or die( 'Access Deny' );
$document = JFactory::getDocument();
$uri = JURI::getInstance();

$arr=   $this->parsedData['arrayTestimonial'];
$str ='';
$str .='<div class="zt-module-testimonial-description">'.$this->parsedData['descriptionAboutUs'].'</div>';
$str .='<div id="module_'.$module->id.'" class="owl-carousel zt-module-testimonial">';
foreach ($arr as $key=>$test) {
    $str .= '<div class="zt-testimonial">';
if($this->parsedData['avatar']){
    $linkAvatar = str_replace(' ', '', $test->linkAvatar);
    if($linkAvatar !=='') {
        $str .= '<a href="'. $linkAvatar.'">';
    }
    $str .= '<div class="zt-avatar">';
    $str .= '<img src="'.$uri->root().$test->urlAvatar.'">';
    $str .= '<div class="overlay"></div>';
    $str .= '</div>';//end zt-avatar
    if($linkAvatar !=='') {
        $str .= '</a>';
    }
}
    $str .= '<div class="zt-information">';
if($this->parsedData['name']){
    $linkName = str_replace(' ', '', $test->linkName);
    if($linkName !=='') {
        $str .= '<a href="'. $linkName.'">';
    }
    $str .= '<h4 class="zt-info-name">'.$test->name.'</h4>';
    if($linkName !=='') {
        $str .= '</a>';
    }
}
if($this->parsedData['position']){
    $str .= '<span class="zt-info-position">'.$test->position.'</span>';
}
if($this->parsedData['email']){
    $str .= '<div class="zt-info-email">Email: '.$test->email.'</div>';
}
if($this->parsedData['website']){

    $str .= '<div>';
    $website = $this->checkWebsite($test->website);
    $str .= 'Website: <a href="'.$website.'" target="_blank">'.$website.'</a>';
    $str .= '</div>';

}
    $str .= '<p class="zt-content">'.$test->testimonial.'</p>';

    $str .= '<ul class="zt-member-social-links">';


    if($test->twitter!=='' or $test->facebook!=='' or $test->google!=='' or $test->linkedin!=='' or $test->printerest!==''){
        if($test->facebook!=='' and $this->parsedData['facebook'] ){
            $str .= '<li class="zt-icon" >';
            $str .= '<a href="'.$this->checkFacebook($test->facebook).'" target="_blank"> <span>';
            $str .= '<i class="fa fa-facebook"></i>';
            $str .= '</span></a>';
            $str .= '</li>';
        }
        if($test->twitter!=='' and $this->parsedData['twitter']){
            $str .= '<li class="zt-icon" >';
            $str .= '<a href="'.$this->checkTwitter($test->twitter).'" target="_blank"> <span class="hover-icon">';
            $str .= '<i class="fa fa-twitter"></i>';
            $str .= '</span> </a>';
            $str .= '</li>';
        }
        //them
        if($test->google!=='' and $this->parsedData['google']){
            $str .= '<li class="zt-icon" >';
            $str .= '<a href="'.$test->google.'" target="_blank"> <span class="hover-icon">';
            $str .= '<i class="fa fa-google-plus"></i>';
            $str .= '</span> </a>';
            $str .= '</li>';
        }
        if($test->linkedin!=='' and $this->parsedData['linkedin']){
            $str .= '<li class="zt-icon" >';
            $str .= '<a href="'.$test->linkedin.'" target="_blank"> <span class="hover-icon">';
            $str .= '<i class="fa fa-linkedin"></i>';
            $str .= '</span> </a>';
            $str .= '</li>';
        }
        if($test->printerest!=='' and $this->parsedData['printerest']){
            $str .= '<li class="zt-icon" >';
            $str .= '<a href="'.$test->printerest.'" target="_blank"> <span class="hover-icon">';
            $str .= '<i class="fa fa-pinterest"></i>';
            $str .= '</span> </a>';
            $str .= '</li>';
        }

    }//end icon
    $str .= '';
    $str .= '<ul>';//end ul
    $str .= '</div>';//end information
    $str .= '</div>';// end zt-testimonial
}
$str .= '</div>';
echo $str;

//add stylesheet to document header
$jversion = new JVersion;
$current_version = $jversion->getShortVersion();
if (version_compare($current_version, '3.0.0') <= 0){
    $document->addStyleSheet($uri->root().'modules/mod_zt_testimonial/asset/vendor/bootstrap/css/testimonial.css');
    $document->addScript($uri->root().'modules/mod_zt_testimonial/asset/vendor/jquery/jquery-1.11.1.js');
    $document->addScript($uri->root().'modules/mod_zt_testimonial/asset/vendor/jquery/jquery.noConflict.js');
    $document->addScript($uri->root().'modules/mod_zt_testimonial/asset/vendor/bootstrap/js/bootstrap.js');
    $document->addScript($uri->root().'modules/mod_zt_testimonial/asset/vendor/jquery/fixConflict.js');
} else {
    $document->addStyleSheet($uri->root().'modules/mod_zt_testimonial/asset/vendor/bootstrap/css/testimonial.css');
}

$document->addStyleSheet('//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css');
$document->addStyleSheet($uri->root().'modules/mod_zt_testimonial/asset/css/style3.css');

$document->addStyleSheet($uri->root().'modules/mod_zt_testimonial/asset/vendor/owl-carousel/owl.carousel.css');
$document->addStyleSheet($uri->root().'modules/mod_zt_testimonial/asset/vendor/owl-carousel/owl.theme.css');

?>

<script src="<?php echo $uri->root().'modules/mod_zt_testimonial/asset/vendor/owl-carousel/owl.carousel.js'; ?>"></script>
<script src="<?php echo $uri->root().'modules/mod_zt_testimonial/asset/js/script.js'; ?>"></script>

<script type="text/javascript">

    jQuery(document).ready(function(){
        jQuery("#module_<?php echo $module->id; ?>").owlCarousel({
            items: <?php echo isset($this->parsedData['item'])? $this->parsedData['item'] : '3'; ?>,
            autoPlay: <?php echo isset($this->parsedData['pause'])? $this->parsedData['pause'] : 'true' ?>,
            stopOnHover :  <?php echo isset($this->parsedData['autoHover'])? $this->parsedData['autoHover'] : 'true' ?>
        });
    });
</script>