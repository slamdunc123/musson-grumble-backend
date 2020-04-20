<?php

require 'connect.php';

// Headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');


error_reporting(E_ERROR);

$categories = [];

// $sql = "SELECT * FROM categories";
$sql = "SELECT * FROM `categories`";

if($result = mysqli_query($con, $sql))
{
  $cr = 0;
  while($row = mysqli_fetch_assoc($result))
  {
    $categories[$cr]['id'] = $row['id'];
    $categories[$cr]['name'] = $row['name'];
    $categories[$cr]['description'] = $row['description'];
    $cr++;
  }

  // print_r($categories);

  echo json_encode($categories);
}
else 
{
  http_response_code(404);
}