<?php

require_once 'Validator.php';

abstract class CreditionalsValidator implements Validator {
    protected string $creditional;

    protected function hasWhitespace() : bool {
        $textWithoutSpace = trim($this->creditional);
        return strlen($this->creditional) > strlen($textWithoutSpace);
    }

    protected function checkIfShorter(int $length) : bool{
        return $this->creditional<$length;
    }

    protected function checkIfLonger(int $length) : bool{
        return $this->creditional>$length;
    }
}