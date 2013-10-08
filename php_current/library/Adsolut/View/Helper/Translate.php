<?php

/**
 * Description of Translate
 *
 * @author marcello
 */
class Adsolut_View_Helper_Translate extends Zend_View_Helper_Abstract {

    public function translate($error_code) {
        $messages = array(
            '619' => l('Non hai ancora caricato le immagini')
        );
        return !empty($messages[$error_code]) ? $messages[$error_code] : $error_code;
    }

}