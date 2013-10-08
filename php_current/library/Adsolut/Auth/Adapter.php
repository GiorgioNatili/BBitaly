<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Adapter
 *
 * @author marcello
 */
class Adsolut_Auth_Adapter implements Zend_Auth_Adapter_Interface {
    
    private $username;
    
    private $password;
    
    private $endpoint;
    
    function __construct($username, $password, $endpoint = 'auth-owner') {
        $this->username = $username;
        $this->password = $password;
        $this->endpoint = $endpoint;
    }
    
    /**
     * Performs an authentication attempt
     *
     * @throws Zend_Auth_Adapter_Exception If authentication cannot
     *                                     be performed
     * @return Zend_Auth_Result
     */
    public function authenticate()
    {
        $core = Zend_Controller_Front::getInstance()->getParam("bootstrap")->getResource("core");
        /* @var $response Adsolut_Http_Response */
        $response = $core->get($this->endpoint, 
                array(
                    'email' => $this->username,
                    'password' => $this->password));
        $result = Zend_Auth_Result::FAILURE;
        if (!$response->hasErrors()) {
            $result = Zend_Auth_Result::FAILURE_IDENTITY_NOT_FOUND;
            $data = $response->getData();
            if (!empty($data)) {
                $result = Zend_Auth_Result::SUCCESS;
            }
        } 
        return new Zend_Auth_Result($result, $response->getData());
    }
}
