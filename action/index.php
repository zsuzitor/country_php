<?php
require_once("/view/list_country.php");
require_once("/model/country.php");
require_once("/model/database.php");




function index_action(){
	$connect=connect_countries_db();
	if(!isset($connect)){
		exit("Не удалось подключиться к базе данных");
	}

//получаем данные из бд и отправляем в представление
	$sql_code_string="SELECT * FROM countries";
	$result=do_query_db($connect,$sql_code_string);
 
	$data=mysqli_fetch_all($result,1);
	close_db($connect);
	$array_obj=array();

//формируем объекты
	foreach ($data as $iter) {
		$array_obj[]=Country::GetClassObject($iter);
	}

	ListCountryRender($array_obj);

	
	
}

?>