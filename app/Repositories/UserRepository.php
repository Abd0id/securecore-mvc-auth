<?php

require_once __DIR__ . "/../../config/Database.php";
require_once __DIR__ . "/../Entities/User.php";

class UserRepository
{

    private $conn;


    public function __construct()
    {
        $db = Database::getInstance();
        $this->conn = $db->getConnection();
    }

    public function findAll()
    {

        $query = "SELECT u.id,u.name,u.password_hash psswrd,u.email,r.role
        FROM users u,roles r 
        WHERE u.role_id = r.id AND r.role = 'candidate'";

        try {
            $stmt = $this->conn->prepare($query);
            $stmt->execute();

            $objs = $stmt->fetchAll(PDO::FETCH_OBJ);
            $users = [];
            foreach ($objs as $obj) {
                $user = new User($obj->name, $obj->email, $obj->role);
                $user->setPassword($obj->psswrd);
                $user->setId($obj->id);
                array_push($users, $user);
            }
            return $users;
        } catch (\Throwable $th) {
            echo " user search error " . $th->getMessage();
        }
    }

    public function findByEmail($email)
    {

        $query = "SELECT u.id,u.name,u.password_hash psswrd,u.email,r.role 'role'
        FROM users u,roles r 
        WHERE u.role_id = r.id AND u.email = :email";

        try {
            $stmt = $this->conn->prepare($query);
            $stmt->execute([
                ":email" => $email
            ]);

            $obj = $stmt->fetch(PDO::FETCH_OBJ);

            $user = new User($obj->name, $obj->email, $obj->role);
            $user->setPassword($obj->psswrd);
            $user->setId($obj->id);

            return $user;
        } catch (\Throwable $th) {
            echo " user search error " . $th->getMessage();
        }
    }

    public function findById($id)
    {

        $query = "SELECT u.id,u.name,u.password_hash psswrd,u.email,r.role 'role'
        FROM users u,roles r 
        WHERE u.role_id = r.id AND u.id = :id";

        try {
            $stmt = $this->conn->prepare($query);
            $stmt->execute([
                ":id" => $id
            ]);

            $obj = $stmt->fetch(PDO::FETCH_OBJ);

            $user = new User($obj->name, $obj->email, $obj->role);
            $user->setPassword($obj->psswrd);
            $user->setId($obj->id);

            return $user;
        } catch (\Throwable $th) {
            echo " user search error " . $th->getMessage();
        }
    }

    public function create(User $user)
    {
        try {
            $query = "INSERT INTO roles(role) VALUES(:role)";

            $stmt = $this->conn->prepare($query);
            $stmt->execute([
                ":role" => $user->getRole(),
            ]);

            (int) $role_id = $this->conn->lastInsertId();

            $query = "INSERT INTO users(name,email,password_hash,role_id) VALUES(:name, :email, :password,:role_id)";

            try {
                $stmt = $this->conn->prepare($query);
                $stmt->execute([
                    ":name" => $user->getName(),
                    ":email" => $user->getEmail(),
                    ":password" => $user->getPassword(),
                    ":role_id" => $role_id
                ]);

                (int) $id = $this->conn->lastInsertId();

                if ($id) {
                    $user->setId($id);
                    return $user;
                }
            } catch (\Throwable $th) {
                echo "user creation error" . $th->getMessage();
            }
        } catch (\Throwable $th) {
            //throw $th;
        }
        echo "work";

    }


    public function update(User $user)
    {

        $query = "UPDATE users 
        SET name=:name, email=:email, password_hash=:password
        WHERE id=:id";

        try {
            $stmt = $this->conn->prepare($query);
            $stmt->execute([
                ":id" => $user->getId(),
                ":name" => $user->getName(),
                ":email" => $user->getEmail(),
                ":password" => $user->getPassword(),
            ]);
        } catch (\Throwable $th) {
            echo "User update error";
        }
    }


    public function delete(User $user)
    {

        $query = "DELETE FROM users WHERE id=:id";

        try {
            $stmt = $this->conn->prepare($query);
            $stmt->execute([
                ":id" => $user->getId(),

            ]);
        } catch (\Throwable $th) {
            echo " user delete error";
        }
    }
}
