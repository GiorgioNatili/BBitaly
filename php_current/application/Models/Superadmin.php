<?php

/**
 * Description of Highlighted
 *
 * @author marcello
 */
class Models_Superadmin extends Zend_Db_Table_Abstract {

    protected $_name = 'superadmin';
    protected $_primary = 'id';

    public function addSuperadmin($id) {
        if ($this->isSuperadmin($id)) {
            $new = $this->fetchNew();
            $new->userid = $id;
            $new->save();
        }
    }

    public function isSuperadmin($id) {
        $select = $this->select()->where('userid = ?', $id);
        $row = $this->fetchRow($select);
        return !empty($row);
    }

}