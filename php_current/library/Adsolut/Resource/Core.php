<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Core
 *
 * @author marcello
 */
class Adsolut_Resource_Core extends Zend_Application_Resource_ResourceAbstract{
    
    private $_instance = null;
    
    private $basepath;
    
    private $endpoints;
    
    public function getBasepath() {
        return $this->basepath;
    }

    public function setBasepath($basepath) {
        $this->basepath = $basepath;
    }

    public function getEndpoints() {
        return $this->endpoints;
    }

    public function setEndpoints($endpoints) {
        $this->endpoints = $endpoints;
    }

    public function init() {
       if (null === $this->_instance) {
           $this->_instance = new Adsolut_Http_Client();
           $this->_instance->setBasepath($this->getBasepath());
           $this->_instance->setEndpoints($this->getEndpoints());
       }
       return $this->_instance;
    }
}