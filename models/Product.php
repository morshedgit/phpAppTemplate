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

    //Get Posts
    public function read()
    {
        //create query
        $query = 'SELECT * From ' . $this->table;

        //Prepare
        $stmt = $this->conn->prepare($query);

        $stmt->execute();
        return $stmt;
    }
    //Get Posts
    public function create()
    {


        //Clean Data
        $this->id = htmlspecialchars(strip_tags($this->id));
        $this->name = htmlspecialchars(strip_tags($this->name));
        $this->width = htmlspecialchars(strip_tags($this->width));
        $this->length = htmlspecialchars(strip_tags($this->length));
        $this->height = htmlspecialchars(strip_tags($this->height));
        $this->location = htmlspecialchars(strip_tags($this->location));

        //create query
        $query = 'INSERT INTO ' . $this->table . '
            SET 
                id='.$this->id.',
                name= '.$this->name.',
                location= '.$this->location.',
                width= '.$this->width.',
                length= '.$this->length.',
                height= '.$this->height.',
                weight= '.$this->weight.',
                ';

        //Prepare
        $stmt = $this->conn->prepare($query);

        //Bind data
        // $stmt->bindParams(':name', $this->name);
        // $stmt->bindParams(':id', $this->id);
        // $stmt->bindParams(':location', $this->location);
        // $stmt->bindParams(':width', $this->width);
        // $stmt->bindParams(':height', $this->height);
        // $stmt->bindParams(':length', $this->length);
        // $stmt->bindParams(':weight', $this->weight);

        //Execute query
        if ($stmt->execute()) {
            return true;
        }

        printf("Error: %s.\n", $stmt->error);
    }
}
