<?php

require 'connect.php';

// Headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');


$id=$_GET['id'];

echo $sql = "DELETE FROM `recipes` WHERE `id` = '{$id}' LIMIT 1";

if(mysqli_query($con, $sql))
{
  http_response_code(200);
}
else
{
  http_response_code(422);
}