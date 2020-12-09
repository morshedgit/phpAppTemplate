<?php
//Headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Access-Control-Allow-Origin');

include_once '../../config/Database.php';
include_once '../../models/Product.php';

//Instantiate DB and connect
$database = new Database();
$db = $database->connect();

//Instantiate product object
$product = new Product($db);

//Get the raw posted data
$data = json_decode(file_get_contents('php://input'), true);

$product->id = $data->id;
$product->name = $data->name;
$product->width = $data->width;
$product->length = $data->length;
$product->height = $data->height;
$product->weight = $data->weight;
$product->location = $data->location;


//Create Post
if($product->create()){
    echo json_encode(
        // array('message'=>'Product created')
        $product->create()
    );
}else{
    echo json_encode(
        array('message'=>'Product not created')
    );
}