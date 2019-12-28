<?php


class Attraction{

    private $image;
    private $name;
    private $description;
    private $city;

    public function __construct(string $image, string $name, string $description){
        $this->image = $image;
        $this->name = $name;
        $this->description = $description;
    }

    public function getImage() : string { return $this->image; }
    public function getName() : string { return $this->name; }
    public function getDescription() : string {return $this->description; }
    public function setImage(string $image){ $this->image = $image; }
    public function setName(string $name){ $this->name = $name; }
    public function setDescription(string $description){ $this->description = $description; }
}
