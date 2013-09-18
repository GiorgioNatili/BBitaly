<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Authorizator
 *
 * @author marcello
 */
class Adsolut_Plugin_Authorizator extends Zend_Controller_Plugin_Abstract {

//    private $whiteList = array(
//        'admin' => array(
//            'login',
//            'loginprocess'
//        )
//    );

    public function preDispatch(Zend_Controller_Request_Abstract $request) {
        parent::preDispatch($request);
        
        $zendAuth = Zend_Auth::getInstance();
        $role = 'guest';
        
        if ($zendAuth->hasIdentity()) {
            Zend_Controller_Front::getInstance()
                            ->getParam('bootstrap')
                            ->getResource('view')
                    ->currentuser = $zendAuth->getIdentity();

            Zend_Controller_Front::getInstance()
                            ->getParam('bootstrap')
                            ->getResource('view')->layout()->currentuser = $zendAuth->getIdentity();
            
            Zend_Controller_Front::getInstance()
                    ->setParam("currentuser", $zendAuth->getIdentity());
            $role = $zendAuth->getIdentity()->role; 
        }
        
        /* @var $acl Zend_Acl */
        $acl = Zend_Controller_Front::getInstance()->getParam("bootstrap")
                ->getResource('acl');
        
        
        $controller = $request->getControllerName();
        $action = $request->getActionName();
        $resource1 = $controller;
        $resource2 = $controller.$action;
        
        $destination = array();
        try {
            $resource = $acl->get($resource2);
        } catch (Zend_Acl_Exception $ex) {
            $resource = $acl->get($resource1);
        }
        
        if ($acl->isAllowed($role, $resource)) {
            return;
        } else {
            if ($role == 'guest') {
                $destination['controller'] = 'admin';
                $destination['action'] = 'login';
            } else {
                $destination['controller'] = 'admin';
                $destination['action'] = 'login';
            }
        }
        $request->setControllerName($destination['controller'])
                ->setActionName($destination['action'])
                ->setDispatched(false);
    }

}
