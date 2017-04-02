<?php

//Login controller - Initializes the login page

namespace Mini\Controller;

use Mini\Model\User;

class LoginController
{
    public function index()
    {
        //Class initialized
        $User = new User();
        $User->Login();
        require APP . 'view/_templates/header.php';
        require APP . 'view/loginsignup/login.php';
        require APP . 'view/_templates/footer.php';
    }
}