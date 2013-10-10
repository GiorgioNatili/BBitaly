<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class InvalidActivationCodeException extends Exception {
    
    public function __construct() {
        $this->code = 200;
        $this->message = 'The activation code is invalid or does not associate with any account!';
    }
}
?>
