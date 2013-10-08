<?php

/**
 * Description of Toursite
 *
 * @author marcello
 */
class Models_Toursite extends Zend_Db_Table_Abstract {
    
    protected $_name = 'toursite';
    protected $_primary = 'id';
    
    public function getByUserId($id) {
        $select = $this->select()->where("userid = ?", $id);
        return $this->fetchRow($select);
    }
    
    public function setViewed($id, $page) {
        
    }
}