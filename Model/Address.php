<?php


class Address implements JsonSerializable
{
    private $id;
    private $city;
    private $street;
    private $postcalCode;

    public function __construct(int $id, City $city, string $street = null, string $number = null)
    {
       $this->id = $id;
       $this->city = $city;
       $this->street = $street;
       $this->postcalCode = $number;
    }

    public function getCity(): City { return $this->city; }
    public function getId() : int { return $this->id;}
    public function getPostcalCode() : string { return $this->postcalCode;}
    public function getStreet() : string { return $this->street; }


    public function jsonSerialize()
    {
        return [
            'id' => $this->id,
            'city' => $this->city,
            'street' => $this->street,
            'number' => $this->postcalCode
        ];
    }
}
