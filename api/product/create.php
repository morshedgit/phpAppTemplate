<?php
//Headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: post');

include_once '../../config/Database.php';
include_once '../../models/Product.php';

//Instantiate DB and connect
$database = new Database();
$db = $database->connect();

//Instantiate product object
$product = new Product($db);

$data = json_decode(file_get_contents('php://input'), true);

echo $data['location']

//Product Query
// $result = $product->create($data);
// //Get row count

// // echo json_encode(
// //     $data
// // );
// $num = $result->rowCount();

// if($num >0 ){
//     $products_arr = array();
//     $products_arr['data'] = array();

//     while($row = $result->fetch(PDO::FETCH_ASSOC)){
//         extract($row);

//         $product_item = array(
//             'id'=>$id,
//             'name'=>$name
//         );

//         array_push($products_arr['data'],$product_item);
//     }

//     echo json_encode($products_arr);
// }else{

//     echo json_encode(
//         array('message'=>'No product found')
//     );

// }