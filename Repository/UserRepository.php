<?php

require_once 'Repository.php';
require_once 'Model/User.php';

class UserRepository extends Repository {

    public function saveUser(User $user){
        try {
            $this->beginTransaction();
            $stmt = $this->database->connect()->prepare(
                "INSERT INTO tourismus_user (login, email, password)
                VALUES(:login, :email, :password);"
            );
            $stmt->bindValue(':login', $user->getLogin(), PDO::PARAM_STR);
            $stmt->bindValue(':email', $user->getEmail(), PDO::PARAM_STR);
            $stmt->bindValue(':password', $user->getPassword(), PDO::PARAM_STR);
            $stmt->execute();
            $this->saveRole($user->getLogin(), $user->getRole());
            $this->commit();
        }catch (Exception $e){
            $this->rollback();
            error_log($e->getMessage());
            $url = "http://$_SERVER[HTTP_HOST]/";
            header("Location: {$url}?page=error&errorCode=500");
        }
    }

    public function getUserByEmail($email): ?User{
        try{
            $stmt = $this->database->connect()->prepare(
                'SELECT * FROM tourismus_user WHERE  email = :email'
            );
            $stmt->bindParam(':email', $email, PDO::PARAM_STR);
            return $this->getUser($stmt);
        }catch (Exception $e){
            error_log($e->getMessage());
            $url = "http://$_SERVER[HTTP_HOST]/";
            header("Location: {$url}?page=error&errorCode=500");
        }
    }

    public function getUserById(int $id) : ?User{
        try {
            $stmt = $this->database->connect()->prepare(
                'SELECT * FROM tourismus_user WHERE  id = :id'
            );
            $stmt->bindParam(':id', $id, PDO::PARAM_STR);
            return $this->getUser($stmt);
        }catch (Exception $e){
            error_log($e->getMessage());
            $url = "http://$_SERVER[HTTP_HOST]/";
            header("Location: {$url}?page=error&errorCode=500");
        }

    }

    public function getUserByLogin($login): ?User{
        try{
            $stmt = $this->database->connect()->prepare(
                'SELECT * FROM tourismus_user WHERE login = :login');
            $stmt->bindParam(':login', $login, PDO::PARAM_STR);
            return $this->getUser($stmt);
        }catch (Exception $e){
            error_log($e->getMessage());
            $url = "http://$_SERVER[HTTP_HOST]/";
            header("Location: {$url}?page=error&errorCode=500");
        }
    }

    private function getUser($stmt) : ?User{
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if($user == false)  return null;
        $user = User::createUser(
            $user['login'],
            $user['email'],
            $user['password'],
            $user['city'],
            $user['age'],
            $user['id']);

        return $this->getRoles($user);
    }

    public function getAllUsersWithRole() : array{
        $stmt = $this->database->connect()->prepare(
            'SELECT * FROM user_with_role'
        );
        $stmt->execute();
        $users = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $users;
    }

    private function getRoles(User $user): ?User{
        $stmt = $this->database->connect()->prepare(
            "SELECT r.role FROM role r, tourismus_user u, user_role ur
                       WHERE r.id = ur.role_id and u.id = ur.user_id and u.id = :id"
        );
        $stmt->bindValue(":id", $user->getId());
        $stmt->execute();
        $roles = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach ($roles as $role){
            $user->addRole($role["role"]);
        }
        return $user;
    }

    private function saveRole($login ,array $roles){
        foreach($roles as $role){
            $stmt = $this->database->connect()->prepare(
                "INSERT INTO user_role (user_id, role_id)
                     SELECT u.id, r.id FROM tourismus_user u, role r
                     WHERE u.login = :login and r.role = :role;"
            );
            $stmt->bindValue(':login', $login, PDO::PARAM_STR);
            $stmt->bindValue(':role', $role, PDO::PARAM_STR);
            $stmt->execute();
        }
    }
}

?>





