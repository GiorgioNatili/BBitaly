<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Language
 *
 * @author marcello
 */
class Adsolut_Resource_Language extends Zend_Application_Resource_ResourceAbstract {
    
    private $avalaible = array();
    
    public function setAvalaible($languages) {
        $this->avalaible = $languages;
    }
    
    public function init() {
        return $this->avalaible;
    }
    
}