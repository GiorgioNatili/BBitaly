<?php

/**
 * Description of UrlDetail
 *
 * @author marcello
 */
class Adsolut_View_Helper_UrlDetail extends Zend_View_Helper_Abstract {
    
    public function urlDetail($item) {
        $lang = Zend_Controller_Front::getInstance()->getRequest()->getParam('language','it');
        return $this->view->url(array('subdomain'=>'www','controller' => 'casavacanza', 'language'=> $this->view->language,'action' => $item->type),null,true).'/'.$item->id;
    }
    
}