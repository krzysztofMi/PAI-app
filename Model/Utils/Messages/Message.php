<?php

class Message{

    protected $text;
    protected $type;

    public function __construct(string $text){
        $this->text = $text;
        $this->type = "message";
    }

    public function getType() : string {return $this->type; }
    public function getText() : string {return $this->text; }
    public function getMessage() : array { return [$this->type => $this->text]; }

}
?>