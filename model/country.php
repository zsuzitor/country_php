

<?php


class Country{
	
	public $id;
	public $name;
	public $number_of_cities;
	public $population;
	public $monarchy;

	
	public function __construct(){
		$this->id=null;
		$this->name=null;
		$this->number_of_cities=null;
		$this->population=null;
		$this->monarchy=null;
	}

	//формирует объект из массива
	public static function GetClassObject($array){
		$res=new Country;
		if(isset($array["id"]))
			$res->id=$array["id"];

		if(isset($array["name"]))
			$res->name=$array["name"];
		if(isset($array["number_of_cities"]))
			$res->number_of_cities=$array["number_of_cities"];
		if(isset($array["population"]))
			$res->population=$array["population"];
		if(isset($array["monarchy"]))
			$res->monarchy=$array["monarchy"];
		return $res;
	}
	
	
	// валидация для свойст объекта(из массива), мозвращает новый объект
	public static function ValidationArray(&$array){

		if(!isset($array["name"]))
			return null;
		if(!isset($array["number_of_cities"]))
			return null;
		if(!isset($array["population"]))
			return null;
		if(!isset($array["monarchy"]))
			return null;

		$res=new Country;

		if(isset($array["id"]))
			if(settype($array["id"],"integer"))
				$res->id=$array["id"];
			else
				return null;

	
	
	
		if(preg_match("/^(\p{L}){1}(\p{L}|\p{Zs}){0,98}/i", $array["name"]))
			$res->name=$array["name"];
		else 
			return null;

		if(settype($array["number_of_cities"],"integer"))
			$res->number_of_cities=$array["number_of_cities"];
		else
			return null;

		if(settype($array["population"],"integer"))
			$res->population=$array["population"];
		else
			return null;


		if(is_string($array["monarchy"])){
			if(strcmp($array["monarchy"],"true")===0)
				$array["monarchy"]=1;
			else
				$array["monarchy"]=0;
		}
		if(settype($array["monarchy"],"bool"))
			$res->monarchy=$array["monarchy"];
		else
			return null;
		

		return $res;
}	
	
}

?>

