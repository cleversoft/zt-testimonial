
<?php
/**
* @version      1.0.0 3/17/14
* @author       DucNA
* @copyright    Copyright (C) 2008-2014 zootemplate.com. All rights reserved.
* @license      GNU/GPL
*/
defined('_JEXEC') or die('Restricted access');
if(!defined('DS')){
    define('DS',DIRECTORY_SEPARATOR);
}
require_once (dirname(__FILE__).DS.'helper.php');
$helper = new moztTestimonialHelper($params);
$helper->parseData();
$helper->renderLayout($module);


