<?php

class User {

    private $id;
    private $name;
    private $email;
    private $password;
    private $role;
    private const ADMIN = 'admin';
    private const USER = 'user';

    public function __construct($name, $email, $role)
    {
        $this->name = $name;
        $this->email = $email;
        $this->role = $role;
    }

    public function getId(){return $this->id;}
    public function getName(){return $this->name;}
    public function getEmail(){return $this->email;}
    public function getPassword(){return $this->password;}
    public function getRole(){return $this->role;}

    public function setId($id){$this->id = $id;}
    public function setName($name){$this->name = $name;}
    public function setEmail($email){$this->email = $email;}
    public function setPassword($password){$this->password = $password;}
    public function setRole($role){$this->role = $role;}

}