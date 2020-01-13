<?php

require_once "Repository/AddressRepository.php";

class AddressController extends ApplicationController {

    private $addressRepository;

    public function __construct()
    {
        parent::__construct();
        $this->addressRepository = new AddressRepository();
    }

    public function get(){
        header("Content-type: application-json");
        http_response_code(200);
        $id = $_GET['id'];
        echo  $this->addressRepository->getAddressById($id) ?
            json_encode($this->addressRepository->getAddressById($id)) : "";
    }
}