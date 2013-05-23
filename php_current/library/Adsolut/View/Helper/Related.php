<?php

/**
 * Description of related
 *
 * @author marcello
 */
class Adsolut_View_Helper_Related extends Zend_View_Helper_Abstract {

    private $done = false;
    private $related = array();

    public function related($latitude, $longitude, $radius = 10.0) {
        if (!$this->done) {
            $response = Zend_Controller_Front::getInstance()->getParam('bootstrap')
                            ->getResource('core')->get("search-bycoords", array(
                'latitude' => $latitude,
                'longitude' => $longitude,
                'radius' => $radius,
                    ));
            if (!$response->hasErrors()) {
                $this->related = $response->getData();
            }
            $this->done = true;
        }
        return $this;
    }

    public function getHtml() {
        return $this->view->partial("/block/related.phtml", array('related' => $this->related));
    }

    public function getRelated() {
        return $this->related;
    }

}