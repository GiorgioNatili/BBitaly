<?php

/**
 * Description of Action
 *
 * @author marcello
 */
class Adsolut_Controller_Action extends Zend_Controller_Action{
    
    public function getResource($name) {
        return  $this->getFrontController()
                ->getParam("bootstrap")
                ->getResource($name);
    }
    
}