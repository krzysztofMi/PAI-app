<?php

require_once 'ApplicationController.php';
require_once 'Repository/GradeRepository.php';

class GradeController extends ApplicationController {

    private $gradeRepository;

    public function __construct(){
        parent::__construct();
        $this->gradeRepository = new GradeRepository();
    }

    public function giveGrade(){
    }
}