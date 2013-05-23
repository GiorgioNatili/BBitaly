<?php

/**
 * Description of Cms
 *
 * @author marcello
 */
class Models_Cms extends Zend_Db_Table_Abstract {
    
    protected $_name = 'cms';
    
    public function getLabel() {
        $select = $this->select()->from($this->_name, array('id','label'));
        return $this->fetchAll($select);
    }
    
    public function getActive($position='footer') {
        $select = $this->select()->where('active = 1')->where("position=?",$position);
        return $this->fetchAll($select);
    }
}