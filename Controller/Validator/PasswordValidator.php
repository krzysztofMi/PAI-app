<?php

require_once 'CreditionalsValidator.php';

class PasswordValidator extends CreditionalsValidator {

    private const maxLength = 16;
    private const minLength = 6;
    public function __construct(string $password){
        $this->creditional = $password;
    }

    function validate(): bool
    {
        if($this->checkIfShorter(self::maxLength)){
            return false;
        }
        if($this->hasWhitespace()){
            return false;
        }
        if($this->checkIfLonger(self::minLength)){
            return false;
        }
        return true;
    }
}