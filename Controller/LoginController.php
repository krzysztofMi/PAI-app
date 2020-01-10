<?php

require_once 'Model/Utils/Messages/LoginMessage.php';
require_once 'Model/Utils/Messages/LogoutMessage.php';
require_once 'Model/User.php';
require_once 'Repository/UserRepository.php';

class LoginController extends ApplicationController {

    private $userRepository;

    public function __construct(){
        parent::__construct();
        $this->userRepository = new UserRepository();
    }

    public function login(){
        if(isset($_SESSION["id"])){
            $url = "http://$_SERVER[HTTP_HOST]/";
            header("Location: {$url}?page=city");
        }
        if($this->isPost()){
            $login = $_POST["login"];

            $user = $this->userRepository->getUserByLogin($login);

            if(!isset($user)){
                $message = new LoginMessage("login");
                $this->render('login', $message->getMessage());
                return;
            }
            if(!password_verify($_POST['password'], $user->getPassword())){
                $message = new LoginMessage("hasło");
                $this->render('login', $message->getMessage());
                return;
            }
            $_SESSION["user_id"] = $user->getId();
            $_SESSION["id"] = $user->getLogin();
            $_SESSION["role"] = $user->getRole();
            $url = "http://$_SERVER[HTTP_HOST]/";
            header("Location: {$url}?page=city");
        }

        $this->render('login');
    }

    public function logout(){
        session_unset();
        session_destroy();
        $message = new LogoutMessage();
        $this->render('index', $message->getMessage());
    }
}
