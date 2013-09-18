<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of I18n
 *
 * @author marcello
 */
class Adsolut_Plugin_LayoutDataLoader extends Zend_Controller_Plugin_Abstract {

    
    public function preDispatch(Zend_Controller_Request_Abstract $request) {
//        if ($request->getControllerName() == 'admin') 
//            return;
        $view = Zend_Controller_Front::getInstance()->getParam('bootstrap')->getResource('view');
        $menu = new Models_ProfiledSearch();
        $view->layout()->menu = $menu->getSearch('t', 10);
        $cms = new Models_Cms();
        $view->layout()->cms = $cms->getActive();
    }

}