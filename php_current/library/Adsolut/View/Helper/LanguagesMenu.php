<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of LanguagesMenu
 *
 * @author marcello
 */
class Adsolut_View_Helper_LanguagesMenu extends Zend_View_Helper_Abstract
{
    
    public function languagesMenu() {
        $langs = Zend_Controller_Front::getInstance()->getParam('bootstrap')->getResource('language');
        $current = Zend_Controller_Front::getInstance()->getRequest()->getParam('language');
        $language = array();
        foreach ($langs as $lang) {
            $language[$lang] = $current == $lang;
        }
        return $this->view->partial('block/languages-menu.phtml', array('languages' => $language));
    }
    
}