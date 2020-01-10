<?php

require_once 'Repository/AttractionRepository.php';
require_once 'Repository/CommentRepository.php';

class AttractionViewController extends ApplicationController {

    private $attractionRepository;
    private $commentRepository;

    public function __construct(){
        parent::__construct();
        $this->attractionRepository = new AttractionRepository();
        $this->commentRepository = new CommentRepository();
    }

    public function showAttraction(){
        if(!isset($_POST['aId'])){
            $url = "http://$_SERVER[HTTP_HOST]/";
            header("Location: {$url}?page=error&errorCode=404");
        }
        $attraction = $this->attractionRepository->getAttractionById($_POST['aId']);
        $comments = $this->commentRepository->getAllCommentFromAttraction($_POST['aId']);
        $this->render('attractionView', ['attraction' => $attraction, 'comments' => $comments]);
    }

}
