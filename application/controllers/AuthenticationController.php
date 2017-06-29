<?php

class AuthenticationController extends Zend_Controller_Action {

    public function init() {
        /* Initialize action controller here */
    }

    public function indexAction() {
        // action body
    }

    public function loginAction() {
        if (Zend_Auth::getInstance()->hasIdentity()) {
            $this->_redirect('/');
        }

        $form = new Application_Form_Login();

        $request = $this->getRequest();
        if ($request->isPost()) {
            if ($form->isValid($this->_request->getPost())) {
                $login = $form->getValue('login');
                $password = $form->getValue('password');
                
                $auth = Zend_Auth::getInstance();
                $myAuth = new Application_Model_AuthHashVerify($login, $password);
                $result = $auth->authenticate($myAuth);

                if ($result->isValid()) {
                    $authStorage = $auth->getStorage();
                    $authStorage->write($auth->getStorage()->read());

                    $this->_redirect('/');
                } else {
                    echo 'invalid';
                }
            }
        }

        $this->view->form = $form;
    }

    public function logoutAction() {
        Zend_Auth::getInstance()->clearIdentity();
        $this->_redirect('/');
    }

}
