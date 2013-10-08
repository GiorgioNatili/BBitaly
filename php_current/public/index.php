<?php
//ini_set('display_errors', 1);
//error_reporting(E_ALL);

// Define path to application directory
defined('APPLICATION_PATH')
        || define('APPLICATION_PATH', realpath(dirname(__FILE__) . '/../application'));

// Define application environment
defined('APPLICATION_ENV')
        || define('APPLICATION_ENV', (getenv('APPLICATION_ENV') ? getenv('APPLICATION_ENV') : 'production'));

define('APPLICATION_SUBDOMAIN', 'stanging');

// Ensure library/ is on include_path
set_include_path(implode(PATH_SEPARATOR, array(
            realpath(APPLICATION_PATH),
            realpath(APPLICATION_PATH . '/models'),
            realpath(APPLICATION_PATH . '/../library'),
            get_include_path(),
        )));

/** Zend_Application */
require_once 'Zend/Application.php';

// Create application, bootstrap, and run
$application = new Zend_Application(
                APPLICATION_ENV,
                APPLICATION_PATH . '/configs/application.ini'
);

$application->bootstrap();
$application->run();

function l() {
    $args = func_get_args();
    if (Zend_Registry::isRegistered('Zend_Translate')) {
        $translator = Zend_Registry::get('Zend_Translate');
        return call_user_func(array($translator, '_'), $args);
    }
    return $args[0];
}

function d() {
    die(print_r(func_get_args(),true));
}

function bblog($text) {
    return "<script>console.log('$text')</script>";
}