<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class AccountAlreadyActivatedException extends Exception {
    
    public function __construct() {
        $this->code = 300;
        $this->message = 'This link is expired. Your account is already activated';
    }
}
?>
