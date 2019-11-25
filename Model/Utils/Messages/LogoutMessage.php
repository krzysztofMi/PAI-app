<?php

require_once 'Message.php';

class LogoutMessage extends Message{
    public function __construct(){
        $this->text = "Zostałeś pomyślnie wylogowany :)";
        $this->type = "logoutMessage";
    }
}
