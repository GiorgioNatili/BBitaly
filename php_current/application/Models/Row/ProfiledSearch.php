<?php

/**
 * Description of ProfiledSearchTop
 *
 * @author marcello
 */
class Models_Row_ProfiledSearch extends Zend_Db_Table_Row {

//    public $label = null;

    public function __get($columnName) {
        if ($columnName == 'label') {
            $profiledSearchTopLang = new Models_ProfiledSearchLang();
            return $profiledSearchTopLang->getById($this->id);
        }
        return parent::__get($columnName);
    }

}