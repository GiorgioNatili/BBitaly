<?php

/**
 * Description of Highlighted
 *
 * @author marcello
 */
class Models_Highlighted extends Zend_Db_Table_Abstract {

    protected $_name = 'highlighted';
    protected $_primary = 'id';

    public function addHighLighted($id) {
        $new = $this->fetchNew();
        $new->accomodationid = $id;
        $new->active = 1;
        return $new->save();
    }
    
    public function deleteByAccomodationId($id) {
        $this->update(array('active'=>0), array('accomodationid' => $id));
    }
    
    public function isHighlighted($id) {
        return $this->fetchRow($this->select()->where("accomodationid = ?", $id)->where("active = 1")) != null;
    }

    public function getHighlighted() {
        $select = $this->select()->where('active = 1');
        $data = $this->fetchAll($select);
        $ids = array();
        foreach ($data as $item) {
            $ids[] = $item->accomodationid;
        }
        $response = Zend_Controller_Front::getInstance()
                ->getParam('bootstrap')
                ->getResource('core')
                ->get('search-byids', array('ids' => $ids));
        return $response->getData();
    }

}