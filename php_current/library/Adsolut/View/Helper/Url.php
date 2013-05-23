<?php

/**
 * Description of Url
 *
 * @author marcello
 */
class Adsolut_View_Helper_Url extends Zend_View_Helper_Url {
    
    public function url(array $urlOptions = array(), $name = null, $reset = false, $encode = true) {
        if (isset($urlOptions['subdomain']) && $urlOptions['subdomain'] == 'www') {
            $urlOptions['subdomain'] = APPLICATION_SUBDOMAIN;
        }
        return parent::url($urlOptions, $name, $reset, $encode);
        
    }
}