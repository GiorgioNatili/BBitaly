<?php

/**
 * Description of Route
 *
 * @author marcello
 */
class Adsolut_Route {
    
    private $_cookie_name = '_BBITST';
    
    private $_data = array(
        'booked' => array(),
        'routes' => array()
    );
    
    private $_loaded = false;
    
    public function addStay($terms, $start_date, $end_date, $persons) {
        $this->_data['routes'][] = array(
            'term' => $terms,
            'startdate' => $start_date,
            'enddate' => $end_date,
            'person' => $persons,
        );
        return $this;
    }
    
    public function getRoute() {
        return $this->_data['routes'];
    }
    
    public function book($bbid) {
        $this->_data['booked'][] = $bbid;
        return $this;
    }
    
    public function getBooked() {
        return $this->_data['booked'];
    }
    
    public function save() {
        setcookie(
                $this->_cookie_name,
                $this->marshal($this->_data),
                time()+60*60*24*365,
                '/');
    }
    
    public function load() {
        $data = $this->unmarshal();
        d($data);
        $this->_loaded = true;
    }
    
    private function marshal($data) {
        
        return base64_encode(Zend_Json::encode($data));
    }
    
    private function unmarshal() {
        return Zend_Json::decode(base64_decode($_COOKIE[$this->_cookie_name]));
    }
}