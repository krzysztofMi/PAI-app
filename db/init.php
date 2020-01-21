<?php

require_once 'Repository/UserRepository.php';

class InitDatabase{

    public function init()
    {
        if(!$this->checkIfTableEmpty()) return;
        $this->addUser();
    }

    private function addUser()
    {
        $userRepository = new UserRepository();
        $user = User::build()->setLogin("admin")
            ->setPassword(password_hash("admin", PASSWORD_BCRYPT))
            ->setEmail('admin@tourismus.pl')
            ->addRole("ROLE_USER")
            ->addRole("ROLE_ADMIN")
            ->build();
        $userRepository->saveUser($user);

        $user = User::build()->setLogin("ania")
            ->setPassword(password_hash("ania", PASSWORD_BCRYPT))
            ->setEmail("ania@gmail.com")->addRole("ROLE_USER")->build();
        $userRepository->saveUser($user);
    }

    private function checkIfTableEmpty() : bool {
        $database = new Database();
        $stmt = $database->connect()->prepare("
            SELECT COUNT(*) FROM tourismus_user
        ");
        $stmt->execute();

        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        if($result['count'] === 0){
            return true;
        }
        return false;
    }
}