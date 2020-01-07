<?php

require_once 'ApplicationController.php';
require_once 'Model/Attraction.php';
require_once 'Model/Dto/AttractionDto.php';
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
        $attractions = AttractionDto::fromArray($attractions);
        $this->render("attractionSelect", ['attractions' => $attractions]);
    }

    public function attraction(){
        header("Content-type: application-json");
        http_response_code(200);
        $id = $_GET['id'];
        echo $this->attractionRepository->getAttractionById($id) ?
                json_encode($this->attractionRepository->getAttractionById($id)) : "";
    }
}
