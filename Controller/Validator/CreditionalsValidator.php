<?php

require_once 'Validator.php';

abstract class CreditionalsValidator implements Validator {
    protected string $creditional;

    protected function hasWhitespace() : bool {
        $textWithoutSpace = trim($this->creditional);
        return strlen($this->creditional) > strlen($textWithoutSpace);
    }

    protected function checkIfShorter(int $lenght) : bool{
        return $this->creditional<$lenght;
    }
}