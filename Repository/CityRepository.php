<?php

require_once 'Repository.php';
require_once 'Model/City.php';

class CityRepository extends Repository {

    public function getAllCities() : array {
        try {
            $stmt = $this->database->connect()->prepare(
                'SELECT * FROM city'
            );
            $stmt->execute();
            $cities = $stmt->fetchAll(PDO::FETCH_ASSOC);

            foreach ($cities as $city){
                $result[] = new City(
                    $city['name'],
                    $city['description'],
                    $city['id']
                );
            }
            return $result;
        }catch (Exception $e){
            error_log($e->getMessage());
            $url = "http://$_SERVER[HTTP_HOST]/";
            header("Location: {$url}?page=error&errorCode=500");
        }
    }
}