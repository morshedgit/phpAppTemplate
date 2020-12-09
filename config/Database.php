<?php
    class Database {
        //DB Params
        private $host = 'us-cdbr-east-02.cleardb.com';
        private $db_name = 'heroku_ecbceff60760a98';
        private $username = 'bf3778cfcc1441';
        private $password = 'c1ab19fe';
        private $conn;

        //DB Connect
        public function connect(){
            $this->conn = null;
            $this->conn = new PDO('mysql:host='.$this->host.';dbname='.$this->db_name,$this->username,$this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            try{

            }catch(PDOException $e){
                echo 'Connection Error: '.$e->getMessage();
            }

            return $this->conn;
        }

    }