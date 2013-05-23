<?php

/**
 * Description of ImageUrl
 *
 * @author marcello
 */
class Adsolut_View_Helper_ImageUrl extends Zend_View_Helper_Abstract {

    public function imageUrl(array $options) {
        $source = $options['src'];
        $source = $this->_parsepath($source);
        $width = $options['width'];
        $height = $options['height'];
        $url = $this->view->url(array(
            'subdomain' => 'www',
            'controller' => 'image',
            'dims' => "{$width}x{$height}",
            'action' => 'adaptive',
            'type' => !isset($options['type']) ? 'bb' : $options['type']
        ));
        return "{$url}/src/{$source}";
    }

    private function _parsepath($source) {
        $components = explode('/', $source);
        $filename = array_pop($components);
        $pid = substr($filename, 0, 32);
        $name = substr($filename, 33);
        $accomodation = array_pop($components);
        $type = array_pop($components);
        return "{$type}|{$pid}|{$name}";
    }

}