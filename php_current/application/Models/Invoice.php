<?php

/**
 * Description of Invoice
 *
 * @author marcello
 */
class Models_Invoice extends Zend_Db_Table{
    
    protected $_name = 'invoices';
    
    public function findByBB($bbid) {
        $select = $this->select()->where('bbid = ?',$bbid);
        return $this->fetchRow($select);
    }
    
}