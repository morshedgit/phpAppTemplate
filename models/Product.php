<?php
class Product
{
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

    //Get products
    public function read()
    {
        //create query
        $query = 'SELECT * From ' . $this->table;

        //Prepare
        $stmt = $this->conn->prepare($query);

        $stmt->execute();
        return $stmt;
    }

    //Get single product
    public function read_one()
    {
        //create query
        $query = "SELECT * From " . $this->table . " WHERE id = ".$this->id;

        //Prepare
        $stmt = $this->conn->prepare($query);

        $stmt->execute();
        return $stmt;
    }

    //Create product
    public function create()
    {

        if(empty($this->id)){
            return false;
        }
        //Clean Data
        $this->id = htmlspecialchars(strip_tags($this->id));
        $this->name = htmlspecialchars(strip_tags($this->name));
        $this->width = htmlspecialchars(strip_tags($this->width));
        $this->length = htmlspecialchars(strip_tags($this->length));
        $this->height = htmlspecialchars(strip_tags($this->height));
        $this->location = htmlspecialchars(strip_tags($this->location));

        $query = "INSERT INTO product (id,name,location,width,length,height,weight) VALUES (".$this->id.",'".$this->name."','".$this->location."',".$this->width.",".$this->length.",".$this->height.",".$this->weight.")";
        // $query = "INSERT INTO product (id,name,location,width,length,height,weight) VALUES (1000,'sadeq','home',20,30,40,50)";
        
        printf($query);
        //Prepare
        $stmt = $this->conn->prepare($query);

        //Execute query
        if ($stmt->execute()) {
            return true;
        }

        printf("Error: %s.\n", $stmt->error);
    }
}
