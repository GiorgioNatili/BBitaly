<?php

/**
 * Description of TranslateDay
 *
 * @author marcello
 */
class Adsolut_View_Helper_TranslateDay extends Zend_View_Helper_Abstract{
    
    public function translateDay($day) {
        switch(strtoupper($day)) {
            case 'MONDAY':
                return l('lunedì');
            case 'TUESDAY':
                return l('martedì');
            case 'WEDNESDAY':
                return l('mercoledì');
            case 'THURSDAY':
                return l('giovedì');
            case 'FRIDAY':
                return l('venerdì');
            case 'SATURDAY':
                return l('sabato');
            case 'SUNDAY':
                return l('domenica');
        }
    }
    
}