<?php

require_once 'CreditionalsValidator.php';

class PasswordValidator extends CreditionalsValidator {

    private const maxLenght = 16;

    public function __construct(string $password){
        $this->creditional = $password;
    }

    function validate(): bool
    {
        if($this->checkIfShorter(self::maxLenght)){
            return false;
        }
        if($this->hasWhitespace()){
            return false;
        }
        return true;
    }
}