<?php

require_once 'Repository.php';
require_once 'CityRepository.php';
require_once 'Model/Address.php';

class AddressRepository extends Repository
{

    private $cityRepository;

    public function __construct(){
        parent::__construct();
        $this->cityRepository = new CityRepository();
    }


    public function getAddressById($id) : ?Address{
        $stmt = $this->database->connect()->prepare(
            "SELECT * FROM address WHERE id = :id"
        );
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        $address = $stmt->fetch(PDO::FETCH_ASSOC);

        if($address == null) return null;

        return new Address(
                $address['id'],
                $this->cityRepository->getCityById($address['id']),
                $address['street'],
                $address['postal_code']
        );
    }

}