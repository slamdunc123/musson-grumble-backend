<?php

require 'connect.php';

// Headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: GET');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');


$id=$_GET['id'];

$sql = "SELECT * FROM `students` WHERE `sId` = '{$id}' LIMIT 1";

$result = mysqli_query($con, $sql);
$row = mysqli_fetch_assoc($result);

// print_r($row);

echo $json = json_encode($row);
//echo json_encode(['data=>$json]);