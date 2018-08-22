

<?php

function connect_countries_db(){
	
	$connect=mysqli_connect("localhost","root","","bd_inter_v");
	
	return $connect;
}


function do_query_db(&$db,$sql_string){
	
	if(!isset($db))
		return null;
	
	if(is_null($sql_string))
		return null;
	
	
	return mysqli_query($db,$sql_string);
	
}

function close_db(&$db){
	mysqli_close($db);
}



?>