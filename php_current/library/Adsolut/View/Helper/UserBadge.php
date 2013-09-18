<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of UserBadge
 *
 * @author marcello
 */
class Adsolut_View_Helper_UserBadge extends Zend_View_Helper_Abstract{
    
    public function userBadge() {
        $isLogged = Zend_Auth::getInstance()->hasIdentity();
        $identity = Zend_Auth::getInstance()->getIdentity();
        return $this->view->partial('block/userbadge.phtml', array('user' => $identity, 'islogged' => $isLogged));
    }
    
}