<?php

/**
 * Description of SearchController
 *
 * @author marcello
 */
class BookController extends Adsolut_Controller_Action {

    public function indexAction() {
        $this->view->persons = $this->getRequest()->getParam('persons');
        $id = $this->getRequest()->getParam('id');
        $accomodation = $this->getResource("core")->get('accomodation', array('id' => $id));
        if ($accomodation->hasErrors()) {
            $this->view->errors = true;
            return;
        }
        $roomResponse = $this->getResource("core")->get('room', array('id' => $this->getRequest()->getParam('rid')));
        if ($roomResponse->hasErrors()) {
            $this->view->errors = true;
            return;
        }
        $room = $roomResponse->getData();

        $dateStart = new DateTime(date('Y-m-d', strtotime($this->getRequest()->getParam('start'))));
        $dateEnd = new DateTime(date('Y-m-d', strtotime($this->getRequest()->getParam('end'))));

        $dateStart->diff($dateEnd)->format('%a');
        
        $isAvalResponse = $this->getResource("core")->get('book-check', array(
            'id' => $room->id,
            'start' => $dateStart->format('Y-m-d'),
            'end' => $dateEnd->format('Y-m-d')
                ));

        if ($isAvalResponse->hasErrors()) {
            die($isAvalResponse->getErrors());
            return;
        }
        if (!$isAvalResponse->getData()->available) {
            return;
        }
        $price = $this->getResource("core")->get('room-price-total', array(
            'id' => $room->id,
            'dayStart' => $dateStart->format('d'),
            'monthStart' => $dateStart->format('m'),
            'yearStart' => $dateStart->format('Y'),
            'dayEnd' => $dateEnd->format('d'),
            'monthEnd' => $dateEnd->format('m'),
            'yearEnd' => $dateEnd->format('Y')
                )
        );
        if ($price->hasErrors()) {
            $this->view->errors = true;
            return;
        }
        $this->view->room = $room->id;
        $this->view->datestart = $dateStart;
        $this->view->dateend = $dateEnd;
        $this->view->price = $price->getData()->total;
        $this->view->accomodation = $accomodation->getData();
    }

    public function paymentinfoAction() {
        $this->view->book = $this->getRequest()->getParams();
        $this->view->regions = $this->getResource('core')->get("region-get", array('countryid' => 29))->getData();
    }

    public function confirmAction() {
        $dateStart = new DateTime(date('Y-m-d', strtotime($this->getRequest()->getParam('datestart'))));
        $dateEnd = new DateTime(date('Y-m-d', strtotime($this->getRequest()->getParam('dateend'))));

        $isAvalResponse = $this->getResource("core")->get('book-check', array(
            'id' => $this->getRequest()->getParam('rid'),
            'start' => $dateStart->format('Y-m-d'),
            'end' => $dateEnd->format('Y-m-d')
                ));

        if ($isAvalResponse->hasErrors()) {
            die($isAvalResponse->getErrors());
            return;
        }
        if (!$isAvalResponse->getData()->available) {
            d(array(
            'id' => $this->getRequest()->getParam('rid'),
            'start' => $dateStart->format('Y-m-d'),
            'end' => $dateEnd->format('Y-m-d')
                ));
            return;
        }

        $priceResponse = $this->getResource("core")->get('room-price-total', array(
            'id' => $this->getRequest()->getParam('rid'),
            'dayStart' => $dateStart->format('d'),
            'monthStart' => $dateStart->format('m'),
            'yearStart' => $dateStart->format('Y'),
            'dayEnd' => $dateEnd->format('d'),
            'monthEnd' => $dateEnd->format('m'),
            'yearEnd' => $dateEnd->format('Y')
                )
        );
        if ($priceResponse->hasErrors()) {
            die(print_r($priceResponse->getErrors()));
            return;
        }
        if ($priceResponse->getData()->total != $this->getRequest()->getParam('price')) {
            die(l('Error: request forgery detected'));
            return;
        }
        $bookResponse = $this->getResource("core")->post('book', array(
            'id' => $this->getRequest()->getParam('id'),
            'rid' => $this->getRequest()->getParam('rid'),
            'uid' => $this->getRequest()->getParam('uid'),
            'dayStart' => $dateStart->format('d'),
            'monthStart' => $dateStart->format('m'),
            'yearStart' => $dateStart->format('Y'),
            'dayEnd' => $dateEnd->format('d'),
            'monthEnd' => $dateEnd->format('m'),
            'yearEnd' => $dateEnd->format('Y'),
            'numer' => 0,
                )
        );
//        $bookResponse = $this->getResource("core")->get('book', 
//                array(
//                    'id' => 3
//                )
//        );
        if ($bookResponse->hasErrors()) {
            d($bookResponse);
            $this->view->errors = $bookResponse->getErrors();
            return;
        }
        
        $bookid = $bookResponse->getData()->id;
        $reservationModel = new Models_Reservation();
        $reservation = $reservationModel->fetchNew();
        $reservation->bookid = $bookid;
        $reservation->bbid = $this->getRequest()->getParam('id');
        $reservation->rid = $this->getRequest()->getParam('rid');
        $reservation->checkin = $dateStart->format('Y-m-d');
        $reservation->checkout = $dateEnd->format('Y-m-d');
        $reservation->price = $priceResponse->getData();
        $reservation->data = Zend_Json::encode($this->getRequest()->getParam('invoice'));
        $reservation->save();
        
        $this->view->accomdoation = $bookResponse->getData();
        $this->view->response = $bookResponse->getData();
    }

}