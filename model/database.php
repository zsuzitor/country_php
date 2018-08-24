<?php


class DbСountries {
	private static $context;
	private  $db;
	
	private function __construct(){
		$this->db=mysqli_connect("localhost","root","","bd_inter_v");
		
	}
	
	private function __clone () {}
	private function __wakeup () {}
	
	//obj-удачно
	public static function Connect(){
		if(!isset(self::$context))
			self::$context=new self();
			
		return self::$context;
	}

	public function Query($sql_string){
	
		if(!isset($this->db))
			return null;
	
		if(is_null($sql_string))
			return null;
	
	
		return mysqli_query($this->db,$sql_string);
	
	}

	public function Close(){
		mysqli_close($this->db);
	}

	public function ValidateString($str){
	
		return mysqli_real_escape_string($this->db, $str);
	}

	public function GetInsertId(){
	
		return mysqli_insert_id($this->db);
	}

	public function &FetchAll(&$req){
		$res=mysqli_fetch_all($req,1);
		return $res;
	}
	
}











