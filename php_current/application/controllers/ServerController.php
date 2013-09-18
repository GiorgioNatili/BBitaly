<?php

/**
 * Description of ServerController
 *
 * @author marcello
 */
class ServerController extends Adsolut_Controller_Action {
    
    public function indexAction() {
        $responsehealth = $this->getResource('core')->get("system-health", array());
        $responsestatus = $this->getResource('core')->get("system-status", array());
        $this->view->data = $responsehealth->getData();
        $this->view->status = $responsestatus->getData();
    }
    
}