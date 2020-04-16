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
  $fName = $request->first_name;
  $lName = $request->last_name;
  $email = $request->email;

  // update 
$sql = "UPDATE `students` SET `fName`='$fName', `lName`='$lName', `email`='$email' WHERE `sId` = '{$id}' LIMIT 1";

if(mysqli_query($con, $sql))
  {
    http_response_code(204);
  }
  else{
    http_response_code(422);
  }
}