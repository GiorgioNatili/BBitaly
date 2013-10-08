<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of OwnerLogin
 *
 * @author marcello
 */
class Adsolut_Form_OwnerLogin extends Zend_Form {

    public function init() {
        $email = new Zend_Form_Element_Text('email');
        $email->addValidator('emailAddress', false, array(
            'messages' => array(
                Zend_Validate_EmailAddress::INVALID_FORMAT => l('Indirizzo email non valido')
            )
        ));
        $email->addValidator('notEmpty', false, array(
            'messages' => array(
                Zend_Validate_NotEmpty::IS_EMPTY => l("Email obbligatoria"),
            )
        ));
        $email->setRequired(true);
        $this->addElement($email);

        $password = new Zend_Form_Element_Password('password');
        $password->addValidator('notEmpty', false, array(
            'messages' => array(
                Zend_Validate_NotEmpty::IS_EMPTY => l("Password obbligatoria"),
            )
        ));
        $password->setRequired(true);
        $this->addElement($password);

        $this->addElement(new Zend_Form_Element_Submit("send"));
    }

}
