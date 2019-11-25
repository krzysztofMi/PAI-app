<?php

require_once 'ApplicationController.php';

class IndexController extends ApplicationController {
    public function home(){
        $this->render('index');
    }

}
