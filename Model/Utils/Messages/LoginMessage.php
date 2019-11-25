<?php

require_once 'Message.php';

class LoginMessage extends Message{

    public function __construct(string $credentials){
        if($credentials === "hasło"){
            parent::__construct("Podałeś złe $credentials.");
        }else{
            parent::__construct("Podałeś zły $credentials.");
        }
        $this->type = "loginMessage";
    }


}
