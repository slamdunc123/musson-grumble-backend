<?php

// Headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: PUT');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');


require 'connect.php';

$postdata = file_get_contents("php://input");
// print_r($postdata);
if(isset($postdata) && !empty($postdata))
{
  // extrat data from $postdata
  $request = json_decode($postdata);

  // print_r($request);

  // sanitise
  $id = $_GET['id'];
  // $id = $request->id;
  $name = $request->name;
  $categoryId = $request->categoryId;
  $description = $request->description;
  $ingredients = $request->ingredients;
  $instructions = $request->instructions;
  $suggestions = $request->suggestions;

  // update 
$sql = "UPDATE `recipes` SET `name`='$name', `category_id`='$categoryId', `description`='$description', `ingredients`='$ingredients', `instructions`='$instructions', `suggestions`='$suggestions' WHERE `id` = '{$id}' LIMIT 1";

if(mysqli_query($con, $sql))
  {
    http_response_code(200);
  }
  else{
    http_response_code(422);
  }
}