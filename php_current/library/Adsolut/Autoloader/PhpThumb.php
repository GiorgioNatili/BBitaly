<?php

/**
 * Description of PhpThumb
 *
 * @author marcello
 */
class Adsolut_Autoloader_PhpThumb implements Zend_Loader_Autoloader_Interface {

    static protected $php_thumb_classes = array(
        'PhpThumb' => 'PhpThumb.inc.php',
        'ThumbBase' => 'ThumbBase.inc.php',
        'PhpThumbFactory' => 'ThumbLib.inc.php',
        'GdThumb' => 'GdThumb.inc.php',
        'GdReflectionLib' => 'thumb_plugins/gd_reflection.inc.php',
    );

    public function autoload($class) {
        $file = APPLICATION_PATH . '/../library/PhpThumb/' . self::$php_thumb_classes[$class];
        if (is_file($file)) {
            require_once($file);
            return $class;
        }
        return false;
    }

}