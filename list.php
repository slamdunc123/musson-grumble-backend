<?php

require 'connect.php';

// Headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');


error_reporting(E_ERROR);

$students = [];

$sql = "SELECT * FROM students";

if($result = mysqli_query($con, $sql))
{
  $cr = 0;
  while($row = mysqli_fetch_assoc($result))
  {
    $students[$cr]['sId'] = $row['sId'];
    $students[$cr]['fName'] = $row['fName'];
    $students[$cr]['lName'] = $row['lName'];
    $students[$cr]['email'] = $row['email'];
    $cr++;
  }

  // print_r($students);

  echo json_encode($students);
}
else 
{
  http_response_code(404);
}