<?php

class RegisterController extends Zend_Controller_Action {

    public function init() {
        /* Initialize action controller here */
    }

    public function indexAction() {
        $request = $this->getRequest();
        $formRegister = new Application_Form_Register();

        if ($this->getRequest()->isPost()) {
            if ($formRegister->isValid($request->getPost())) {
                $user = new Application_Model_User($formRegister->getValues());
                $register = new Application_Model_Register();

                $register->createUser($user);
                 $this->_redirect('/');
            }
        }
        $this->view->form = $formRegister;
    }

}
