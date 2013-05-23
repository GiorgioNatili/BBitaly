<?php

/**
 * Description of SearchController
 *
 * @author marcello
 */
class SearchController extends Adsolut_Controller_Action {

    
    public function indexAction() {
        $this->view->layout()->setLayout('detail');
        $type = $this->getRequest()->getParam('t', 'b');
        $date = new DateTime();
        if ($type == 'b') {
            $response = $this->getResource('core')->get('search-semantic', array(
                'name' => $this->getRequest()->getParam('keyword', 'italia'),
                'start' => $this->getRequest()->getParam('datestart', $date->format('Y-m-d')),
                'end' => $this->getRequest()->getParam('dateend', $date->add(new DateInterval('P10D'))->format('Y-m-d'))));
            if ($this->getRequest()->getParam('r',false)) {
                $search = new Models_ProfiledSearch();
                $this->view->search = $search->find($this->getRequest()->getParam('r'))->current();
            } else {
                $this->view->search = false;
            }
            $this->view->accomodation = $response->getData()->bedBreakfasts;
            $this->view->locations = $response->getData()->locations;
            $this->view->cities = $response->getData()->cities;
            $this->view->seo('search',$this->getRequest()->getParam('keyword', 'italia'));
        } elseif ($type == 'l') {
            $response = $this->getResource('core')->get('search-bypoi', array(
                'id' => $this->getRequest()->getParam('id')));
            $this->view->accomodation = $response->getData();
            $this->view->locations = array();
            $this->view->cities = array();
        } elseif ($type == 'c') {
            $response = $this->getResource('core')->get('search-bycity', array(
                'id' => $this->getRequest()->getParam('id', 'italia')));
            $this->view->accomodation = $response->getData();
            $this->view->locations = array();
            $this->view->cities = array();
        }
        $this->view->noResult = true;
        if ($response->hasErrors()) {
            $this->view->noResult = true;
        }
    }

}