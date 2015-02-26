<?php
defined( '_JEXEC' ) or die( 'Access Deny' );
$document = JFactory::getDocument();
$uri = JURI::getInstance();

//add stylesheet to document header
//

$document->addStyleSheet($uri->root().'modules/mod_zt_testimonial/asset/css/style.css');
$document->addStyleSheet('//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css');

$jversion = new JVersion;
$current_version = $jversion->getShortVersion();

if (version_compare($current_version, '3.0.0') <= 0){
    $document->addStyleSheet($uri->root().'modules/mod_zt_testimonial/asset/vendor/bootstrap/css/testimonial.css');
    $document->addScript($uri->root().'modules/mod_zt_testimonial/asset/vendor/jquery/jquery-1.11.1.js');
    $document->addScript($uri->root().'modules/mod_zt_testimonial/asset/vendor/bootstrap/js/bootstrap.js');
    $document->addScript($uri->root().'modules/mod_zt_testimonial/asset/vendor/jquery/jquery.noConflict.js');

    $document->addScript($uri->root().'modules/mod_zt_testimonial/asset/vendor/jquery/fixConflict.js');
} else {
    $document->addStyleSheet($uri->root().'modules/mod_zt_testimonial/asset/vendor/bootstrap/css/testimonial.css');
}

$arr=   $this->parsedData['arrayTestimonial'];
$str='';

$str.='<div id="zt-module-testimonial'.$module->id.'" class="zt-module-testimonial">';
$str.='<div id="ztTestimonial'.$module->id.'" class="carousel slide ztTestimonial" data-ride="carousel">';
if(!$this->parsedData['indicators']){
    $str.='<ol class="carousel-indicators hide">';
} else {
    $str.='<ol class="carousel-indicators">';
}

foreach ($arr as $key=>$value) {
    $str.='<li data-target="#ztTestimonial'.$module->id.'" data-slide-to="'.$key.'" class="active"></li>';
}
$str.='</ol>';

$str.='<div class="carousel-inner">';

foreach ($arr as $key=>$test) {
    if($key==0){
        $str.=' <div class="item active">';
    } else {
        $str.=' <div class="item">';
    }

    //content testimonial

    $str .= '<div class="row">';
    $str .= '<div class=" col-md-12 col-sm-12">';

    $str .= '<p class="content-testimonial">';
    $str .= '<i class="fa fa-quote-left pull-left"></i>';

    $str .= $test->testimonial;
    $str .= '</p>';

    $str .= '<div class="row info">';
    $str .= '<div class=" col-md-3 col-sm-3 col-xs-6">';
    if($this->parsedData['avatar']){
        $linkAvatar = str_replace(' ', '', $test->linkAvatar);
        if($linkAvatar !=='') {
            $str .= '<a href="'. $linkAvatar.'">';
        }
        $str .= '<img class="img-circle img-responsive avatar" src="'.$uri->root().$test->urlAvatar.'">';
        $linkAvatar = str_replace(' ', '', $test->linkAvatar);
        if($linkAvatar !=='') {
            $str .= '</a>';
        }
    }
    $str .= '</div>';//end div image

    $str .= '<div class=" col-md-9 col-sm-9 col-xs-6">';
    if($this->parsedData['name']){
        $linkName = str_replace(' ', '', $test->linkName);
        if($linkName !=='') {
            $str .= '<a href="'. $linkName.'">';
        }
        $str .= '<div class="name">'.$test->name.'</div>';
        $linkName = str_replace(' ', '', $test->linkName);
        if($linkName !=='') {
            $str .= '</a>';
        }
    }
    if($this->parsedData['email']){
        $str .= '<div class="email">'.$test->email.'</div>';
    }
    if($this->parsedData['position']){
        $str .= '<div class="position">'.$test->position.'</div>';
    }

    //var_dump($test->twitter);
    $web = $this->checkWebsite($test->website);
    $fb = $this->checkFacebook($test->facebook);
    $tw = $this->checkTwitter($test->twitter);
    if($this->parsedData['website']){
        $str .= '<div class="website">';
        $str .= '<span>Website: </span><a href="'.$web.'" target="_blank">'.$web.'</a>';
        $str .='</div>';
    }

    $str .= '<div class="tw-fb">';
    if($this->parsedData['facebook']){
        $str .='<a href="'.$fb.'" target="_blank"><i class="fa fa-facebook"></i></a>';
    }
    if($this->parsedData['twitter']){
        $str .='<a href="'.$tw.'" target="_blank"><i class="fa fa-twitter"></i></a>';
    }
    //them
    if($this->parsedData['google']){
        $str .='<a href="'.$test->google.'" target="_blank"><i class="fa fa-google-plus"></i></a>';
    }
    if($this->parsedData['linkedin']){
        $str .='<a href="'.$test->linkedin.'" target="_blank"><i class="fa fa-linkedin"></i></a>';
    }
    if($this->parsedData['printerest']){
        $str .='<a href="'.$test->printerest.'" target="_blank"><i class="fa fa-pinterest"></i></a>';
    }
    $str .='</div>';



    $str .= '</div>';//end information

    $str .= '</div>';//end col 4(2 2) 8
    $str .= '</div>';//end col 12
    $str .= '</div>';//end wrap
    $str .= '<div class="cleanfix" style="height: 10px"></div>';
//end testimonial
    $str.='</div>';
}
$str.='</div>';
if(!$this->parsedData['arrow']){
    $str.='<a class="left carousel-control hide" href="#ztTestimonial'.$module->id.'" data-slide="prev">';
    $str.='	<span class="glyphicon glyphicon-chevron-left"></span>';
    $str.='</a>';
    $str.='<a class="right carousel-control hide" href="#ztTestimonial'.$module->id.'" data-slide="next">';
    $str.='<span class="glyphicon glyphicon-chevron-right"></span>';
    $str.='</a>';
} else {
    $str.='<a class="left carousel-control" href="#ztTestimonial'.$module->id.'" data-slide="prev">';
    $str.='	<span class="glyphicon glyphicon-chevron-left"></span>';
    $str.='</a>';
    $str.='<a class="right carousel-control" href="#ztTestimonial'.$module->id.'" data-slide="next">';
    $str.='<span class="glyphicon glyphicon-chevron-right"></span>';
    $str.='</a>';
}



$str.='</div>';
$str.='</div>';
echo $str;
?>
<script type="text/javascript">
    <?php
            if($this->parsedData['avatar']<1 && $this->parsedData['name']<1 && $this->parsedData['email']<1 && $this->parsedData['position']<1 && $this->parsedData['website']<1 && $this->parsedData['facebook']<1 && $this->parsedData['twitter']<1){
            //clean class p in testimonial
            echo "jQuery('p').removeClass('content-testimonial');";
            }
         ?>
    jQuery(document).ready(function(){
        var testimonial = jQuery('#ztTestimonial<?php echo $module->id; ?>');
        testimonial.carousel({
            wrap: true,
            interval: <?php echo isset($this->parsedData['pause'])? $this->parsedData['pause'] : '4000' ?>,
            pause: <?php echo ($this->parsedData['autoHover']) ? "'hover'" : "'none'"; ?>
        });
    });
</script>