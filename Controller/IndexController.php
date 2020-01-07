<?php

require_once 'ApplicationController.php';

class IndexController extends ApplicationController {
    public function home(){
        if(isset($_SESSION["id"])){
            $url = "http://$_SERVER[HTTP_HOST]/";
            header("Location: {$url}?page=city");
        }
        $this->render('index');
    }
}
