<?php

class IndexController extends Adsolut_Controller_Action {

    public function init() {
        $this->view->layout()->setLayout("home");
    }

    public function indexAction() {
        $highlighted = new Models_Highlighted();
        $this->view->highlighted = $highlighted->getHighlighted();
        $search = new Models_ProfiledSearch();
        $this->view->savedsearch = $search->getSearch("t", 12);
    }

    public function testAction() {
        $stay = new Adsolut_Route_Stay();
        $stay->setEndDate("01/01/2013")
                ->setPersons(2)
                ->setStartDate("10/01/2013")
                ->setTerm("Napoli");
        $route = new Adsolut_Route();
        $route->addStay($stay);
        d();
    }

}