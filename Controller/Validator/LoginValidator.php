<?php

require_once 'CreditionalsValidator.php';

class LoginValidator extends CreditionalsValidator
{

    private const maxSize = 16;
    private const minSize = 3;

    public function __construct(string $login){ $this->creditional = $login; }

    public function validate() : bool{
        if($this->checkIfShorter(self::maxSize)){
            return false;
        }
        if($this->hasWhitespace()){
            return false;
        }
        if($this->checkIfLonger(self::minSize)){
            return false;
        }
        return true;
    }

}
