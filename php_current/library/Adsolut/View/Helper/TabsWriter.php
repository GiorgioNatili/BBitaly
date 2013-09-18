<?php

/**
 * Description of TabsWriter
 *
 * @author marcello
 */
class Adsolut_View_Helper_TabsWriter extends Zend_View_Helper_Abstract{
    
    public function tabsWriter(array $options) {
        return $this->view->partial('/block/tabs.phtml', array('tabs' => $options));
    }
}