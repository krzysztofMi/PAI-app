<?php
require_once 'FrontController.php';
require_once 'Model/User.php';
$frontController = new FrontController();

$object = new User("tomek", "email", "123");

$frontController->run();

?>