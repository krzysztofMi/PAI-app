<?php


class Attraction{

    private $id;
    private $type;
    private $imagePath;
    private $name;
    private $shortDescription;
    private $city;
    private $description;

    public function __construct(string $name, string $imagePath,
                                string $shortDescription, int $id = null,
                                int $city = null, $type = null){
        $this->name = $name;
        $this->imagePath = $imagePath;
        $this->shortDescription = $shortDescription;
        $this->id = $id;
        $this->city = $city;
        $this->type = $type;
    }

    public function getImagePath() : string { return $this->imagePath; }
    public function getName() : string { return $this->name; }
    public function getShortDescription() : string {return $this->shortDescription; }
    public function setImagePath(string $imagePath){ $this->imagePath = $imagePath; }
    public function setName(string $name){ $this->name = $name; }
    public function setShortDescription(string $shortDescription){ $this->shortDescription = $shortDescription; }
}
