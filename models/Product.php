<?php
    class Product {
        //DBstuff
        private $conn;
        private $table = 'product';

        //Post Properties
        public $id;
        public $name;
        public $weight;
        public $length;
        public $width;
        public $height;
        public $location;
        
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
        //Get Posts
        public function create(){
            //create query
            $query = 'INSERT INTO '.$this->table. '
            SET 
                id=:id,
                name= :name,
                locationa= :location,
                width= :width,
                length= :length,
                height= :height,
                weight= "weight,
                ';

            //Prepare
            $stmt = $this->conn->prepare($query);

            //Clean Data
            $this->id = htmlspecialchars(strip_tags($this->id));
            $this->name = htmlspecialchars(strip_tags($this->name));
            $this->width = htmlspecialchars(strip_tags($this->width));
            $this->length = htmlspecialchars(strip_tags($this->length));
            $this->height = htmlspecialchars(strip_tags($this->height));
            $this->location = htmlspecialchars(strip_tags($this->location));

            //Execute query
            if($stmt->execute()){
                return true;
            }

            printf("Error: %s.\n",$stmt->error);
        }

    }