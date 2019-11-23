<?php

require_once 'CreditionalsValidator.php';

class LoginValidator extends CreditionalsValidator
{

    private const maxSize = 16;

    public function __construct(string $login){ $this->creditional = $login; }

    public function validate() : bool{
        if($this->checkIfShorter(self::maxSize)){
            return false;
        }
        if($this->hasWhitespace()){
            return false;
        }
        return true;
    }

}
