<?php

/**
 * Description of ProfiledSearchTop
 *
 * @author marcello
 */
class Models_ProfiledSearch extends Zend_Db_Table_Abstract {

    protected $_name = "profiledsearch";
    protected $_primary = 'id';
    protected $_rowClass = 'Models_Row_ProfiledSearch';
    
    public function create($row, $data) {
        $row->text = $data;
        $row->date = date("Y-m-d H:i:s");
        $row->save();
    }

    public function getByKeyword($keyword) {
        $select = $this->select()->where("keyword = ?", $keyword);
        return $this->fetchRow($select);
    }

    public function getSearch($p = 't', $limit = 12) {
        $select = $this->select()->order("date DESC")->limit($limit);
        return $this->fetchAll($select);
    }
}