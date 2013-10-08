<?php

/**
 * Description of ProfiledSearchTop
 *
 * @author marcello
 */
class Models_ProfiledSearchLang extends Zend_Db_Table_Abstract {

    protected $_name = "profiledsearch_lang";
    protected $_primary = array('id', 'lang');

    private $avalaibleLang = array('it', 'en');
    
    public function create($id, $label, $lang) {
        $new = $this->getByPrimary($id, $lang);
        if ($new == null) {
            $new = $this->fetchNew();
            $new->id = $id;
            $new->lang = $lang;
        }
        $new->label = $label;
        $new->save();
    }

    public function getByPrimary($id, $lang) {
        $select = $this->select()->where("id = ?", $id)->where("lang = ?", $lang);
        return $this->fetchRow($select);
    }

    public function getById($id) {
        $lang = Zend_Controller_Front::getInstance()->getRequest()->getParam('language', 'it');
        if (($lang = array_search($lang, $this->avalaibleLang)) !== false) {
            $lang = 'it';
        }
        return $this->getByPrimary($id, $lang);
    }
    
    public function getAll($id) {
        $a = $this->select()->where("id = ?", $id);
        return $this->fetchAll($a);
    }

}