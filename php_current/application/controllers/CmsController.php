<?php

/**
 * Description of CmsController
 *
 * @author marcello
 */
class CmsController extends Zend_Controller_Action {

    public function init() { 
        if ($this->getRequest()->getParam('nl',false)) {
            $this->view->layout()->setLayout("terms");
        }
    }
    
    public function contentAction() {
        $cms = new Models_Cms();
        $this->view->cms = $cms->find($this->getRequest()->getParam('id'))->current();
    }
    
    public function preDispatch() { }

    public function chisiamoAction() { }
    public function privacyAction() { }
    public function terminiecondizionidusoAction() { }
    public function contrattoadesionepartnerAction() { }
    public function condizioniclienteAction() { }
}