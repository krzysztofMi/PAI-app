<?php

require_once 'Repository/CityRepository.php';

class CityController extends ApplicationController {

    private $cityRepository;

    public function __construct(){
        parent::__construct();
        $this->cityRepository = new CityRepository();
    }

    public function showCity(){
        $cities = $this->cityRepository->getAllCities();
        $this->render("city", ['cities' =>$cities]);
    }
}
