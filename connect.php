<?php

$isLive = true;

if($isLive == true){
  // db credentials
  define('DB_HOST', 'localhost');
  define('DB_USER', 'slamdunc_admin');
  define('DB_PASS', 'PHPb0bbins1');
  define('DB_NAME', 'slamdunc_musson_grumble');
}else{
  // db credentials
  define('DB_HOST', 'localhost');
  define('DB_USER', 'root');
  define('DB_PASS', '');
  define('DB_NAME', 'musson_grumble_backend');
}


// connect to database
function connect(){
  $connect = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

  if (mysqli_connect_errno($connect)){
    die('Failed to connect: ' . mysqli_connect_error());
  }

  mysqli_set_charset($connect, 'utf8');

  return $connect;
}

$con = connect();

?>