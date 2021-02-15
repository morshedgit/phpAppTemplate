<?php
class Database
{
    //DB Params
    private $host = 'getenv("HOST")';
    private $db_name = 'getenv("DB_NAME")';
    private $username = 'getenv("DB_USERNAME")';
    private $password = 'getenv("DB_PASSWORD")';
    private $conn;

    public function __construct()
    {
        $this->host = getenv("HOST");
        $this->db_name = getenv("DB_NAME");
        $this->username = getenv("DB_USERNAME");
        $this->password = getenv("DB_PASSWORD");
    }

    //DB Connect
    public function connect()
    {
        $this->conn = null;
        $this->conn = new PDO('mysql:host=' . $this->host . ';dbname=' . $this->db_name, $this->username, $this->password);
        $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        try {
        } catch (PDOException $e) {
            echo 'Connection Error: ' . $e->getMessage();
        }

        return $this->conn;
    }
}
