<?php

require_once 'Repository.php';
require_once 'Model/Attraction.php';

class AttractionRepository extends Repository{

    public function getAllAttractionInCity(int $cityId, string $attractionType) : ?array{
        $stmt = $this->database->connect()->prepare(
            "SELECT add.id AS add_id, atr.id AS atr_id, atr.name, atr.imagepath, atr.short_description from attraction atr, address add
                       WHERE atr.address_id = add.id and add.city = :cityId and atr.type = :attractionType;"
        );
        $stmt->bindParam(':cityId', $cityId);
        $stmt->bindParam(':attractionType', $attractionType);
        $stmt->execute();
        $attractions =  $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach ($attractions as $attraction){
            $result[] = new Attraction(
                $attraction['name'],
                $attraction['imagepath'],
                $attraction['short_description'],
                $attraction['atr_id'],
                $attraction['add_id']
            );
        }
        return isset($result) ? $result : array();
    }

   public function getAttractionById(int $attractionId){
       $stmt = $this->database->connect()->prepare(
           "SELECT * from attraction atr
                       WHERE id = :id;"
       );
       $stmt->bindParam(':id', $attractionId);
       $stmt->execute();
       $attraction =  $stmt->fetch(PDO::FETCH_ASSOC);

       return $attraction;
   }

}