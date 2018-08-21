<?php

//отрисовывает форму для добавления новой страны
function AddNewCountryFormRender(){
	?>
	<div class='div_all_add_new_country' >
	<h2 class='hed_for_add_new'> Добавить новую страну</h2>
	<div id='div_form_add_new_county_id' style='display:display;'>
 <div>
 <label for='NEW_form_name'> Название страны</label>
 <input type='text' id='NEW_form_name' name ='name'/>
 </div>
 <div>
 <label for='NEW_form_number_of_cities'> Количество городов</label>
  <input type='number' id='NEW_form_number_of_cities' name ='number_of_cities'/>
 </div>
 <div>
  <label for='NEW_form_population'> Население</label>
  <input type='number' id='NEW_form_population' name ='population'/>
 </div>
 <div>
  <label for='NEW_form_monarchy'> Монархия?</label>
  <input type='checkbox' value='true' id='NEW_form_monarchy' name ='monarchy'/>
 </div>
 <button onclick='add_new_country()'>Добавить</button>

	</div></div>
	
<?php	
}

?>