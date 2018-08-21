<?php
require_once("/view/list_country.php");
require_once("/model/country.php");





function index_action(){
	$connect=mysqli_connect("localhost","root","","bd_inter_v");
	if(!isset($connect)){
		exit("Не удалось подключиться к базе данных");
	}

//получаем данные из бд и отправляем в представление
	$sql_code_string="SELECT * FROM countries";
	$result=mysqli_query($connect,$sql_code_string);
 
	$data=mysqli_fetch_all($result,1);
	mysqli_close($connect);
	$array_obj=array();

//формируем объекты
	foreach ($data as $iter) {
		$array_obj[]=Country::GetClassObject($iter);
	}

	ListCountryRender($array_obj);

	
	
}

?>