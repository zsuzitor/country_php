

function validation_form_new_country(){
	 //валидация до отправки
	var str = document.getElementById('NEW_form_name').value;

	if(str.length>99)
		return false;
		
	if( str.match( /^([a-z]|[а-я])([a-z]|[а-я]|\s){0,98}$/i )==null)
		return false;
	
	
	str = document.getElementById('NEW_form_number_of_cities').value;
	if( str.match( /^\d{1,29}$/i )==null)
		return false;
	
	str = document.getElementById('NEW_form_population').value;
	if( str.match( /^\d{1,29}$/i )==null)
		return false;
	
	return true;
}

//работа с прелоадером
function PreloaderAction(show) {
    if (show == true)
        document.getElementById('Main_preloader_id').style.display = 'block';
    else
        document.getElementById('Main_preloader_id').style.display = 'none';
}


//отправляет данные для добавления новой страны
function add_new_country(){
	
	if(!confirm("Уверены?"))
		return;
	
	
	if(!validation_form_new_country()){
		alert("ошибка валидации");
		return;
	}
		
	
	var dt = {
        'name': document.getElementById('NEW_form_name').value,
		'number_of_cities':document.getElementById('NEW_form_number_of_cities').value,
		'population':document.getElementById('NEW_form_population').value,
		'monarchy':document.getElementById('NEW_form_monarchy').checked
		
    };
    $.ajax({
        url: "/Add_new_county.php",
        data: dt,
        success: 
		function(result){
			result=result.trim();
			if(result=='false'){
				alert("что то пошло не так");
				return;
			}
			var div_replace=document.getElementById('div_list_country');
			if(div_replace){
				div_replace.innerHTML+=result+"<hr/>";
			}
			
		}
		,
        error: function () {
            alert("ошибка добавления");
            PreloaderAction(false);
        },
        beforeSend: function () { PreloaderAction(true); },
        complete: function () { PreloaderAction(false); },
        type: 'POST', dataType: 'html'//html
    });
	
	
	
	
}