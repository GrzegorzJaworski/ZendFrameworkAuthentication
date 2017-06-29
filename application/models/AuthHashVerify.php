<?php

class Application_Model_AuthHashVerify implements Zend_Auth_Adapter_Interface {

    protected $login;
    protected $password;    

    public function __construct($login, $password) {
        $this->login = $login;
        $this->password = $password;
    }

    public function authenticate() {
        $dbUser = new Application_Model_DbTable_User();
        $user = $dbUser->fetchRow("login='" . "$this->login" . "'");
//        Zend_Debug::dump($user);
//        die;
//if you want to use the Zend_Auth_Result::FAILURE_IDENTITY_AMBIGUOUS error condition, use fetchAll
        if (isset($user)) {
            
            if (password_verify($this->password, $user['password'])) {
//User OK
                return new Zend_Auth_Result(Zend_Auth_Result::SUCCESS, $user);
            } else {
                return new Zend_Auth_Result(Zend_Auth_Result::FAILURE_CREDENTIAL_INVALID, $user, ['Password mismatch']);
            }
        } else {
            return new Zend_Auth_Result(Zend_Auth_Result::FAILURE_IDENTITY_NOT_FOUND, $user, ['Login not found']);
        }
    }

}
