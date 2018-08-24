<?php
//header('Content-type: text/html; charset=utf-8');
require_once("/view/list_country.php");
require_once("/model/country.php");
require_once("/model/validation.php");
require_once("/view/partial/one_country_for_list_view.php");
require_once("/action/index.php");
require_once("/model/database.php");



 
 
 function add_new_country(){
	

	$not_js_post=0;
	if(isset($_POST["not_js_form"])){
		$not_js_post=1;
	}

	$connect=DbСountries::Connect();

	if(ret_bad_response_new_country(!isset($connect),$not_js_post))
		return;
	

//проверяем и изменяем входные данные
	
	$post_name=$_POST['name'];
	ValidationInputString($post_name,$connect);
	$arr_valid = array("name" =>  $post_name, 
	"number_of_cities" =>  $_POST['number_of_cities'], 
	"population" =>  $_POST['population'], 
	"monarchy" =>  isset($_POST['monarchy'])?$_POST['monarchy']:0);
	
//проверяем данные для конкретного класса и получаем объект
	$obj=Country::ValidationArray($arr_valid);

	if(ret_bad_response_new_country(is_null($obj),$not_js_post))
		return;
	

//работа с бд
	$sql_code_string="INSERT INTO countries  (name, number_of_cities,population,monarchy)".
	" VALUES ('".$obj->name."','".$obj->number_of_cities."','".$obj->population."','". $obj->monarchy ."')";
	$result=$connect->Query($sql_code_string);

	if(ret_bad_response_new_country(!$result,$not_js_post))
		return;


	$obj->id=$connect->GetInsertId();
	
 
	if($not_js_post===1){
		index_action();
		
		//$host  = $_SERVER['HTTP_HOST'];
		//header("Location: http://$host/index.php");
		return;
	}
	
	One_country_for_list_view_Render($obj);
	$connect->Close();
	 
 }
 
 
 
 //true- надо прекратить выполнение, false-все хорошо 
 function ret_bad_response_new_country($flag,$post_flag){
	if($flag){
		if($post_flag===1){
			index_action();
			//$host  = $_SERVER['HTTP_HOST'];
			//header("Location: http://$host/index.php");
			return true;
			
		}
		echo "false";
		return true;
		
	}
	return false;
 }

