<?php


class AttractionDto{

    public function __construct(Attraction $attraction){
        $this->attractionId = $attraction->getId();
        $this->name = $attraction->getName();
        $this->imagePath = $attraction->getImagePath();
    }

    public function getName() : string { return $this->name; }
    public function getImagePath() : string { return $this->imagePath; }
    public function getId() : int { return $this->attractionId; }

    public static function from(Attraction $attraction) : AttractionDto{
        return new AttractionDto($attraction);
    }

    public static function fromArray(array $attractions) : array{
        $attractionsDto = array();
        foreach ($attractions as $attraction){
            array_push($attractionsDto, AttractionDto::from($attraction));
        }
        return $attractionsDto;
    }

}

?>