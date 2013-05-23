<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of AdminController
 *
 * @author marcello
 */
class AdminController extends Adsolut_Controller_Action {

    public $contexts = array(
        'updateprocess' => array('json'),
        'deletebbphoto' => array('json'),
        'bbupdateprocess' => array('json'),
        'photogalleryhtml' => array('json'),
        'deletebb' => array('json'),
        'deletephoto' => array('json'),
        'updatebbphoto' => array('json'),
        'translationupdate' => array('json'),
        'deleteroom' => array('json'),
        'updateroomphoto' => array('json'),
        'pricesubmit' => array('json'),
        'highlight' => array('json'),
        'titleset' => array('json'),
        'showexistent' => array('json'),
        'uploadbottomphoto' => array('json'),
        'toursite' => array('json'),
    );

    public function init() {
//        d($this->view->layout()->currentuser);
        if (!Zend_Auth::getInstance()->hasIdentity()
                && $this->getRequest()->getActionName() != 'login'
                && $this->getRequest()->getActionName() != 'loginprocess') {
            $this->view->layout()->setLayout('admin-login');
            $this->_redirect($this->view->url(array('controller' => 'admin', 'action' => 'login')));
            return;
        }
//        $this->view->layout()->leftColumn = $this->view->adminLeftcolumn();
//        $this->view->layout()->setLayout('admin');
        $this->_helper->contextSwitch()->initContext();
    }

    public function loginAction() {
        $this->view->loginmessage = false;
        if ($this->getRequest()->getParam('login', false)) {
            $this->view->loginmessage = $this->getRequest()->getParam('login');
        }
        $this->view->errors = $this->getRequest()->getParam('errors', array());
    }

    public function loginprocessAction() {
//        $loginForm = new Adsolut_Form_OwnerLogin();
//        if (!$loginForm->isValid($_POST)) {
//            return $this->_forward("login", null, null, array('errors' => $loginForm->getMessages()));
//        }
//        $values = $loginForm->getValues();
        $values = $this->getRequest()->getParams();
        if (isset($values['m'])) {
            $email = base64_decode($values['m']);
            $pass = base64_decode($values['p']);
        } else {
            $email = $values['mail'];
            $pass = $values['password'];
        }
        $authAdapter = new Adsolut_Auth_Adapter($email, $pass);
        $zendAuth = Zend_Auth::getInstance();
        $result = $zendAuth->authenticate($authAdapter);
        $result->getIdentity()->role = 'owner';
        if ($result->isValid()) {
            return $this->_redirect($this->view->url(array('action' => 'accomodation')));
        }
        return $this->_forward("login", null, null, array('login' => l('login fallito: email o password errati')));
    }

    public function logoutAction() {
        Zend_Auth::getInstance()->clearIdentity();
        return $this->_forward("login");
    }

    public function accomodationAction() {
        $paginator = new Zend_Paginator(
                        new Adsolut_Paginator_Adapter_BbByOwner(
                                $this->getResource('core'),
                                $this->view->currentuser->id));
        $paginator->setCurrentPageNumber($this->getRequest()->getParam('page', 1));
        $paginator->setItemCountPerPage(3);
        $this->view->items = $paginator->getCurrentItems();
        $this->view->paginatorControll
                = $this->view->paginationControl($paginator, 'Sliding', 'block/paginator-controll.phtml');
    }

    public function deletebbAction() {
        $id = $this->getRequest()->getParam("id");
        $response = $this->getResource('core')->post("bb-delete", array('id' => $id));
        if ($response->hasErrors()) {
            $this->view->response = 'alert("' . l('errore durante la cancellazione') . '")';
            return;
        }
        $this->view->response = 'document.location.reload()';
    }

    public function booksAction() {
        $paginator = new Zend_Paginator(
                        new Adsolut_Paginator_Adapter_BbByOwner(
                                $this->getResource('core'),
                                $this->view->currentuser->id));
        $paginator->setCurrentPageNumber($this->getRequest()->getParam('page', 1));
        $paginator->setItemCountPerPage(3);
        $items = $paginator->getCurrentItems();
        $books = array();
        foreach ($items as $item) {
            $booksResponse = $this->getResource('core')->get("book-by-accomodation", array('id' => $item->id));
            if ($booksResponse->hasErrors()) {
                $this->view->errors = $booksResponse->getErrors();
                break;
            }
            $books[] = $booksResponse->getData();
        }
        $this->view->books = $books;
    }

    public function updateprocessAction() {
//        xdebug_disable();
        ini_set('display_errors', 1);
        error_reporting(E_ALL);
        $response = $this->getResource('core')->post("owner-update", array(
            'ownerid' => $this->view->currentuser->id,
            'bbname' => $this->getRequest()->getParam('name'),
            'surname' => $this->getRequest()->getParam('surname'),
            'email' => $this->getRequest()->getParam('email'),
            'address' => $this->getRequest()->getParam('address'),
            'admLev1' => $this->getRequest()->getParam('city'),
            'password' => $this->getRequest()->getParam("password", "")
                ));
        if (!$response->hasErrors()) {
            $this->view->isError = false;
            $this->view->currentuser = $response->getData();
            $result = new Zend_Auth_Result(Zend_Auth_Result::SUCCESS, $this->view->currentuser);
            Zend_Auth::getInstance()->clearIdentity();
            Zend_Auth::getInstance()->getStorage()->write($result->getIdentity());
        } else {
            $this->view->isError = true;
            $this->view->errors = $response->getErrors();
        }
    }

    public function photogalleryAction() {
        $id = $this->getRequest()->getParam('id');
        $response = $this->getResource('core')->get("bb-gallery", array('id' => $id));
        if ($response->hasErrors()) {
            $this->view->errors = $response->getErrors();
            return;
        }
        $this->view->bbid = $id;
        $this->view->type = 'bb';
        $photos = $response->getData()->photos;
        usort($photos, array($this, 'compare'));
        $this->view->photos = $photos;
    }

