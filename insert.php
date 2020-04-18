<?php

require 'connect.php';

// Headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');


$postdata = file_get_contents("php://input");
if(isset($postdata) && !empty($postdata))
{
  $request = json_decode($postdata);

  print_r($request);

  // sanitise
  $name = $request->name;
  $category_id = $request->categoryId;
  $description = $request->description;
  $ingredients = $request->ingredients;
  $instructions = $request->instructions;
  $suggestions = $request->suggestions;

  // store 
  $sql = "INSERT INTO `recipes`(
    `name`,
    `category_id`,
    `description`,
    `ingredients`,
    `instructions`,
    `suggestions`
  ) VALUES (
    '{$name}',
    '{$category_id}',
    '{$description}',
    '{$ingredients}',
    '{$instructions}',
    '{$suggestions}'
  )";

  if(mysqli_query($con, $sql))
  {
    http_response_code(201);
  }
  else{
    http_response_code(422);
  }

}