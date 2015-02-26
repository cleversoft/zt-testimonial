<?php
defined('_JEXEC') || die('Restricted access');
jimport('joomla.form.formfield');

class JFormFieldLoad extends JFormField {
    protected $type = 'Load';
    protected function getInput() {
        $doc = JFactory::getDocument();
        JHTML::_('behavior.modal');
        $jversion = new JVersion;
        $current_version = $jversion->getShortVersion();
        if (version_compare($current_version, '3.3.0') >= 0)
        {
            $doc->addScript(JURI::root() . $this->element['path'] . 'js/mootools-more.js');
        }

        $doc->addScript(JURI::root() . $this->element['path'] . 'js/load_testimonial.js');
       // JHtml::_('bootstrap.loadCss');

        if (version_compare($current_version, '3.0.0') >= 0)
        {
            JHtml::_('bootstrap.framework');
        }

            //if vs 2.5
            $doc->addStyleSheet(JURI::root().$this->element['path'].'bootstrap 2.3.2/less/testimonial.css');

        $html = '<div id="ztTestimonialModule"><input name="' . $this->name . '" id="ztArrTestimonials" type="hidden" value="' . $this->value . '" />'
            . '<a name="ztAddTestimonial" id="ztAddTestimonial"  onclick="javascript:addTestimonial();" class="btn"><i class="icon-plus-sign icon-grey"></i> ADD A TESTIMONIAL</a>'
            . '<ul id="ztTestimonialList" style="clear:both;"></ul>'
            . '<input type="hidden" id="base_url_testimonial" value="'.JURI::root().'">'
            . '<a name="ztAddTestimonial" id="ztAddTestimonial"  onclick="javascript:addTestimonial();" class="btn"><i class="icon-plus-sign icon-grey"></i> ADD A TESTIMONIAL</a></div>';
        return $html;

    }


    protected function getLabel() {

        return '';
    }
}