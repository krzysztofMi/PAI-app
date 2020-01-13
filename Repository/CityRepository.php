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

    public function getCityById($id) : ?City {
        try {
            $stmt = $this->database->connect()->prepare(
                'SELECT * FROM city WHERE id = :id'
            );
            $stmt->bindParam(":id", $id);
            $stmt->execute();
            $city = $stmt->fetch(PDO::FETCH_ASSOC);

            if($city == null) return null;

            return new City($city['name'], $city['description'], $city['id']);
        }catch (Exception $e){
            error_log($e->getMessage());
            $url = "http://$_SERVER[HTTP_HOST]/";
            header("Location: {$url}?page=error&errorCode=500");
        }
    }
}