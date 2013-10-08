<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of TranslationController
 *
 * @author marcello
 */
class ConfigurationController extends Zend_Controller_Action{
    
    public function jsAction() { 
        $this->view->layout()->disableLayout();
    }
    
}