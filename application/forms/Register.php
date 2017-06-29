<?php

class Application_Form_Register extends Zend_Form {

    public function init() {
        $this->addElement('text', 'email', array(
            'label' => 'Email',
            'required' => 'true',
            'filter' => array('StringTrim'),
            'validators' => array('EmailAddress',),
        ));
        $this->addElement('text', 'login', array(
            'label' => 'Login',
            'required' => 'true',
            'filter' => array('StringTrim'),
        ));
        $this->addElement('password', 'password1', array(
            'label' => 'Haslo',
            'required' => 'true',
        ));
        $this->addElement('password', 'password2', array(
            'label' => 'Powtorz haslo',
            'required' => 'true',
            'validators' => array(
                array('identical', false, array('token' => 'password1'))
            )
        ));
        $this->addElement('submit', 'save');
    }

}