<?php

class Application_Form_Login extends Zend_Form {

    public function init() {
        
        $this->addElement('text', 'login', array(
            'label' => 'Login',
            'required' => 'true',
            'filter' => array('StringTrim'),
        ));
        $this->addElement('password', 'password', array(
            'label' => 'Haslo',
            'required' => 'true',
        ));
        
        $this->addElement('submit', 'Zaloguj');
    }

}
