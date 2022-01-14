<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");


// Include files
include_once '../config/database.php';
include_once '../objects/product.php';

// Get DB connection
$database = Database::getInstance();
$db = $database->conn;

// Init Product Object
$product = new Product($db);

$data = json_decode(file_get_contents("php://input"));

$product->answer_one   = ($data->answer_one)   ? $data->answer_one   : 0;
$product->answer_two   = ($data->answer_two)   ? $data->answer_two   : 0;
$product->answer_three = ($data->answer_three) ? $data->answer_three : 0;
$product->answer_four  = ($data->answer_four)  ? $data->answer_four  : 0;
$product->answer_five  = ($data->answer_five)  ? $data->answer_five  : 0;

// Request products
$stmt = $product->read();

$num = $stmt->rowCount();

if($num > 0) {
  $products_arr = [];

  $products_arr['products'] = [];

  while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {

    extract($row);

    $product_item = array(
      'id' => $id,
      'name' => $name,
      'description' => $description,
      'price' => $price,
      'category_id' => $category_id,
      'sub_category_id' => $sub_category_id,
    );

    array_push($products_arr["products"], $product_item);

  }

  http_response_code(200);

  echo json_encode($products_arr);

} else {
  http_response_code(200);

  echo json_encode(array("message" => "Products not found"), JSON_UNESCAPED_UNICODE);
}

