<?php

require 'connect.php';

// Headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: *');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');


error_reporting(E_ERROR);

$id=$_GET['id'];
$recipes = [];

// $sql = "SELECT * FROM recipes";
// $sql = "SELECT * FROM recipes WHERE id = '{$id}'";
// $sql = "SELECT recipes.id as id, recipes.name as name, recipes.category_id as c_id, recipes.description as description, recipes.ingredients as ingredients, recipes.instructions as instructions, recipes.suggestions as suggestions, categories.name as c_name FROM recipes, categories WHERE recipes.id = '{$id}'";
// $sql = "SELECT recipes.id as id, recipes.name as name, recipes.category_id as c_id, recipes.description as description, recipes.ingredients as ingredients, recipes.instructions as instructions, recipes.suggestions as suggestions, categories.name as c_name FROM recipes, categories WHERE recipes.category_id = categories.id AND categories.id ='{$id}' ORDER BY categories.name ASC";
$sql = "SELECT recipes.id as id, recipes.name as name, recipes.sub_title as sub_title ,recipes.category_id as c_id, recipes.description as description, recipes.ingredients as ingredients, recipes.instructions as instructions, recipes.suggestions as suggestions, categories.name as c_name FROM recipes, categories WHERE recipes.category_id = categories.id AND recipes.id ='{$id}' ORDER BY categories.name ASC"; 


if($result = mysqli_query($con, $sql))
{
  $cr = 0;
  while($row = mysqli_fetch_assoc($result))
  {
    $recipes[$cr]['id'] = $row['id'];
    $recipes[$cr]['name'] = $row['name'];
    $recipes[$cr]['sub_title'] = $row['sub_title'];
    $recipes[$cr]['c_id'] = $row['c_id'];
    $recipes[$cr]['c_name'] = $row['c_name'];
    $recipes[$cr]['description'] = $row['description'];
    $recipes[$cr]['ingredients'] = $row['ingredients'];
    $recipes[$cr]['instructions'] = $row['instructions'];
    $recipes[$cr]['suggestions'] = $row['suggestions'];
    $cr++;
  }

  // print_r($recipes);

  echo json_encode($recipes);
}
else 
{
  http_response_code(404);
}