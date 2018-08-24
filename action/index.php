<?php
require_once("/view/list_country.php");
require_once("/model/country.php");
require_once("/model/database.php");




function index_action(){
	$connect=DbСountries::Connect();
	if(!isset($connect)){
		exit("Не удалось подключиться к базе данных");
	}

//получаем данные из бд и отправляем в представление
	$sql_code_string="SELECT * FROM countries";
	$result=$connect->Query($sql_code_string);
 
	$data=&$connect->FetchAll($result);
	$connect->Close();
	$array_obj=array();

//формируем объекты
	foreach ($data as $iter) {
		$array_obj[]=Country::GetClassObject($iter);
	}

	ListCountryRender($array_obj);

	
	
}

