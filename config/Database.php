<?php
    class Database {
        //DB Params
        private $host = '';
        private $db_name = '';
        private $username = '';
        private $password = '';
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