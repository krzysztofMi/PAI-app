<?php

require_once 'ApplicationController.php';

class AdminPanelController extends ApplicationController
{
    public function showAdminPanel(){
        $this->render("adminPanel");
    }
}