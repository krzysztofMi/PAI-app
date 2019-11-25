<?php

require_once 'Model/User.php';

class RegistrationController extends ApplicationController {

    public function register(){

        if($this->isPost()){
            $login = $_POST['login'];
            $email = $_POST['email'];
            $hashPassword = password_hash($_POST['password'], PASSWORD_BCRYPT);
            $hashRePassword = password_hash($_POST['repassword'], PASSWORD_BCRYPT);

            //Veryfi credentionals
            if(password_verify($_POST['password'], $hashPassword) !== password_verify($_POST['repassword'], $hashRePassword)){

            }
            $user = new User($login, $email, $hashPassword);
            //SAVE TO DB ;

            $url = "http://$_SERVER[HTTP_HOST]/";
            header("Location: {$url}?page=login");
        }

        $this->render('register');
    }
    
}
