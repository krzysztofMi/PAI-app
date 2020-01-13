<?php

class User{
    private $id;
    private $login;
    private $email;
    private $password;

    private $role;

    private $city;
    private $age;

    public function __construct(){

    }

    public static function createUser(
        string $login,
        string $email,
        string $password = null,
        string $city = null,
        int $age = null,
        int $id = null
    ) : User
    {
        $instance = new User();
        $instance->role = array();
        $instance->id = $id;
        $instance->login = $login;
        $instance->email = $email;
        $instance->password = $password;
        $instance->city = $city;
        $instance->age = $age;
        return $instance;
    }

    public function setId(int $id) {$this->id = $id; }
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

    public static function checkIfAdmin($roles) : bool {
        if($roles == null) return false;
        return in_array("ROLE_ADMIN", $roles, true);
    }
    public static function checkIfUser($roles) : bool {
        if($roles == null) return false;
        return in_array("ROLE_USER", $roles, true);
    }
    public static function checkIfMod($roles) : bool {
        if($roles == null) return false;
        return in_array("ROLE_MOD", $roles, true);
    }

    public static function build(){
        return new UserBuilder();
    }
}

class UserBuilder{
    private $user;

    public function __construct()
    {
        $this->user = new User();
        $this->user->setRole(array());
    }

    public function setId(int $id) : UserBuilder { $this->user->setId($id); return $this; }
    public function setLogin(string $login) : UserBuilder{ $this->user->setLogin($login); return $this; }
    public function setEmail(string $email) : UserBuilder{ $this->user->setEmail($email); return $this; }
    public function setPassword(string $password) : UserBuilder{ $this->user->setPassword($password); return $this;}
    public function setCity(string $city) : UserBuilder{ $this->user->setCity($city); return $this; }
    public function setAge(int $age) : UserBuilder{ $this->user->setAge($age); return $this; }
    public function addRole(string $role) : UserBuilder { $this->user->addRole($role); return $this; }
    public function build() : User {
        return $this->user;
    }
}