    public function photogalleryhtmlAction() {
        $params = $this->getRequest()->getParams();
        if (isset($params['rid'])) {
            $id = $params['rid'];
            $endpoint = "room-gallery";
            $type = 'room';
        } else {
            $id = $params['id'];
            $endpoint = "bb-gallery";
            $type = 'bb';
        }
        $response = $this->getResource('core')->get($endpoint, array('id' => $id));
        $errors = null;
        $photos = array();
        if ($response->hasErrors()) {
            $errors = $response->getErrors();
        } else {
            $photos = $response->getData()->photos;
        }
        usort($photos, array($this, 'compare'));
        $this->view->html = $this->view->partial('block/gallery.phtml', array('id' => $id, 'photos' => $photos, 'errors' => $errors, 'type' => $type));
    }

    private function compare($a, $b) {
        if ($a->displayOrder == $b->displayOrder) {
            return 0;
        }
        return $a->displayOrder < $b->displayOrder ? -1 : 1;
    }

    public function deletebbphotoAction() {
        $pid = $this->getRequest()->getParam('pid');
        $response = $this->getResource('core')->post('bb-photo-delete', array('id' => $pid));
        if ($response->hasErrors()) {
            $errors = implode('<br />' . $response->getErrors());
            $this->view->response = "$.facebox('" . l('Cancellazione non avvenuta a causa di:') . "<br />" . $errors . "')";
        } else {
            $this->view->response = "$('#" . $pid . "').remove();$.facebox('" . l('Cancellazione avvenuta con successo') . "')";
        }
    }

    public function updatebbphotoAction() {
        $id = $this->getRequest()->getParam('id');
        $pid = $this->getRequest()->getParam('pid');
        $response = $this->getResource('core')->post('bb-photo-update', array(
            'id' => $id,
            'pids' => $pid
                )
        );
        if ($response->hasErrors()) {
            $errors = implode('<br />' . $response->getErrors());
            $this->view->response = "$.facebox('" . l('update non avvenuta a causa di:') . "<br />" . $errors . "')";
        } else {
            $this->view->response = "$.facebox('" . l('modifica avvenuta con successo') . "')";
        }
    }

    public function bbupdateAction() {
        if ($this->getRequest()->getParam('status', 'ok') != 'ok') {
            $this->view->status = 'error';
            $this->view->errors = $this->getRequest()->getParam('status');
        }
        $id = $this->getRequest()->getParam('id');
        $this->view->accomodation = $this->getResource("core")->get('accomodation', array('id' => $id))->getData();
        $this->view->langs = $this->getResource('language');
        $this->view->currentLang = $this->getRequest()->getParam('language');
        $regionid = $this->view->accomodation->city->region->id;
        $this->view->regions = $this->getResource('core')->get("region-get", array('countryid' => 29))->getData();
        $this->view->cities = $this->getResource("core")->get('city-get', array('regionid' => $regionid))->getData();
        $facilities = $this->getResource('core')->get("bb-get-facility", array())->getData();
        $this->view->facility = $this->parseOptions($facilities, $this->view->accomodation->facility);
        $policies = $this->getResource("core")->get('bb-get-policy', array())->getData();
        $this->view->policy = $this->parseOptions($policies, $this->view->accomodation->policy);
    }

    public function updatepolicyAction() {
        if ($this->getRequest()->getParam('status', 'ok') != 'ok') {
            $this->view->status = 'error';
            $this->view->errors = $this->getRequest()->getParam('status');
        }
        $id = $this->getRequest()->getParam('id');
        $this->view->accomodation = $this->getResource("core")->get('accomodation', array('id' => $id))->getData();
        $this->view->langs = $this->getResource('language');
        $this->view->currentLang = $this->getRequest()->getParam('language');
        $regionid = $this->view->accomodation->city->region->id;
        $this->view->regions = $this->getResource('core')->get("region-get", array('countryid' => 29))->getData();
        $this->view->cities = $this->getResource("core")->get('city-get', array('regionid' => $regionid))->getData();
        $facilities = $this->getResource('core')->get("bb-get-facility", array())->getData();
        $this->view->facility = $this->parseOptions($facilities, $this->view->accomodation->facility);
        $policies = $this->getResource("core")->get('bb-get-policy', array())->getData();
        $this->view->policy = $this->parseOptions($policies, $this->view->accomodation->policy);
    }

    public function bbcreateAction() {
        if ($this->getRequest()->getParam('status', 'ok') != 'ok') {
            $this->view->status = 'error';
            $this->view->errors = $this->getRequest()->getParam('status');
        }
        $this->view->email = $this->getRequest()->getParam('email');
        $this->view->langs = $this->getResource('language');
        $this->view->currentLang = $this->getRequest()->getParam('language');
//        $regionid = $this->view->currentuser->city->region->id;
        $this->view->regions = $this->getResource('core')->get("region-get", array('countryid' => 29))->getData();
//        $this->view->cities = $this->getResource("core")->get('city-get', array('regionid' => $regionid))->getData();
        $facilities = $this->getResource('core')->get("bb-get-facility", array())->getData();
        $this->view->facility = $this->parseOptions($facilities);
        $policies = $this->getResource("core")->get('bb-get-policy', array())->getData();
        $this->view->policy = $this->parseOptions($policies);
        $this->view->request = $this->getRequest();
    }

