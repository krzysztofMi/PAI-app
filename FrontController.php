<?php

require_once 'Controller/IndexController.php';
require_once 'Controller/LoginController.php';
require_once 'Controller/RegistrationController.php';
require_once 'Controller/CityController.php';

class FrontController{

    public $routes = [];

    public function __construct(){
        $this->routes = [
            'index' => ['controller' => 'IndexController', 'action' => 'home'],
            'login' => ['controller' => 'LoginController', 'action' => 'login'],
            'register' => ['controller' => 'RegistrationController', 'action' => 'register'],
            'city' => ['controller' => 'CityController', 'action' => 'showCity']
        ];
    }

    public function run(){
        $page = isset($_GET['page']) ? $_GET['page'] : 'index';
        if(isset($this->routes[$page])){
            $controller = $this->routes[$page]['controller'];
            $action = $this->routes[$page]['action'];
            $object = new $controller;
            $object->$action();
        }
    }
}

?>