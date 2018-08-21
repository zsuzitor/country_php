
<?php

//исправляет массив с строками
function ValidationInputArray(&$array,&$db){
	
	foreach ($array as &$value) {
		ValidationInputString($value,$db);
}
	
	
}

//исправляет строку
function ValidationInputString(&$str,$db){
	if(!is_null($str))
		$str=htmlentities(mysqli_real_escape_string($db, $str), ENT_QUOTES, 'UTF-8');
}

?>


