<?php

class User{
    private $id;
    private $login;
    private $email;
    private $password;

    private $role;

    private $city;
    private $age;

    public function __construct(
        string $login,
        string $email,
        string $password,
        string $city = null,
        int $age = null,
        int $id = null
    )
    {
        $this->role = array();
        $this->id = $id;
        $this->login = $login;
        $this->email = $email;
        $this->password = $password;
        $this->city = $city;
        $this->age = $age;
    }

    public function setLogin(string $login){ $this->login = $login; }
    public function setEmail(string $email){ $this->email =  $email; }
    public function setPassword(string $password){ $this->password = $password; }
    public function setCity(string $city){ $this->city = $city; }
    public function setAge(int $age){ $this->age = $age; }
    public function getId() : int { return $this->id; }
    public function getLogin(): string { return $this->login; }
    public function getEmail(): string { return $this->email; }
    public function getPassword(): string { return $this->password; }
    public function getCity(): ?string { return $this->city; }
    public function getAge(): ?int { return $this->age; }
    public function getRole(): array { return $this->role; }
    public function setRole($roles) { $this->role = $roles; }
    public function addRole($role) { array_push($this->role, $role); }

    public function isAdmin() : bool { return in_array("ROLE_ADMIN", $this->role); }
    public function isUser() : bool { return  in_array("ROLE_USER", $this->role); }
    public function isMod() : bool { return  in_array("ROLE_MOD", $this->role); }

    public static function checkIfAdmin($roles) : bool {return in_array("ROLE_ADMIN", $roles, true);}
    public static function checkIfUser($roles) : bool {return in_array("ROLE_USER", $roles, true);}
    public static function checkIfMod($roles) : bool {return in_array("ROLE_MOD", $roles, true);}


}
