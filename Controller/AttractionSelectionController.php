<?php

require_once 'ApplicationController.php';
require_once 'Model/Attraction.php';
require_once 'Repository/AttractionRepository.php';

class AttractionSelectionController extends ApplicationController{

    private $attractionRepository;

    public function __construct(){
        parent::__construct();
        $this->attractionRepository = new AttractionRepository();
    }

    public function showAttractions(){
        switch ($_GET['type']){
            case 'monument':
                $attractions = $this->attractionRepository->getAllAttractionInCity(
                    $_SESSION['city']->getId(), "MONUMENT");
                break;
            case 'hotel':
                $attractions = $this->attractionRepository->getAllAttractionInCity(
                    $_SESSION['city']->getId(), "HOTEL");
                break;
            case 'restaurant':
                $attractions = $this->attractionRepository->getAllAttractionInCity(
                    $_SESSION['city']->getId(), "RESTAURANT");
                break;
            }
        $this->render("attractionSelect", ['attractions' => $attractions]);
    }
}
