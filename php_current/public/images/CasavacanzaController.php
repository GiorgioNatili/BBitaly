<?php

/**
 * Description of SearchController
 *
 * @author marcello
 */
class CasavacanzaController extends Adsolut_Controller_Action {
    
    public function preDispatch() {
        if ($this->getRequest()->getActionName() == 'index'
                || $this->getRequest()->getActionName() == 'detail') {
            return;
        }
        $url = substr(
                rtrim($this->getRequest()->getServer('REQUEST_URI'),'/'), 
                strlen("/{$this->getRequest()->getParam('language')}/{$this->getRequest()->getControllerName()}"));
        $id = substr($url, -32);
        $this->_forward('detail', null, null, array('id' => $id));
    }

    public function indexAction() {
        $this->_forward('index', 'search', null, array(
            't' => 'b',
            'keyword' => $this->getRequest()->getParam('subdomain'),
        ));
    }

    public function detailAction() {
        $id = $this->getRequest()->getParam('id');
        $accomodation = $this->getResource("core")->get('accomodation', array('id' => $id));
        if ($accomodation->hasErrors()) {
            $this->view->errors = true;
            return;
        }
        $roomResponse = $this->getResource("core")->get('room-by-bb', array('id' => $id));
        if ($roomResponse->hasErrors()) {
            $this->view->errors = true;
            return;
        }
        $this->view->accomodation = $accomodation->getData();
        $this->view->room = $roomResponse->getData();
        
        $this->view->policy = $this->parseOptions($this->view->accomodation->policy);
        $this->view->facility = $this->parseOptions($this->view->accomodation->facility);

        $photos = $this->getResource('core')->get("bb-gallery", array('id' => $id));
        $this->view->photos = array();
        if (!$photos->hasErrors()) {
            $this->view->photos = $photos->getData()->photos;
        }
        $this->view->seo('detail',$accomodation->getData());
    }

    private function parseOptions($options, $selectedOpt = null) {
        $toReturn = array();
        foreach ($options as $option) {
            $selected = false;
            if (null !== $selectedOpt) {
                foreach ($selectedOpt as $item) {
                    $selected = false;
                    if ($item->id == $option->id) {
                        $selected = true;
                        break;
                    }
                }
            }
            $toReturn[$option->type][] = array(
                'id' => $option->id,
                'name' => $option->name,
                'selected' => $selected
            );
        }
        return $toReturn;
    }
}