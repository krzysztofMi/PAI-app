<?php

class User{
    private $login;
    private $email;
    private $password;

    private $role = ['ROLE_ADMIN'];

    private $city;
    private $age;

    public function __construct(
        string $login,
        string $email,
        string $password
    )
    {
        $this->login = $login;
        $this->email = $email;
        $this->password = $password;
    }

    public function setLogin(string $login){ $this->login = $login; }
    public function setEmail(string $email){ $this->email =  $email; }
    public function setPassword(string $password){ $this->password = $password; }
    public function setCity(string $city){ $this->city = $city; }
    public function setAge(int $age){ $this->age = $age; }
    public function setRole(string $role){ $this->role[0] = $role; }

    public function getLogin(): string { return $this->login; }
    public function getEmail(): string { return $this->email; }
    public function getPassword(): string { return $this->password; }
    public function getCity(): string { return $this->city; }
    public function getAge(): int { return $this->age; }
    public function getRole(): string { return $this->role[0]; }


}

?>
