<?php

/**
 * Description of Client
 *
 * @author marcello
 */
class Adsolut_Http_Client {

    private $base_path;
    private $end_points = array();

    public function getBasepath() {
        return $this->base_path;
    }

    public function setBasepath($base_uri) {
        $this->base_path = $base_uri;
    }

    public function getEndpoints() {
        return $this->end_points;
    }

    public function setEndpoints($end_points) {
        $this->end_points = $end_points;
    }

    public function get($endpoint_alias, $params) {
        $response = "{}";
        $params = $this->parseParam($params);
        try {
            $a = new Zend_Http_Client($this->base_path . $this->end_points[$endpoint_alias]);
            $a->setParameterGet($params);
            $response1 = $a->request(Zend_Http_Client::GET);
            $body = $response1->getBody();
            $response = json_decode($body);
        } catch (Exception $e) {
            //NOP
        }
        return new Adsolut_Http_Response($response);
    }

    public function post($endpoint_alias, $params) {
        $response = "{}";
        $params = $this->parseParam($params);
        try {
            $a = new Zend_Http_Client($this->base_path . $this->end_points[$endpoint_alias]);
            $a->setParameterPost($params);
            $response1 = $a->request(Zend_Http_Client::POST);
            $b = $response1->getBody();
            $response = json_decode($b);
        } catch (Exception $e) {
            die(print_r($e));
        }
        return new Adsolut_Http_Response($response);
    }
    
    public function putFile($endpoint_alias, $params) {
        $response = "{}";
        $params = $this->parseParam($params);
        try {
            
            $a = new Zend_Http_Client($this->base_path . $this->end_points[$endpoint_alias]);
            $a->setFileUpload($params['file'], 'file');
            unset($params['file']);
            $a->setParameterPost($params);
            $a->setEncType(Zend_Http_Client::ENC_FORMDATA);
            $b = $a->request(Zend_Http_Client::POST)->getBody();
            $response = json_decode($b);
        } catch (Exception $e) {
            die(print_r($e));
        }
        return new Adsolut_Http_Response($response);
    }

    private function parseParam($params) {
        if (!isset($params['lang'])) {
            $lang = array(
                'lang' => Zend_Controller_Front::getInstance()->getRequest()->getParam('language'),
                'appid' => '1',
                'signature' => md5("1"."m1NnC3L0jKe87p0")
            );
            return array_merge($params,$lang);
        }
        return $params;
    }
}
