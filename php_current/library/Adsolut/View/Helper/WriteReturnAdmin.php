<?php

/**
 * Description of WriteImage
 *
 * @author marcello
 */
class Adsolut_View_Helper_WriteReturnAdmin extends Zend_View_Helper_Abstract {

    public function writeReturnAdmin($currentuser) {
        $admins = new Models_Superadmin();
        $id = $currentuser->id;
        if (isset($currentuser->oldUser)) {
            $id = $currentuser->oldUser->id;
        }
        if ($admins->isSuperadmin($id) && isset($currentuser->oldUser)) {
            return "<div class=\"return-admin-container\"><a class=\"link-return-admin\" href=\"" . $this->view->url(array('action' => 'actasadmin')) . "\">Return admin</a><div class=\"clear\"></div></div>";
        }
    }

}