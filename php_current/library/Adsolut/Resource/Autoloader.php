<?php

/**
 * Description of Autoloader
 *
 * @author marcello
 */
class Adsolut_Resource_Autoloader extends Zend_Application_Resource_ResourceAbstract {
    
    public function init() {
        Zend_Loader_Autoloader::getInstance()->pushAutoloader(new Adsolut_Autoloader_PhpThumb);
    }
    
}