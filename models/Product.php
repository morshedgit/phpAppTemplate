<?php
    class Product {
        //DBstuff
        private $conn;
        private $table = 'product';

        //Post Properties
        public $id;
        public $name;
        public $category_name;
        public $title;
        
        // Constructor with DB
        public function __construct($db)
        {
            $this->conn = $db;
        }

        //Get Posts
        public function read(){
            //create query
            $query = 'SELECT * From '.$this->table;

            //Prepare

            $stmt = $this->conn->prepare($query);

            $stmt->execute();
            return $stmt;
        }

    }