<?php

class Application_Model_User {

    protected $_id;
    protected $_email;
    protected $_login;
    protected $_password;

    public function __construct(array $array) {
        Zend_Loader::loadClass('Zend_Filter_StripTags');
        $filter = new Zend_Filter_StripTags();
        $this->_email = $filter->filter($array['email']);
        $this->_login = $filter->filter($array['login']);
        $this->_password = password_hash($filter->filter($array['password1']), PASSWORD_DEFAULT);
    }

    public function getId() {
        return $this->_id;
    }

    public function setEmail($email) {
        $this->_email = $email;
        return $this;
    }

    public function getEmail() {
        return $this->_email;
    }

    public function setLogin($login) {
        $this->_login = $login;
        return $this;
    }

    public function getLogin() {
        return $this->_login;
    }

    public function setPassword($password) {
        $this->_password = password_hash($password, PASSWORD_DEFAULT);;
        return $this;
    }

    public function getPassword() {
        return $this->_password;
    }

}
