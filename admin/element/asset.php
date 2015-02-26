<?php

defined('JPATH_BASE') or die;

jimport('joomla.form.formfield');

class JFormFieldAsset extends JFormField {
    protected $type = 'Asset';
    protected function getInput() {
        $jversion = new JVersion;
        $doc = JFactory::getDocument();
        $current_version = $jversion->getShortVersion();
        if (version_compare($current_version, '3.0.0') <= 0){
            $doc->addScript(JURI::root().'modules/mod_zt_testimonial/asset/vendor/jquery/jquery-1.11.1.js');
            $doc->addScript(JURI::root().'modules/mod_zt_testimonial/asset/vendor/jquery/jquery.noConflict.js');
            $doc->addScript(JURI::root().$this->element['path'].'js/script2.5.js');

        }else {
            $doc->addScript(JURI::root().$this->element['path'].'js/script.js');

        }
        $doc->addStyleSheet(JURI::root().$this->element['path'].'css/style.css');


        return null;
    }
}
