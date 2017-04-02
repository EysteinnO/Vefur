<?php

namespace Mini\Controller;

use Mini\Model\User;

class SignupController
{
    public function index()
    {
        // load views. within the views we can echo out $songs and $amount_of_songs easily
        require APP . 'view/_templates/header.php';
        require APP . 'view/loginsignup/signup.php';
        require APP . 'view/_templates/footer.php';
    }
}