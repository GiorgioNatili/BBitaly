<?php

/**
 * Description of Facility
 *
 * @author marcello
 */
class Adsolut_View_Helper_Facility extends Zend_View_Helper_Abstract {

    public function facility($name) {
        $title = '';
        switch ($name) {
            case 1:
                $title .= l('Piscina');
                break;
            case 2:
                $title .= l('Frigobar');
                break;
            case 3:
                $title .= l('Struttura');
                break;
            case 4:
                $title .= l('Letti');
                break;
            case 5:
                $title .= l('Mq abitabili');
                break;
            case 6:
                $title .= l('Mq giardino');
                break;
            case 7:
                $title .= l('Sicurezza');
                break;
            case 8:
                $title .= l('Attrezzature');
                break;
            case 9:
                $title .= l('Servizi addizionali');
                break;
            case 10:
                $title .= l('Cucina');
                break;
            case 11:
                $title .= l('Svago');
                break;
            case 12:
                $title .= l('Esterno');
                break;
            case 13:
                $title .= l('Idromassaggio');
                break;
            case 14:
                $title .= l('Computer');
                break;
            case 15:
                $title .= l('Servizi generali');
                break;
        }
        return $title;
    }

}