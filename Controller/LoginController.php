<?php

require_once 'Model/Utils/Messages/LoginMessage.php';
require_once 'Model/Utils/Messages/LogoutMessage.php';
require_once 'Model/User.php';
class LoginController extends ApplicationController {

    public function login(){

        $user = new User("admin", "poczta@poczta.pl", "admin");
        if($this->isPost()){
            $login = $_POST["login"];
            $user->setPassword(password_hash($user->getPassword(), PASSWORD_BCRYPT));

            //CONNECT TO DB CHECK PASSWORD ETC.

            if($login != 'admin'){
                $message = new LoginMessage("login");
                $this->render('login', $message->getMessage());
                return;
            }
            if(!password_verify($_POST['password'], $user->getPassword())){
                $message = new LoginMessage("hasło");
                $this->render('login', $message->getMessage());
                return;
            }
            $_SESSION['id'] = $user->getLogin();
            $_SESSION['role'] = $user->getRole();
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
