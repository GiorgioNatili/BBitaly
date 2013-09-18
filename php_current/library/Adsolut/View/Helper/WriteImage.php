<?php

/**
 * Description of WriteImage
 *
 * @author marcello
 */
class Adsolut_View_Helper_WriteImage extends Zend_View_Helper_Abstract{
    
    public function writeImage(array $options) {
        $width = $options['width'];
        $height = $options['height'];
//        $url = str_replace(":8090", "", $this->view->imageUrl($options));
        $url = str_replace(":8090", "", $options['src']);
        return "<img src=\"{$url}\" width=\"{$width}\" height=\"{$height}\"/>";
    }
    
}