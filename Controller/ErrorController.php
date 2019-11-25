<?php

require_once 'ApplicationController.php';

class ErrorController extends ApplicationController{

    public function showErrorPage(){

        $this->render('errorPage');
    }
}
