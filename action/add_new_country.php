<?php
require_once("/view/list_country.php");
require_once("/model/country.php");
require_once("/model/validation.php");
require_once("/view/partial/one_country_for_list_view.php");
require_once("/action/index.php");
require_once("/model/database.php");



 
 
 function add_new_country(){
	$arr_valid = array("name" =>  $_POST['name'], 
	"number_of_cities" =>  $_POST['number_of_cities'], 
	"population" =>  $_POST['population'], 
	"monarchy" =>  isset($_POST['monarchy'])?$_POST['monarchy']:0);

	$not_js_post=0;
	if(isset($_POST["not_js_form"])){
		$not_js_post=1;
	}

	$connect=connect_countries_db();

	if(ret_bad_response_new_country(!isset($connect),$not_js_post))
		return;
	

//проверяем входные данные
	ValidationInputArray($arr_valid,$connect);

//проверяем данные для конкретного класса
	$obj=Country::ValidationArray($arr_valid);

	if(ret_bad_response_new_country(is_null($obj),$not_js_post))
		return;
	

//работа с бд
	$sql_code_string="INSERT INTO countries  (name, number_of_cities,population,monarchy)".
	" VALUES ('".$obj->name."','".$obj->number_of_cities."','".$obj->population."','". $obj->monarchy ."')";
	$result=do_query_db($connect,$sql_code_string);

	if(ret_bad_response_new_country(!$result,$not_js_post))
		return;


	$obj->id=mysqli_insert_id($connect);
	close_db($connect);
 
	if($not_js_post===1){
		index_action();
		return;
	}
	
	One_country_for_list_view_Render($obj);
 
	 
 }
 
 
 
 //true- надо прекратить выволнение, false-все хорошо 
 function ret_bad_response_new_country($flag,$post_flag){
	if($flag){
		if($post_flag===1){
			index_action();
			return true;
			
		}
		echo "false";
		return true;
		
	}
	return false;
 }

?>