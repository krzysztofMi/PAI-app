<?php


class City{
    private $id;
    private $name;
    private $description;

    public function __construct(string $name, string $description, int $id = null){
        $this->name = $name;
        $this->description = $description;

        $this->id = $id;
    }

    public function getId(): int{ return $this->id; }
    public function getName() : string { return $this->name; }
    public function setName(string $name) { $this->name = $name; }
    public function getDescription(): string{ return $this->description; }
    public function setDescription(string $description){ $this->description = $description; }
}