<?php

/**
 * Description of Stay
 *
 * @author marcello
 */
class Adsolut_Route_Stay {
    
    private $_term = '';
    
    private $_start_date = '' ;
    
    private $_end_date = '' ;
    
    private $_persons = 1;
    
    public function getTerm() {
        return $this->_term;
    }

    public function setTerm($term) {
        $this->_term = $term;
        return $this;
    }

    public function getStartDate() {
        return $this->_start_date;
    }

    public function setStartDate($startDate) {
        $this->_start_date = $startDate;
        return $this;
    }

    public function getEndDate() {
        return $this->_end_date;
    }

    public function setEndDate($endDate) {
        $this->_end_date = $endDate;
        return $this;
    }

    public function getPersons() {
        return $this->_persons;
    }

    public function setPersons($persons) {
        $this->_persons = $persons;
        return $this;
    }
    
    public function load($data) {
        
    }
}