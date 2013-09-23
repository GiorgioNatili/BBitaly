<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class IllegalProfileUpdateException extends Exception {
    
    public function __construct() {
        $this->code = 002;
        $this->message = 'Hey, did you tried playing across with us? Invalid Profile update detected!';
    }
}
?>
