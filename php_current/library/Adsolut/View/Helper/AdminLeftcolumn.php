<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of leftcolumn
 *
 * @author marcello
 */
class Adsolut_View_Helper_AdminLeftcolumn extends Zend_View_Helper_Abstract {

    public function adminLeftColumn($actions) {
        $admins = new Models_Superadmin();
        $currentAction = Zend_Controller_Front::getInstance()->getRequest()->getActionName();
        $user = $this->view->currentuser;
        if (!$admins->isSuperadmin($user->id)) {
            unset($actions['configuration']);
        }
        return $this->view->partial('block/leftcolumn.phtml', array('menuitems' => $actions));
    }

}