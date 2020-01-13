<?php

require_once 'Repository/UserRepository.php';

class UserController
{

    private $userRepository;

    public function __construct()
    {
        $this->userRepository = new UserRepository();
    }

    public function getAll(){
        header("Content-type: application-json");
        http_response_code(200);

        echo json_encode($this->userRepository->getAllUsersWithRole());
    }
}