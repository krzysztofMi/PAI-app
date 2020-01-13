<?php

require_once 'Repository/UserRepository.php';

class InitDatabase{


    public function init()
    {
        $this->addUser();

    }


    private function addUser()
    {
        $userRepository = new UserRepository();
        $user = User::build()->setLogin("admin")
            ->setPassword(password_hash("admin", PASSWORD_BCRYPT))
            ->setEmail('admin@tourismus.pl')->build();
        $user->addRole("ROLE_ADMIN");
        $user->addRole("ROLE_USER");
        $userRepository->saveUser($user);
    }
}