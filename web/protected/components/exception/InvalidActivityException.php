<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class InvalidActivityException extends Exception {
    
    public function __construct() {
        $this->code = 001;
        $this->message = 'We detected Invalid Activity in browsing and/or submissions. Please try again!';
    }
}
?>
