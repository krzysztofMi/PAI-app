<?php

require_once 'ApplicationController.php';
require_once 'Repository/AttractionRepository.php';

class AttractionController extends ApplicationController
{

    private $attractionRepository;


    public function __construct(){
        parent::__construct();
        $this->attractionRepository = new AttractionRepository();
    }

    public function showAttractionsType(){
        $this->render("attraction");
    }

    public function attraction(){
        if(!isset($_GET['id'])){
            $url = "http://$_SERVER[HTTP_HOST]/";
            header("Location: {$url}?page=error&errorCode=404");
            return;
        }
        header("Content-type: application-json");
        http_response_code(200);
        $id = $_GET['id'];
        echo $this->attractionRepository->getAttractionById($id) ?
            json_encode($this->attractionRepository->getAttractionById($id)) : "";
    }
}
