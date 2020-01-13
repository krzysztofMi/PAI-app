<?php

require_once 'ApplicationController.php';

class UserPanelController extends ApplicationController
{
    public function showUserPanel(){
        $this->render("userPanel");
    }
}