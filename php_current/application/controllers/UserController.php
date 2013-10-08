<?php

/**
 * Description of UserController
 *
 * @author marcello
 */
class UserController extends Adsolut_Controller_Action {

    public $contexts = array(
        'owneradd' => array('json')
    );

    public function init() {
        $this->_helper->contextSwitch()->initContext();
    }

    public function sendAction() {
        if (mail("marcello.roehrssen@gmail.com", "test", "test")) {
            die('si');
        }
        die('no');
//            $mail = new Zend_Mail();
//            $mail->setBodyHtml($this->view->partial('/emails/email.phtml', array(
//                        'email' => $this->getRequest()->getParam('email',"marcello.roehrssen@gmail.com"),
//                        'password' => "asd",
//                    )));
//            $mail->setFrom('congratulation@bedandbreakfastinitaly.com', 'Staff di bbitaly');
//            $mail->addTo($this->getRequest()->getParam('email',"marcello.roehrssen@gmail.com"));
//            $mail->setSubject('Congratulazioni presto diventerai un utente di BBitaly');
//            $mail->send();
//
//            $mail2 = new Zend_Mail();
//            $mail2->setBodyHtml($this->view->partial('/emails/email.phtml', array(
//                        'email' => $this->getRequest()->getParam('email',"marcello.roehrssen@gmail.com"),
//                        'password' => "asd",
//                    )));
//            $mail2->setFrom('congratulation@bedandbreakfastinitaly.com', 'Staff di bbitaly');
//            $mail2->addTo("marcello.roehrssen@gmail.com");
//            $mail2->addTo("info@bbitaly.com");
//            $mail2->setSubject('Congratulazioni un nuovo utente si � iscritto');
//            $mail2->send();
//            die("ad");
    }
    
    public function infoAction() {
        phpinfo();
        die();
    }

    public function emailAction() {
        $this->view->layout()->disableLayout();
    }
    
    public function indexAction() {
//        $this->view->layout()->disableLayout();
        $this->view->why = $this->getRequest()->getParam('why', '');
        $this->view->ok = $this->getRequest()->getParam('t',false);
        $this->view->redirect_url = $this->getRequest()->getParam('url', $this->view->url(array('controller' => 'index', 'action' => 'index')));
    }

    public function ownerAction() {
        $email = $this->getRequest()->getParam('email');
        $this->view->email = $email;
        $this->view->countries = $this->getResource('core')->get("country-get", array())->getData();
        $this->view->regions = $this->getResource('core')->get("region-get", array())->getData();
        $this->view->response = $this->getRequest()->getParam('insertstatus', null);
    }

    public function owneraddAction() {
        $pass = $this->getUniqueCode(8);
        $ownerResponse = $this->getResource('core')->post("owner", array(
            'bbname' => $this->getRequest()->getParam('name'),
            'surname' => $this->getRequest()->getParam('surname'),
            'password' => $this->getRequest()->getParam('passwd'),
            'email' => $this->getRequest()->getParam('email'),
            'address' => $this->getRequest()->getParam('address'),
            'admLev1' => $this->getRequest()->getParam('city'),
            'phonenumber' => $this->getRequest()->getParam('phonenumber'),
                )
        );
        try {
//            $mail = new Zend_Mail();
//            $mail->setBodyHtml($this->view->partial('/emails/email.phtml', array(
//                        'email' => $this->getRequest()->getParam('email'),
//                        'password' => $pass,
//                    )));
//            $mail->setFrom('congratulation@bedandbreakfastinitaly.com', 'Staff di bbitaly');
//            $mail->addTo($this->getRequest()->getParam('email'));
//            $mail->setSubject('Congratulazioni presto diventerai un utente di BBitaly');
//            $mail->send();
//
//            $mail2 = new Zend_Mail();
//            $mail2->setBodyHtml($this->view->partial('/emails/email.phtml', array(
//                        'email' => $this->getRequest()->getParam('email'),
//                        'password' => $pass,
//                    )));
//            $mail2->setFrom('congratulation@bedandbreakfastinitaly.com', 'Staff di bbitaly');
//            $mail2->addTo("marcello.roehrssen@gmail.com");
//            $mail2->addTo("info@bbitaly.com");
//            $mail2->setSubject('Congratulazioni un nuovo utente si � iscritto');
//            $mail2->send();
        } catch (Exception $e) {
            die(print_r($e));
        }
        if ($ownerResponse->hasErrors()) {
            $this->view->errors = $ownerResponse->getErrors();
            return;
        }
        /**
         * @todo SEND MAIL
         */
        $this->view->email = base64_encode($this->getRequest()->getParam('email'));
        $this->view->pass = base64_encode($this->getRequest()->getParam('passwd'));
    }

    private function getUniqueCode($length = "") {
        $code = md5(uniqid(rand(), true));
        if ($length != "")
            return substr($code, 0, $length);
        else
            return $code;
    }

    public function activateAction() {
        $url = $this->getRequest()->getParam('url');
        $userResponse = $this->getResource('core')->post("user-activate", array('id' => $this->getRequest()->getParam('uid')));
        if ($userResponse->hasErrors()) {
            die(print_r($userResponse->getErrors()));
            return;
        }
        $result = new Zend_Auth_Result(Zend_Auth_Result::SUCCESS, $userResponse->getData());
        Zend_Auth::getInstance()->clearIdentity();
        Zend_Auth::getInstance()->getStorage()->write($result->getIdentity());
//        $this->_redirect($this->view->url(array('subdomain'=>'www'),null,true).$url);
        $this->_redirect($url);
    }

}