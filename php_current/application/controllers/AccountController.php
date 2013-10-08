<?php

/**
 * Description of Account
 *
 * @author marcello
 */
class AccountController extends Adsolut_Controller_Action  {
    
    public $contexts = array(
        'updateprocess' => array('json')
    );
    
//    public function init() {
//        if (!Zend_Auth::getInstance()->hasIdentity()) {
//            $this->_redirect($this->view->url(array('controller' => 'user','action' => 'index'))."?why=nolgged2&url={$this->getRequest()->getServer('REQUEST_URI')}");
//            return;
//        }
//        $this->_helper->contextSwitch()->initContext();
//    }
    public function init() {
        $this->_redirect($this->view->url(array('controller'=>'user', 'action'=>'index')));
    }
    public function indexAction() {
        $id = $this->view->currentuser->id;
        $books = $this->getResource("core")->get('book-by-user', array('uid' => $id));
        if ($books->hasErrors()) {
            $this->view->errors = true;
            return;
        }
        $this->view->books = $books->getData();
    }
    
    public function updateAction() {
        $this->view->layout()->disableLayout();
    }
    
    public function updateprocessAction() {
        xdebug_disable();
        $response = $this->getResource('core')->post("user-update", array(
            'id' => $this->view->currentuser->id,
            'name' => $this->getRequest()->getParam('name'),
            'surname' => $this->getRequest()->getParam('surname'),
            'email' => $this->getRequest()->getParam('email'),
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
}