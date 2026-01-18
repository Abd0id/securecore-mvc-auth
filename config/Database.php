<?php

class Database
{

    private $host = "localhost";
    private $dbName = "securecore_auth_mvc";
    private $user = "root";
    private $password = "root";

    private static $instance = null;

    private $connection;

    private function __construct()
    {
        try {
            $this->connection = new PDO("mysql:host=$this->host;dbname=$this->dbName;",$this->user,$this->password);
        } catch (Throwable $ex) {
            echo 'database erreur'.$ex->getMessage();
        }
    }

        public static function getInstance()
    {
        if (self::$instance === null) {
            self::$instance = new Database();
        }

        return self::$instance;
    }

    public function getConnection()
    {
        return $this->connection;
    }

    public function __clone()
    {
        throw new Exception("Can't clone a singleton");
    }
}