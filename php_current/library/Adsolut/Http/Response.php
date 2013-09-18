<?php

/**
 * Description of Response
 *
 * @author marcello
 */
class Adsolut_Http_Response {

    private $errors = array();
    private $data;

    function __construct($raw_response) {
        $this->setErrors($raw_response->errors);
        $this->setData($raw_response->data);
    }

    public function hasErrors() {
        return !empty($this->errors);
    }

    private function setErrors($errors) {
        $this->errors = $errors;
    }

    private function setData($data) {
        $this->data = $data;
    }

    public function getErrors() {
        return $this->errors;
    }

    public function getData() {
        return $this->data;
    }

}