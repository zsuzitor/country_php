<?php
require_once("/view/list_country.php");
require_once("/model/country.php");
require_once("/model/validation.php");
require_once("/view/partial/one_country_for_list_view.php");


$arr_valid = array("name" =>  $_POST['name'], 
"number_of_cities" =>  $_POST['number_of_cities'], 
"population" =>  $_POST['population'], 
"monarchy" =>  $_POST['monarchy']);


$connect=mysqli_connect("localhost","root","","bd_inter_v");

if(!isset($connect)){
	echo "false";
	return;	
}
//проверяем входные данные
ValidationInputArray($arr_valid,$connect);

//проверяем данные для конкретного класса
$obj=Country::ValidationArray($arr_valid);
if(is_null($obj)){
	echo "false";
	return;
}
//работа с бд
$sql_code_string="INSERT INTO countries  (name, number_of_cities,population,monarchy)".
" VALUES ('".$obj->name."','".$obj->number_of_cities."','".$obj->population."','". $obj->monarchy ."')";
$result=mysqli_query($connect,$sql_code_string);
if(!$result){
	echo "false";
	return;
 }

$obj->id=mysqli_insert_id($connect);
 mysqli_close($connect);
 One_country_for_list_view_Render($obj);
 

?>