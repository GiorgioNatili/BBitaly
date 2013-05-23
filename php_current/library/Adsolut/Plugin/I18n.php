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
class Adsolut_Plugin_I18n extends Zend_Controller_Plugin_Abstract {

    private $territory_map = array(
        'it' => 'it_IT',
        'en' => 'en_US',
        'es' => 'es_ES',
        'fr' => 'fr_FR',
        'de' => 'de_DE'
    );

    public function routeShutdown(Zend_Controller_Request_Abstract $request) {
        /* @var $locale Zend_Locale */
        $locale = Zend_Controller_Front::getInstance()
                ->getParam("bootstrap")
                ->getResource('locale');
        $mappedLocale = 'it_IT';
        if (isset($this->territory_map[$request->getParam('language', 'it')])) {
            $mappedLocale = $this->territory_map[$request->getParam('language', 'it')];
        }
        $locale->setLocale($mappedLocale);
        Zend_Controller_Front::getInstance()
                ->getParam('bootstrap')
                ->getResource('view')
                ->assign('subdomain', $request->getParam('subdomain'))
                ->assign('language', $request->getParam('language', 'it'));
    }

    public function dispatchLoopStartup(Zend_Controller_Request_Abstract $request) {
        /* @var $language Zend_Locale */
        $language = Zend_Controller_Front::getInstance()
                ->getParam("bootstrap")
                ->getResource('locale')
                ->getLanguage();
        if (file_exists(APPLICATION_PATH . "/../languages/{$language}/LC_MESSAGES/{$language}.mo")) {
            $translate = new Zend_Translate(
                            array(
                                'adapter' => 'gettext',
                                'content' => APPLICATION_PATH . "/../languages/{$language}/LC_MESSAGES/{$language}.mo",
                                'scan' => Zend_Translate::LOCALE_DIRECTORY
                            )
            );
            Zend_Registry::set("Zend_Translate", $translate);
        }
    }

}