    public function bbupdateprocessAction() {
        $this->view->errors = array();
        if ($this->getRequest()->isPost()) {
            $core = $this->getResource('core');
            $id = $this->getRequest()->getParam('id', null);
            $descriptionA = $this->getRequest()->getParam('description');
            $description = $descriptionA['it'];
            unset($descriptionA['it']);
//            $ownerResponse = $this->getResource('core')->post("owner", array(
//                'bbname' => $this->getRequest()->getParam('name'),
//                'surname' => $this->getRequest()->getParam('surname'),
//                'password' => $this->getRequest()->getParam('passwd'),
//                'email' => $this->getRequest()->getParam('email'),
//                'address' => $this->getRequest()->getParam('address') . " " . $this->getRequest()->getParam('cap'),
//                'admLev1' => $this->getRequest()->getParam('cityid'),
//                'phonenumber' => $this->getRequest()->getParam('owner_phonenumber'),
//                    )
//            );
//            if (!$ownerResponse->hasErrors()) {
            if (true) {
//                $owner = $ownerResponse->getData();
                $params = array(
                    'propertytname' => $this->getRequest()->getParam('propertytname'),
                    'type' => $this->getRequest()->getParam('type', 'bedandbreakfast'),
                    'assignedname' => $this->view->currentuser->name . " " . $this->view->currentuser->surname,
                    'phonenumber' => $this->getRequest()->getParam('phonenumber'),
                    'personalemail' => $this->view->currentuser->email,
                    'facilitiesId' => $this->getRequest()->getParam('facilitiesId'),
                    'policiesId' => $this->getRequest()->getParam('policyId'),
                    'ownerid' => $this->view->currentuser->id,
                    'description' => htmlentities($description),
                    'address' => $this->getRequest()->getParam('address'),
                    'cityid' => $this->getRequest()->getParam('cityid'),
                    'lang' => 'it',
                    'directContact' => false
                );

                $invoiceModel = new Models_Invoice();
                $invoice = $invoiceModel->fetchNew();
                $invoice->bbid = asd;
                $invoice->data = Zend_Json::encode($this->getRequest()->getParam('invoice'));
                $invoice->save();

                $action = 'accomodation';
                $destination = 'bbcreate';
                if ($id !== null) {
                    $params['id'] = $id;
                    $action = 'bb-update';
                    $destination = 'bbupdate';
                }
                $response = $core->post($action, $params);
                if ($response->hasErrors()) {
                    $this->view->errors = array_merge($this->view->errors, $response->getErrors());
                } else {
                    $bbid = $response->getData()->id;
                    if (!empty($descriptionA)) {
                        foreach ($descriptionA as $l => $d) {
                            if (!empty($d)) {
                                $response = $this->getResource('core')->post("translation-bb", array(
                                    'bbid' => $bbid,
                                    'lang' => $l,
                                    'description' => htmlentities($d)
                                        )
                                );
                            }
                        }
                    }
                    if ($response->hasErrors()) {
                        $this->view->errors = array_merge($this->view->errors, $response->getErrors());
//                        return;
                    }
                    if (!empty($_FILES)) {
                        $targetPath = $_SERVER['DOCUMENT_ROOT'] . "/upload";
                        $tempFile = $_FILES['cover']['tmp_name'];
                        $targetFile = rtrim($targetPath, '/') . '/' . $_FILES['cover']['name'];
                        $fileTypes = array('jpg', 'jpeg', 'gif', 'png');
                        $fileParts = pathinfo($_FILES['cover']['name']);

                        if (in_array($fileParts['extension'], $fileTypes)) {
                            $params = $this->getRequest()->getParams();
                            $id = $bbid;
                            move_uploaded_file($tempFile, $targetFile);
                            $this->getResource('core')->putFile("bb-cover", array(
                                'file' => $targetFile,
                                'id' => $id
                            ));
                        }
                        for ($i = 0; $i < count($_FILES['gallery']['name']); $i++) {
                            $gallTempFile = $_FILES['gallery']['tmp_name'][$i];
                            $gallTargetFile = rtrim($targetPath, '/') . '/' . $_FILES['gallery']['name'][$i];
                            $gallFileParts = pathinfo($_FILES['gallery']['name'][$i]);
                            if (in_array($gallFileParts['extension'], $fileTypes)) {
                                move_uploaded_file($gallTempFile, $gallTargetFile);
                                $r2 = $this->getResource('core')->putFile("bb-gallery", array(
                                    'file' => $gallTargetFile,
                                    'id' => $bbid
                                        ));
                            }
                        }
                    }
                }
                try {
//                    $mail = new Zend_Mail();
//                    $mail->setBodyHtml($this->view->partial('/emails/email.phtml', array(
//                                'email' => $this->getRequest()->getParam('email'),
//                                'password' => $pass,
//                            )));
//                    $mail->setFrom('congratulation@bedandbreakfastinitaly.com', 'Staff di bbitaly');
//                    $mail->addTo($this->getRequest()->getParam('email'));
//                    $mail->setSubject('Congratulazioni presto diventerai un utente di BBitaly');
//                    $mail->send();
//
//                    $mail2 = new Zend_Mail();
//                    $mail2->setBodyHtml($this->view->partial('/emails/email.phtml', array(
//                                'email' => $this->getRequest()->getParam('email'),
//                                'password' => $pass,
//                            )));
//                    $mail2->setFrom('congratulation@bedandbreakfastinitaly.com', 'Staff di bbitaly');
//                    $mail2->addTo("marcello.roehrssen@gmail.com");
//                    $mail2->addTo("info@bbitaly.com");
//                    $mail2->setSubject('Congratulazioni un nuovo utente si � iscritto');
//                    $mail2->send();
                } catch (Exception $e) {
                    /* nope */
                    die("$e");
                }
            } else {
                $this->view->errors = array_merge($this->view->errors, $ownerResponse->getErrors());
            }
        }
        if (empty($this->view->errors)) {
            $params = array('controller' => 'admin', 'action' => 'accomodation');
            $this->_redirect($this->view->url($params));
            return;
        } else {
            $params = array('controller' => 'admin', 'action' => 'bbcreate');
            $reqParams = $this->getRequest()->getParams();
            $reqParams['errors'] = $this->view->errors;
            $this->_forward('bbcreate', 'admin', null, $reqParams);
            return;
        }
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

    public function bbloadcoverAction() {
        $this->getResource('core')->putFile('bb-gallery', array(
            'file' => $targetFile,
            'id' => $this->getRequest()->getParam(id)
        ));
    }

    public function userupdateAction() {
        $regionid = $this->view->currentuser->city->region->id;
        $this->view->layout()->disableLayout();
        $this->view->regions = $this->getResource('core')->get("region-get", array('countryid' => 29))->getData();
        $this->view->cities = $this->getResource("core")->get('city-get', array('regionid' => $regionid))->getData();
    }

    public function translationAction() {
        $type = $this->getRequest()->getParam("type", "bb");
        $id = $this->getRequest()->getParam("id");
        if ($type == 'bb') {
            $response = $this->getResource('core')->get("translation-bb", array('bbid' => $id));
        } else if ($type == 'room') {
            $response = $this->getResource('core')->get("region-get", array('id' => $id));
        }
        if ($response->hasErrors()) {
            $this->view->errors = $response->getErrors();
            return;
        }
        $dataResponse = $response->getData();
        $data = array();
        $languages = $this->getResource('language');
        foreach ($languages as $language) {
            $data[$language] = array();
            foreach ($dataResponse as $value) {
                if ($value->lang->prefix == $language)
                    $data[$language] = $value;
            }
        }
        $this->view->type = $type;
        $this->view->data = $data;
    }

    public function translationupdateAction() {
        ini_set('display_errors', 1);
        error_reporting(E_ALL);
        $id = $this->getRequest()->getParam("id");
        $type = $this->getRequest()->getParam("type");
        $lang = $this->getRequest()->getParam("lang");
        if ($type == 'bb') {
            $description = $this->getRequest()->getParam("translation", "");
            $response = $this->getResource('core')->post("translation-bb", array(
                'bbid' => $id,
                'lang' => $lang,
                'description' => htmlentities(array_shift($description))
                    )
            );
        } else if ($type == 'room') {
            $params = array(
                'id' => $this->getRequest()->getParam('id')
            );
            $roomResponse = $this->getResource('core')->get("room-by-bb", $params);
            $roomList = $roomResponse->getData();
            $room = array_pop($roomList);
            $id = $room->id;
            $description = $this->getRequest()->getParam("translation", "");
            $response = $this->getResource('core')->post("translation-room", array(
                'id' => $id,
                'lang' => $lang,
                'shortDesc' => htmlentities(array_shift($description)),
                'placeDesc' => htmlentities(array_shift($description)),
                'generalDesc' => htmlentities(array_shift($description))
                    )
            );
        }
        if ($response->hasErrors()) {
            die(print_r($response->getErrors()));
            $this->view->isError = true;
            $this->view->errors = $response->getErrors();
            return;
        }
    }

    public function roomAction() {
        ini_set('display_errors', 0);
        error_reporting(false);
        $params = array('id' => $this->getRequest()->getParam('id'));
        $response = $this->getResource('core')->get("room-by-bb", $params);
        if ($response->hasErrors()) {
            return;
        }
        $this->view->id = $this->getRequest()->getParam('id');
        $this->view->rooms = $response->getData();
        $cover = array();
        foreach ($this->view->rooms as $room) {
            $params2 = array('id' => $room->id);
            $response2 = $this->getResource('core')->get("room-gallery", $params2);
            if ($response2->hasErrors()) {
                $cover[$room->id] = null;
                continue;
            }
            $photos = $response2->getData()->photos;
            usort($photos, array($this, 'compare'));
            $photo = array_shift($photos);
            if (!$photo) {
                $photo = null;
            }
            $cover[$room->id] = $photo;
        }
        $this->view->cover = $cover;
    }

    public function roomcreateAction() {
        if ($this->getRequest()->getParam('status', 'ok') != 'ok') {
            $this->view->status = 'error';
            $this->view->errors = $this->getRequest()->getParam('status');
        }
        $this->view->langs = $this->getResource('language');
        $this->view->currentLang = $this->getRequest()->getParam('language');
    }

    public function roomcreateprocessAction() {
        $bbid = $this->getRequest()->getParam('id');
//        d($this->getRequest()->getParams());
        $params = array(
            'bbid' => $bbid,
            'defaultPrice' => $this->getRequest()->getParam('defaultprice'),
            'shortDesc' => $this->getRequest()->getParam('shortDesc'),
            'generalDesc' => $this->getRequest()->getParam('generalDesc'),
            'placeDesc' => $this->getRequest()->getParam('placeDesc'),
            'amount' => $this->getRequest()->getParam('amount'),
            'mincap' => $this->getRequest()->getParam('mincap'),
            'maxcap' => $this->getRequest()->getParam('maxcap'),
        );
        $response = $this->getResource('core')->post("room", $params);
        if ($response->hasErrors()) {
            $this->_forward('roomcreate', null, null, array('status' => $response->getErrors()));
            return;
        }
        $this->_redirect($this->view->url(array('action' => 'accomodation')));
    }

    public function roomupdateAction() {
        if ($this->getRequest()->getParam('status', 'ok') != 'ok') {
            $this->view->status = 'error';
            $this->view->errors = $this->getRequest()->getParam('status');
        }


        $params = array(
            'id' => $this->getRequest()->getParam('id')
        );
        $roomResponse = $this->getResource('core')->get("room-by-bb", $params);
        $roomList = $roomResponse->getData();
        $room = array_pop($roomList);

        $this->view->langs = $this->getResource('language');
        $this->view->currentLang = $this->getRequest()->getParam('language');
        $id = $this->getRequest()->getParam('id');
        $params = array('id' => $room->id);
        $response = $this->getResource('core')->get("room", $params);
        if ($response->hasErrors()) {
            $this->_redirect($this->view->url(array('action' => 'room', 'id' => $id)));
            return;
        }
        $this->view->room = $response->getData();
    }

    public function roomupdateprocessAction() {
        $this->view->langs = $this->getResource('language');
        $this->view->currentLang = $this->getRequest()->getParam('language');
        $bbid = $this->getRequest()->getParam('id');

        $params = array(
            'id' => $this->getRequest()->getParam('id')
        );
        $roomResponse = $this->getResource('core')->get("room-by-bb", $params);
        $roomList = $roomResponse->getData();
        $room = array_pop($roomList);

        $params = array(
            'id' => $room->id,
            'bbid' => $bbid,
            'shortDesc' => $this->getRequest()->getParam('shortDesc'),
            'generalDesc' => $this->getRequest()->getParam('generalDesc'),
            'placeDesc' => $this->getRequest()->getParam('placeDesc'),
            'mincap' => $this->getRequest()->getParam('mincap'),
            'maxcap' => $this->getRequest()->getParam('maxcap'),
            'amount' => $this->getRequest()->getParam('amount'),
            'defaultPrice' => $this->getRequest()->getParam('defaultprice'),
        );
        $response = $this->getResource('core')->post("room-update", $params);
        if ($response->hasErrors()) {
            $this->_forward('roomupdate', null, null, array('status' => $response->getErrors()));
            return;
        }
        $this->_redirect($this->view->url(array('action' => 'roomupdate', 'id' => $bbid)));
    }

    public function deleteroomAction() {
        $id = $this->getRequest()->getParam("id");
        $response = $this->getResource('core')->post("room-delete", array('id' => $id));
        if ($response->hasErrors()) {
            $this->view->response = 'alert("' . l('errore durante la cancellazione') . '")';
            return;
        }
        $this->view->response = 'document.location.reload()';
    }

    public function roomphotogalleryAction() {
        $params = array(
            'id' => $this->getRequest()->getParam('id')
        );
        $roomResponse = $this->getResource('core')->get("room-by-bb", $params);
        $roomList = $roomResponse->getData();
        $room = array_pop($roomList);
        $response = $this->getResource('core')->get("room-gallery", array('id' => $room->id));
        if ($response->hasErrors()) {
            $this->view->errors = $response->getErrors();
            return;
        }
        $this->view->bbid = $this->getRequest()->getParam('id');
        $this->view->type = 'room';
        $photos = $response->getData()->photos;
        usort($photos, array($this, 'compare'));
        $this->view->photos = $photos;
    }

    public function updateroomphotoAction() {
        $id = $this->getRequest()->getParam('id');
        $pid = $this->getRequest()->getParam('pid');
        $response = $this->getResource('core')->post('room-gallery-update', array(
            'id' => $id,
            'pids' => $pid
                )
        );
        if ($response->hasErrors()) {
            $errors = implode('<br />' . $response->getErrors());
            $this->view->response = "$.facebox('" . l('update non avvenuta a causa di:') . "<br />" . $errors . "')";
        } else {
            $this->view->response = "$.facebox('" . l('modifica avvenuta con successo') . "')";
        }
    }

    public function roomtranslationAction() {
        ini_set('display_errors', 1);
        error_reporting(true);
        $type = $this->getRequest()->getParam("type", "bb");
        $id = $this->getRequest()->getParam("rid");

        $params = array(
            'id' => $this->getRequest()->getParam('id')
        );
        $roomResponse = $this->getResource('core')->get("room-by-bb", $params);
        $roomList = $roomResponse->getData();
        $room = array_pop($roomList);
        if ($type == 'bb') {
            $response = $this->getResource('core')->get("translation-room", array('id' => $room->id));
        } else if ($type == 'room') {
            $response = $this->getResource('core')->get("translation-room", array('id' => $room->id));
        }
        if ($response->hasErrors()) {
            $this->view->errors = $response->getErrors();
            return;
        }
        $dataResponse = $response->getData();
        $data = array();
        $languages = $this->getResource('language');
        foreach ($languages as $language) {
            $data[$language] = array();
            foreach ($dataResponse as $value) {
                if ($value->lang->prefix == $language)
                    $data[$language] = $value;
            }
        }
        $this->view->type = "room";
        $this->view->data = $data;
    }

    public function pricesAction() {
        $this->view->cMonth = $this->getRequest()->getParam("month", date('n'));
        $this->view->cYear = $this->getRequest()->getParam("year", date('Y'));
        $params = array(
            'id' => $this->getRequest()->getParam('id')
        );
        $roomResponse = $this->getResource('core')->get("room-by-bb", $params);
        $roomList = $roomResponse->getData();
        $room = array_pop($roomList);
        $response = $this->getResource('core')->get("room-price", array(
            'id' => $room->id,
            'dayStart' => 1,
            'monthStart' => $this->view->cMonth,
            'yearStart' => $this->view->cYear,
            'dayEnd' => cal_days_in_month(CAL_GREGORIAN, $this->view->cMonth, $this->view->cYear),
            'monthEnd' => $this->view->cMonth,
            'yearEnd' => $this->view->cYear,
                ));
        if ($response->hasErrors()) {
            $this->view->error = $response->getErrors();
        }
        $data = $response->getData();
        $toReturn = array();
        if (!empty($data)) {
            foreach ($data as $key => $val) {
                $toReturn[$val->date] = $val;
            }
        }
        $this->view->data = $toReturn;
    }

    public function pricesubmitAction() {
//        xdebug_disable();
        ini_set('display_errors', 1);
        error_reporting(E_ALL);
        $params = array(
            'id' => $this->getRequest()->getParam('id')
        );
        $roomResponse = $this->getResource('core')->get("room-by-bb", $params);
        $roomList = $roomResponse->getData();
        $room = array_pop($roomList);
        $response = $this->getResource('core')->post("room-price", array(
            'roomId' => $room->id,
            'year' => $this->getRequest()->getParam('year'),
            'month' => $this->getRequest()->getParam('month'),
            'price' => $this->getRequest()->getParam('price_val'),
            'isOffer' => $this->getRequest()->getParam('is_offer', array())));
        $this->view->response = $response;
    }

    public function settingsAction() {
        $high = new Models_Highlighted();
        $paginator = new Zend_Paginator(
                        new Adsolut_Paginator_Adapter_BbAll(
                                $this->getResource('core'),
                                $this->view->currentuser->id));
        $paginator->setCurrentPageNumber($this->getRequest()->getParam('page', 1));
        $paginator->setItemCountPerPage(18);
        $items = $paginator->getCurrentItems();
        $this->view->items = $items;
        $highList = $high->getHighlighted();
        $this->view->highList = array();
        foreach ($highList as $val) {
            $this->view->highList[$val->id] = 1;
        }
        $this->view->paginatorControll = $this->view->paginationControl($paginator, 'Sliding', 'block/paginator-controll.phtml');
    }

    public function actasusrAction() {
        $response = $this->getResource('core')->get("owner", array(
            'id' => $this->getRequest()->getParam('oid')
                ));
        $data = $response->getData();
        $admin = $this->view->currentuser;
        $data->oldUser = $admin;

        $result = new Zend_Auth_Result(Zend_Auth_Result::SUCCESS, $data);
        Zend_Auth::getInstance()->clearIdentity();
        Zend_Auth::getInstance()->getStorage()->write($result->getIdentity());
        $this->_redirect($this->view->url(array('action' => 'accomodation')));
    }

    public function actasadminAction() {
        $realUser = $this->view->currentuser->oldUser;
        $result = new Zend_Auth_Result(Zend_Auth_Result::SUCCESS, $realUser);
        Zend_Auth::getInstance()->clearIdentity();
        Zend_Auth::getInstance()->getStorage()->write($result->getIdentity());
        $this->_redirect($this->view->url(array('action' => 'settings')));
    }

    public function highlightAction() {
        $high = new Models_Highlighted();
        $id = $this->getRequest()->getParam('id');
        if (!$high->isHighlighted($id)) {
            if ($high->addHighLighted($id)) {
                $this->view->response = "$('.id-" . $id . "').css('background-color','#439D2A').css('color', 'white')";
            } else {
                $this->view->response = "$.facebox('" . l('an error occurred') . "')";
            }
        } else {
            $high->deleteByAccomodationId($id);
            $this->view->response = "$('.id-" . $id . "').css('background-color','transparent').css('color', 'black')";
        }
    }

    public function configurationAction() {
        $this->view->sitename = Models_Configuration::get('site-name');
    }

    public function titlesetAction() {
        Models_Configuration::set("title-pattern-{$this->getRequest()->getParam('page', 'home')}", $this->getRequest()->getParam('pattern', '{name} | {disctrict}'));
        if ($this->getRequest()->getParam('page', 'home') != 'profiledsearch') {
            Models_Configuration::set("keyword-pattern-{$this->getRequest()->getParam('page', 'home')}", $this->getRequest()->getParam('keyword'));
        }
        if ($this->getRequest()->getParam('page', 'home') == 'home') {
            Models_Configuration::set("description-home", $this->getRequest()->getParam('description'));
        }
    }

    public function savedsearchAction() {
        $modelSearch = new Models_ProfiledSearch;
        $this->view->row = $modelSearch->fetchNew();
        if ($this->getRequest()->getParam('a', false) == 'delete') {
            if (null !== ($current = $modelSearch->find($this->getRequest()->getParam('id'))->current())) {
                $current->delete();
            }
        } else if ($this->getRequest()->getParam('a', false) == 'update') {
            $this->view->row = $modelSearch->find($this->getRequest()->getParam('id'))->current();
        }

        $this->view->headScript(Zend_View_Helper_HeadScript::FILE, "/js/ckeditor/ckeditor.js");
        $this->view->search = $modelSearch->getSearch();
    }

    public function profiledsearchAction() {
        $document_root = $_SERVER['DOCUMENT_ROOT'];
        $uploads_dir = '/images/savedsearchcover';
        $types = array('cover', 'cover_big', 'slide1', 'slide2', 'slide3');
        $destinations = array();
        foreach ($types as $type) {
            $tmp_name = $_FILES[$type]["tmp_name"];
            $name = $_FILES[$type]["name"];
            $destination = $uploads_dir . "/" . uniqid() . '.jpg';
            if (move_uploaded_file($tmp_name, $document_root . $destination)) {
                $destinations[$type] = $destination;
            }
        }
        $model = new Models_ProfiledSearch();
        $data = array(
            'title' => $this->getRequest()->getParam('title'),
            'photo' => $destinations,
            'keyword' => $this->getRequest()->getParam('keyword'),
            'address' => $this->getRequest()->getParam('address'),
            'desc' => htmlentities($this->getRequest()->getParam('desc')),
            'latitude' => $this->getRequest()->getParam('latitude'),
            'longitude' => $this->getRequest()->getParam('longitude')
        );
        $row = $model->fetchNew();
        if ($this->getRequest()->getParam('id', false)) {
            $row = $model->find($this->getRequest()->getParam('id'))->current();
            $oldData = Zend_Json::decode($row->text);
            $photo = array_merge($oldData['photo'], $destinations);
            $data['photo'] = $photo;
        }
        $data = Zend_Json::encode($data);
        $model->create($row, $data);
        $this->_redirect($this->view->url(array('action' => 'savedsearch')));
    }

    public function showexistentAction() {
        ini_set('display_errors', 1);
        error_reporting(E_ALL);
        $type = $this->getRequest()->getParam('t', 'top');
        switch ($type) {
            case 'top':
                $model = new Models_ProfiledSearch();
                $partial = $this->view->partial('block/searchtopview.phtml', array('data' => $model->getSearch()));
                break;
            case 'left':
                $model = new Models_ProfiledSearch();
                $partial = $this->view->partial('block/searchtopview.phtml', array('data' => $model->getSearch('l', 6)));
                break;
            case 'bottom':
                $model = new Models_ProfiledSearch();
                $partial = $this->view->partial('block/searchtopview.phtml', array('data' => $model->getSearch('b%', 6)));
                break;
        }
        $partial = str_replace("\r\n", "", addslashes($partial));
        $this->view->response = "$.facebox('{$partial}');";
    }

    public function uploadbottomphotoAction() {
        $extension = array_pop(explode('.', $_FILES['file']['name']));
        $name = $this->getRequest()->getParam('title');
        if (move_uploaded_file($_FILES['file']['tmp_name'], APPLICATION_PATH . '/../public/images/savedsearchcover/' . $name . "." . $extension)) {
            $position = $this->getRequest()->getParam('position');
            Models_Configuration::set("savedSearchBottom_" . $position, $name);
            Models_Configuration::set("savedSearchBottom_" . $position . "_img", $name . "." . $extension);
        }
        $this->_redirect($this->view->url(array('action' => 'savedsearch')));
    }

    public function invoiceAction() {
        $id = $this->getRequest()->getParam('id');
        $type = $this->getRequest()->getParam('t');
        $cms = new Models_Cms();
        $this->view->cms = $cms->getActive("fatture");
        if ($type == 'cms') {
            $this->view->text = $cms->find($this->getRequest()->getParam('c'))->current();
        } else {
            $invoiceModel = new Models_Invoice();
            $this->view->invoiceData = $invoiceModel->findByBB($id);
            $model = new Models_Reservation();
            $this->view->result = $model->getByMonth(
                    $this->getRequest()->getParam('id'), $this->getRequest()->getParam('m', date('m')));
            $this->view->month = $this->getRequest()->getParam('m', date('m'));
        }
    }

    public function downloadinvoiceAction() {
        $invoiceModel = new Models_Invoice();
        $invoiceDataRow = $invoiceModel->findByBB($this->getRequest()->getParam("id"));
        $model = new Models_Reservation();
        $result = $model->getByMonth(
                $this->getRequest()->getParam('id'), $this->getRequest()->getParam('m', date('m')));
        $pdf = Zend_Pdf::load(APPLICATION_PATH . "/../public/resources/invoice.pdf");
        $page1 = $pdf->pages[0];
        $allerRg = Zend_Pdf_Font::fontWithName(Zend_Pdf_Font::FONT_HELVETICA);
        $allerBold = Zend_Pdf_Font::fontWithName(Zend_Pdf_Font::FONT_HELVETICA_BOLD);
        ;
        $allerDisplay = Zend_Pdf_Font::fontWithPath(APPLICATION_PATH . "/../public/css/allerdisplay-webfont.ttf");
        $color1 = new Zend_Pdf_Color_Html('#6d6e70');
        $color2 = new Zend_Pdf_Color_Html('#a7a9ac');
        $color3 = new Zend_Pdf_Color_Html('#50b848');

        $styleAllerRegular = new Zend_Pdf_Style();
        $styleAllerRegular->setFont($allerRg, "10");
        $styleAllerRegular->setFillColor($color1);

        $styleAllerBold = new Zend_Pdf_Style();
        $styleAllerBold->setFont($allerBold, "10");
        $styleAllerBold->setFillColor($color1);

        $styleAllerDisplay = new Zend_Pdf_Style();
        $styleAllerDisplay->setFont($allerDisplay, "10");
        $styleAllerDisplay->setFillColor($color2);

        $styleAllerBoldGreen = new Zend_Pdf_Style();
        $styleAllerBoldGreen->setFont($allerBold, "10");
        $styleAllerBoldGreen->setFillColor($color3);
        $invoiceData = Zend_Json::decode($invoiceDataRow->data);
//        d($invoiceData);
        $page1->setStyle($styleAllerRegular)->drawText("Data 15/" . date('m') . "/2013", 34, 715, 'UTF-8');
        $page1->setStyle($styleAllerRegular)->drawText("Ordine n. 0004", 34, 704, 'UTF-8');
        $page1->setStyle($styleAllerRegular)->drawText("Spett.le", $this->getTextPosition("Spett.le", $page1), 715, 'UTF-8');
        $page1->setStyle($styleAllerRegular)->drawText($invoiceData['invoice_name'], $this->getTextPosition($invoiceData['invoice_name'], $page1), 705, 'UTF-8');
        $page1->setStyle($styleAllerRegular)->drawText($invoiceData['invoice_address'], $this->getTextPosition($invoiceData['invoice_address'], $page1), 694, 'UTF-8');
        $page1->setStyle($styleAllerRegular)->drawText($invoiceData['invoice_zip'] . " " . $invoiceData['invoice_owner_region_name'], $this->getTextPosition($invoiceData['invoice_zip'] . " " . $invoiceData['invoice_owner_region_name'], $page1), 683, 'UTF-8');
//        $page1->setStyle($styleAllerRegular)->drawText("P.iva " + $invoiceData['invoice_surname'], $this->getTextPosition("P.iva " + $invoiceData['invoice_surname'], $page1), 672, 'UTF-8');

        $page1->setStyle($styleAllerBold)->drawText("Oggetto:", 34, 606, 'UTF-8');
        $page1->setStyle($styleAllerRegular)->drawText("Realizzazione e-commerce + campagna comunicaz. (2/12 tranches)", 75, 606, 'UTF-8');
        $page1->setStyle($styleAllerRegular)->drawText("Vi rimettiamo fattura per il lavoro di seguito specificato", 34, 586, 'UTF-8');

        $page1->setStyle($styleAllerRegular)->drawText("Vi rimettiamo fattura per il lavoro di seguito specificato", 34, 586, 'UTF-8');

        $page1->setLineWidth(1)->setLineColor($color2)->setLineDashingPattern(Zend_Pdf_Page::LINE_DASHING_SOLID)->drawLine(34, 542, 564, 542);

        $page1->setStyle($styleAllerDisplay)->drawText("Descrizione", 34, 526, 'UTF-8');
        $page1->setStyle($styleAllerDisplay)->drawText("q.tà", 343, 526, 'UTF-8');
        $page1->setStyle($styleAllerDisplay)->drawText("prezzo unitario", 403, 526, 'UTF-8');
        $page1->setStyle($styleAllerDisplay)->drawText("importo", $this->getTextPosition('importo', $page1), 526, 'UTF-8');
        $page1->setLineWidth(1)->setLineColor($color2)->setLineDashingPattern(Zend_Pdf_Page::LINE_DASHING_SOLID)->drawLine(34, 517, 564, 517);

        $textY = 492;
        $lineY = 475;
        for ($i = 0; $i < 9; $i++) {
            $lineStyle = array(2, 2);
            if ($i == 2) {
                Zend_Pdf_Page::LINE_DASHING_SOLID;
            }
            $page1->setStyle($styleAllerRegular)->drawText("Lorem ièpsum dolor sit amet consectetur adipiscing elit. Curabitur", 34, $textY, 'UTF-8');
            $page1->setStyle($styleAllerRegular)->drawText("5", 343, $textY, 'UTF-8');
            $page1->setStyle($styleAllerRegular)->drawText("9999,00", 425, $textY, 'UTF-8');
            $page1->setStyle($styleAllerRegular)->drawText("9999,00", $this->getTextPosition('9999,00', $page1), $textY, 'UTF-8');
            $page1->setLineWidth(1)->setLineColor($color2)->setLineDashingPattern($lineStyle)->drawLine(34, $lineY, 564, $lineY);
            if ($lineStyle != Zend_Pdf_Page::LINE_DASHING_SOLID) {
                $textY -= 39;
                $lineY -= 39;
            }
        }
        $lineY +=39;
        $page1->setStyle($styleAllerRegular)->drawText("subtotale", 340, $lineY-32, 'UTF-8');
        $page1->setStyle($styleAllerRegular)->drawText("imposte 21%", 340, $lineY-50, 'UTF-8');
        $page1->setStyle($styleAllerBoldGreen)->drawText("totale fattura", 340, $lineY-69, 'UTF-8');
        $page1->setStyle($styleAllerRegular)->drawText("9999,99", $this->getTextPosition('9999,00', $page1), $lineY-32, 'UTF-8');
        $page1->setStyle($styleAllerRegular)->drawText("9999,99", $this->getTextPosition('9999,00', $page1), $lineY-50, 'UTF-8');
        $page1->setStyle($styleAllerBoldGreen)->drawText("9999,99", $this->getTextPosition('9999,00', $page1), $lineY-69, 'UTF-8');

        $rendered = $pdf->render();
        header("Content-Disposition: attachment; filename=invoice.pdf");
        header("Content-Type: application/force-download");
        header("Content-Type: application/octet-stream");
        header("Content-Type: application/download");
        echo $rendered;
        die();
    }

    private function getTextPosition($text, $page) {
        $font = $page->getFont();
        $font_size = $page->getFontSize();
        $drawing_text = iconv('', 'UTF-8', $text);
        $characters = array();
        for ($i = 0; $i < strlen($drawing_text); $i++) {
//            $characters[] = (ord($drawing_text[$i++]) << 8) | ord($drawing_text[$i]);
            $characters[] = ord($drawing_text[$i]);
            ;
        }
        $glyphs = $font->glyphNumbersForCharacters($characters);
        $widths = $font->widthsForGlyphs($glyphs);
        $text_width = (array_sum($widths) / $font->getUnitsPerEm()) * $font_size;
        return ($page->getWidth() - ($text_width + 30));
    }

    public function invoiceupdateAction() {
        $invoiceModel = new Models_Invoice();
        $cms = new Models_Cms();
        $this->view->cms = $cms->getActive("fatture");
        if ($this->getRequest()->isPost()) {
            $id = $this->getRequest()->getParam('id');
            $toSave = $this->getRequest()->getParam('invoice');
            $invoiceData = $invoiceModel->findByBB($id);
            if (null == $invoiceData) {
                $invoiceData = $invoiceModel->fetchNew();
            }
            $invoiceData->bbid = $id;
            $invoiceData->data = Zend_Json::encode($toSave);
            $invoiceData->save();
        }
        $this->view->regions = $this->getResource('core')
                        ->get("region-get", array('countryid' => 29))->getData();
        $id = $this->getRequest()->getParam('id');
        $invoiceData = $invoiceModel->findByBB($id);
        if (null != $invoiceData) {
            $data = $invoiceData->data;
        } else {
            $data = '{}';
        }
        $this->view->invoiceData = Zend_Json::decode($data, Zend_Json::TYPE_ARRAY);
    }

    public function cmsAction() {
        $this->view->headScript(Zend_View_Helper_HeadScript::FILE, "/js/ckeditor/ckeditor.js");
        $model = new Models_Cms();

        $this->view->page = $model->fetchNew();
        if ($this->getRequest()->getParam('a') == 'create') {
            $this->view->action = 'edit';
        } else if ($this->getRequest()->getParam('a') == 'update') {
            $this->view->action = 'edit';
            $this->view->page = $model->find($this->getRequest()->getParam('id'))->current();
        } else if ($this->getRequest()->getParam('a') == 'delete') {
            $obj = $model->find($this->getRequest()->getParam('id'))->current();
            if (null != $obj) {
                $obj->delete();
            }
        } else if ($this->getRequest()->getParam('a') == 'activate') {
            $obj = $model->find($this->getRequest()->getParam('id'))->current();
            if (null != $obj) {
                $obj->active = 1;
                $obj->save();
            }
        } else if ($this->getRequest()->getParam('a') == 'deactivate') {
            $obj = $model->find($this->getRequest()->getParam('id'))->current();
            if (null != $obj) {
                $obj->active = 0;
                $obj->save();
            }
        } else if ($this->getRequest()->getParam('a') == 'createprocess') {
            if ($this->getRequest()->getParam('id', false)) {
                $id = $this->getRequest()->getParam('id');
                $label = $this->getRequest()->getParam('label');
                $text = $this->getRequest()->getParam('text');
                $position = $this->getRequest()->getParam('position');
                $new = $model->find($id)->current();
                $new->label = $label;
                $new->text = $text;
                $new->position = $position;
                $new->save();
            } else {
                $model->createRow($this->getRequest()->getParams())->save();
            }
        }
        $cms = $model->fetchAll();
        if ($cms->count() == 0) {
            $cms = false;
        }
        $this->view->cms = $cms;
    }

    public function toursiteAction() {
        $model = new Models_Toursite();
        $page = $this->getRequest()->getParam('page');
        if (($user = $model->getByUserId($this->view->currentuser->id)) !== null) {
            switch ($page) {
                case 'accomodation':
                    $user->home = 1;
                    break;
            }
            $user->save();
        }
    }

    public function invoicesAction() {
        $id = $this->getRequest()->getParam('id');
        $invoiceModel = new Models_Invoice();
        $this->view->invoiceData = $invoiceModel->findByBB($id);
        $model = new Models_Reservation();
        $this->view->result = $model->getByMonth(
                $this->getRequest()->getParam('id'), $this->getRequest()->getParam('m', date('m')));
        $this->view->month = $this->getRequest()->getParam('m', date('m'));
        if (empty($this->view->result)) {
            $this->view->result = array();
        }
    }

}