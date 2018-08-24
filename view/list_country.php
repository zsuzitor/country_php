<?php


require_once("/view/_layout.php");
require_once("/view/partial/add_new_country_form.php");
require_once("/view/partial/one_country_for_list_view.php");

//отрисовывает страницу со списком стран
function ListCountryRender(&$array){
	
	LayoutRenderStart("Countries");
	echo'<div class="main_div">';
	AddNewCountryFormRender();
	echo'<div id="div_list_country" class="div_list_country"><hr/>';
	foreach ($array as $obj) {
		One_country_for_list_view_Render($obj);
		echo "<hr/>";
	}
	echo'</div>';
	echo'</div>';
	
	LayoutRenderEnd();
}


