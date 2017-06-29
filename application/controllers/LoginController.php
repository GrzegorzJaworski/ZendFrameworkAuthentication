<?php

class LoginController extends Zend_Controller_Action {


    public function indexAction() {
        
        $request = $this->getRequest();
        $formLogin = new Application_Form_Login();

        if ($this->getRequest()->isPost()) {
            if ($formLogin->isValid($request->getPost())) {
                $formDatas = $formLogin->getValues();
                $login = $formDatas['login'];
                $password = $formDatas['password'];
                $tabel = new Application_Model_DbTable_User();
                $user = $tabel->fetchRow("login='" . "$login" . "'");
                if (isset($user)) {
                    if (password_verify($password, $user['password'])) {
                        $this->_redirect('/');
                    } else {
                        echo 'Nie poprawny logi lub hasło';
                    }
                } else {
                    echo 'Nie poprawny logi lub hasło';
                }
            }
        }

        $this->view->form = $formLogin;
    }

}
