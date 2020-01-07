<?php

require_once 'Repository/AttractionRepository.php';

class AttractionViewController extends ApplicationController {

    private $attractionRepository;

    public function __construct(){
        parent::__construct();
        $this->attractionRepository = new AttractionRepository();
    }

    public function showAttraction(){
        if(isset($_POST['aId'])){
            $attraction = $this->attractionRepository->getAttractionById($_POST['aId']);
            $this->render('attractionView', ['attraction' => $attraction]);
        }
        $this->render('attractionView');
    }
}
