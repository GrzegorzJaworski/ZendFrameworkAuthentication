<?php

class Application_Model_Register
{
    public function createUser(Application_Model_User $user) {
        $user = array (
            'email' => $user->getEmail(),
            'login' => $user->getLogin(),
            'password' => $user->getPassword(),
        );
        $dbTableUser = new Application_Model_DbTable_User();
        $dbTableUser->insert($user);
    }

}

