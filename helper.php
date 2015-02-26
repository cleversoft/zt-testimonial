
<?php
/**
* @version      1.0.0 3/17/14
* @author       DucNA
* @copyright    Copyright (C) 2008-2014 zootemplate.com. All rights reserved.
* @license      GNU/GPL
*/
defined('_JEXEC') or die('Restricted access');

jimport('joomla.filesystem.file');
class moztTestimonialHelper{
var  $config;

    /*
     * structure - config
     */
    function __construct($params){
        //jimport('joomla.filesystem.file');
        //  configuration array
        $this->config=array(
            'arrayTestimonial'=>array(),
            'name'=>1,
            'email'=>1,
            'avatar'=>1,
            'position'=>1,
            'website'=>1,
            'facebook'=>1,
            'twitter'=>1,
            'item'=>3,
            'google'=>1,
            'linkedin'=>1,
            'printerest'=>1,

            'styleTestimonial'=>'aboutUs',
            'descriptionAboutUs'=>'',
            'pause'=>4000,
            'autoHover'=>1,
            'arrow'=>1,
            'indicators'=>1
        );

        $this->parsedData=array(
            'arrayTestimonial'=>array(),
            'name'=>1,
            'email'=>1,
            'avatar'=>1,
            'position'=>1,
            'website'=>1,
            'facebook'=>1,
            'twitter'=>1,
            'item'=>3,
            'google'=>1,
            'linkedin'=>1,
            'printerest'=>1,

            'styleTestimonial'=>'aboutUs',
            'descriptionAboutUs'=>'',

            'pause'=>4000,
            'autoHover'=>1,
            'arrow'=>1,
            'indicators'=>1
        );
        //get the config default
        $this->config['arrayTestimonial']=$params->get('arrayTestimonial','');
        //var_dump(   $this->config['arrayTestimonial']);
        $this->config['styleTestimonial']=$params->get('styleTestimonial','aboutUs');
        $this->config['item']=$params->get('item',3);
        $this->config['descriptionAboutUs']=$params->get('descriptionAboutUs','');

        $this->config['name']=$params->get('name','');
        $this->config['email']=$params->get('email','');
        $this->config['avatar']=$params->get('avatar','');
        $this->config['position']=$params->get('position','');
        $this->config['website']=$params->get('website','');
        $this->config['facebook']=$params->get('facebook','');
        $this->config['twitter']=$params->get('twitter','');

        $this->config['google']=$params->get('google',1);
        $this->config['linkedin']=$params->get('linkedin',1);
        $this->config['printerest']=$params->get('printerest',1);

        $this->config['pause']=$params->get('pause','');
        $this->config['autoHover']=$params->get('autoHover','');
        $this->config['arrow']=$params->get('arrow','');
        $this->config['indicators']=$params->get('indicators','');



    }

    /*
     * parse data
     */
    function parseData(){
        $string=str_replace('|qq|','"', $this->config['arrayTestimonial']);
        $json2=json_decode($string);
        $this->parsedData['arrayTestimonial']=$json2;

        $this->parsedData['styleTestimonial']=$this->config['styleTestimonial'];
        $this->parsedData['item']=$this->config['item'];

        $this->parsedData['name']=$this->config['name'];
        $this->parsedData['email']=$this->config['email'];
        $this->parsedData['avatar']=$this->config['avatar'];
        $this->parsedData['position']=$this->config['position'];
        $this->parsedData['website']=$this->config['website'];
        $this->parsedData['facebook']=$this->config['facebook'];
        $this->parsedData['twitter']=$this->config['twitter'];

        $this->parsedData['google']=$this->config['google'];
        $this->parsedData['linkedin']=$this->config['linkedin'];
        $this->parsedData['printerest']=$this->config['printerest'];

        $this->parsedData['pause']=$this->config['pause'];
        $this->parsedData['autoHover']=$this->config['autoHover'];
        $this->parsedData['arrow']=$this->config['arrow'];
        $this->parsedData['indicators']=$this->config['indicators'];
        $this->parsedData['descriptionAboutUs']=$this->config['descriptionAboutUs'];
    }
    /*
     * render
     */
    function renderLayout($module){
        //include necessary view

        switch($this->parsedData['styleTestimonial']) {
            case 'default':
                require(JModuleHelper::getLayoutPath('mod_zt_testimonial','default'));
                break;
            case 'aboutUs':
                require(JModuleHelper::getLayoutPath('mod_zt_testimonial','aboutUs'));
                break;
            default:
                require(JModuleHelper::getLayoutPath('mod_zt_testimonial','default'));
        }
            //require(JModuleHelper::getLayoutPath('mod_zt_testimonial','default'));
    }
    function checkWebsite($website) {
        $find = 'http://';
        $pos = strpos($website, $find);
        if ($pos === false) {
            $website='http://'.$website;
            return $website;
        } else {
            return $website;
        }
    }

    function checkFacebook($facebook) {
        if($facebook=='' or !isset($facebook)) {
            $facebook='#';
        } else {
            //$find_http = 'https://www.facebook.com/';

            //$facebook= $find_http.$facebook;
        }

        return $facebook;
    }

    function checkTwitter($twitter) {
        if($twitter=='' or !isset($twitter)) {
            $twitter ='#';
        } else {
        //$find_http = 'https://twitter.com/';
        //$twitter= $find_http.$twitter;
        }
        return $twitter;
    }
}
