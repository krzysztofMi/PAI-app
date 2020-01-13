<?php

require_once 'Controller/IndexController.php';
require_once 'Controller/LoginController.php';
require_once 'Controller/RegistrationController.php';
require_once 'Controller/CityController.php';
require_once 'Controller/AttractionController.php';
require_once 'Controller/AttractionSelectionController.php';
require_once 'Controller/AttractionViewController.php';
require_once 'Controller/ErrorController.php';
require_once 'Controller/CommentController.php';
require_once 'Controller/AddressController.php';
require_once 'Controller/AdminPanelController.php';
require_once 'Controller/UserPanelController.php';
require_once 'Controller/UserController.php';

class FrontController{

    public $routes = [];

    public function __construct(){
        $this->routes = [
            'index' => ['controller' => 'IndexController', 'action' => 'home'],
            'login' => ['controller' => 'LoginController', 'action' => 'login'],
            'logout' => ['controller' => 'LoginController', 'action' => 'logout'],
            'register' => ['controller' => 'RegistrationController', 'action' => 'register'],
            'city' => ['controller' => 'CityController', 'action' => 'showCity'],
            'attraction/type' => ['controller' => 'AttractionController', 'action' => 'showAttractionsType'],
            'attraction/select' => ['controller' => 'AttractionSelectionController', 'action' => 'showAttractions'],
            'attraction/view' => ['controller' => 'AttractionViewController', 'action' => 'showAttraction'],
            'error' => ['controller' => 'ErrorController', 'action' => 'showErrorPage'],
            'comment' => ['controller' => 'CommentController', 'action' => 'add'],
            'deleteComment' => ['controller' => 'CommentController', 'action' => 'delete'],
            'address' => ['controller' => 'AddressController', 'action' => 'get'],
            'attraction' => ['controller' => 'AttractionController', 'action' => 'attraction'],
            'adminPanel' => ['controller' => 'AdminPanelController', 'action' => 'showAdminPanel'],
            'userPanel' => ['controller' => 'UserPanelController', 'action' => 'showUserPanel'],
            'users' => ['controller' => 'UserController', 'action' => 'getAll']
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