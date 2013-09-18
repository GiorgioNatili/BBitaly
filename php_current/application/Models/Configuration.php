<?php

/**
 * Description of Configuration
 *
 * @author marcello
 */
class Models_Configuration extends Zend_Db_Table_Abstract {

    private static $_instance = null;
    protected $_name = 'configuration';
    protected $_primary = 'id';

    public function getFromDb($key) {
        $select = $this->select()->where('`key` = ?', $key);
        return $this->fetchRow($select);
    }

    private function findByKey($key, $default=null) {
        $obj = $this->getFromDb($key);
        if (!is_null($obj)) {
            if (!is_null($obj->value)) {
                return $obj->value;
            } else {
                return $default;
            }
        }
        return $default;
    }

    private function setByKeyValue($key, $value) {
        $new = $this->getFromDb($key);
        if (empty($new)) {
            $new = $this->fetchNew();
        }
        $new->key = $key;
        $new->value = $value;
        $new->save();
    }

    public static function set($key, $value) {
        $key = trim($key);
        if (null === self::$_instance) {
            self::$_instance = new self();
        }
        self::$_instance->setByKeyValue($key, $value);
    }

    public static function get($key, $default = null) {
        if (null === self::$_instance) {
            self::$_instance = new self();
        }
        $key = trim($key);
        return self::$_instance->findByKey($key, $default);
    }

}