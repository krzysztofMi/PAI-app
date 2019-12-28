<?php

require_once 'Model/User.php';
require_once 'Repository/UserRepository.php';
require_once 'Model/Utils/Messages/RegisterMessage.php';

class RegistrationController extends ApplicationController {

    private $userRepository;

    public function __construct(){
        parent::__construct();
        $this->userRepository = new UserRepository();
    }


    public function register(){
        if($this->isPost()){
            $login = $_POST['login'];
            $email = $_POST['email'];
            $hashPassword = password_hash($_POST['password'], PASSWORD_BCRYPT);
            if($_POST['password'] !== $_POST['repassword']){
                $message = new RegisterMessage("");
                $message->badRePassword();
                $this->render('register', $message->getMessage());
                return;
            }
            $user = new User($login, $email, $hashPassword);
            $user->addRole("ROLE_USER");
            $controllUser = $this->userRepository->getUserByLogin($login);
            if($controllUser != null){
                $message = new RegisterMessage("login");
                $this->render('register', $message->getMessage());
                return;
            }
            $controllUser = $this->userRepository->getUserByEmail($email);
            if($controllUser != null){
                $message = new RegisterMessage("email");
                $this->render('register', $message->getMessage());
                return;
            }
            $this->userRepository->saveUser($user);
            $url = "http://$_SERVER[HTTP_HOST]/";
            header("Location: {$url}?page=login");
        }

        $this->render('register');
    }
    
}
