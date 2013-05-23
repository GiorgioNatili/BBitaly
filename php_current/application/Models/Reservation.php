<?php

/**SELECT `reservationdata`.* FROM `reservationdata` WHERE (bbid = '3e9f2f0aad3b691812a3d0dac724b61d') AND (MONTH(checkout) = '2')
 * Description of Invoice
 *
 * @author marcello
 */
class Models_Reservation extends Zend_Db_Table{
    
    protected $_name = 'reservationdata';
    
    public function getByMonth($bbid,$month) {
        $select = $this->select()->where("bbid = ?",$bbid)->where("MONTH(checkout) = ?", $month);
        return $this->fetchAll($select);
    }
    
}