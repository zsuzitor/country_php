
<?php

//отрисовывает 1 страну в списке стран
function One_country_for_list_view_Render(&$obj){
	?>
	
	<div class='one_country_all'>
	<?php
	
	echo "<div class='one_country_head'>$obj->name
	<div class='one_country_buttons'><div class='action_country_list_div_button div_inline_block before_del'
	title='Удалить' onclick='alert(\"не реализовано\")'></div>
	<div class='action_country_list_div_button div_inline_block before_pen' title='Редактировать'
	onclick='alert(\"не реализовано\")'></div></div>
	</div>";
	?>
	
	<div>
	<?php
	echo "<div><label>Id:</label><span>$obj->id</span></div>";
	echo "<div><label>Количество городов:</label><span>$obj->number_of_cities</span></div>";
	echo "<div><label>Население:</label><span>$obj->population</span></div>";
	echo "<div><label>Монархия?:</label><span>";
			 
	if($obj->monarchy)
		echo "Да";
	else
		echo "Нет";
	echo "</span></div>";
				

	?>
	</div>
	</div>
	
	
<?php	
}

?>