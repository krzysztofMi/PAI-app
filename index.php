<?php
require_once 'FrontController.php';
require_once 'Model/User.php';
require_once 'db/init.php';

//$initDatabase = new InitDatabase();
//$initDatabase->init();
$frontController = new FrontController();
$frontController->run();

?>