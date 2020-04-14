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
  $fName = $request->first_name;
  $lName = $request->last_name;
  $email = $request->email;

  // store 
  $sql = "INSERT INTO `students`(
    `fName`,
    `lName`,
    `email`
  ) VALUES (
    '{$fName}',
    '{$lName}',
    '{$email}'
  )";

  if(mysqli_query($con, $sql))
  {
    http_response_code(201);
  }
  else{
    http_response_code(422);
  }

}