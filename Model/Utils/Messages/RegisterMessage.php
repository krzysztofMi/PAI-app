<?php


class RegisterMessage extends Message {

    public function __construct(string $credentials){
        parent::__construct("Podany $credentials już istnieje!");
        $this->type = "registerMessage";
    }

    public function badRePassword(){
        $this->text = "Podane hasła różnią się.";
    }





}