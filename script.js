$('.decor').submit(function validate_form() {
    var msg = $('.decor').serialize();

    var name_exp = /^[А-Яа-яІі\s]+$/;
	var group_exp = /^[А-Яа-яІі]{2,2}\-[0-9][0-9]$/;
	var facul_exp = /^[А-Яа-яІі\s]+$/;
	var cafed_exp = /^[А-Яа-яІі\s]+$/;

	var name = document.getElementById('input_name').value;
	var group = document.getElementById('input_group').value;
	var faculty = document.getElementById('input_facult').value;
	var cafedra = document.getElementById('input_cafed').value;
	var birthday = document.getElementById('input_date').value;

    if (name_exp.test(name) == false && name != '')
	{
		$('#info').html('Введіть ПІБ коректно');
		return false;
	}

	if (!group_exp.test(group) && group != '')
	{
		$('#info').html('Введіть назву групи коректно');
		return false;
	}

	if (!facul_exp.test(faculty) && faculty != '')
	{
		$('#info').html('Введіть назву факультету коректно');
		return false;
	}

	if (!cafed_exp.test(cafedra) && cafedra != '')
	{
		$('#info').html('Введіть назву кафедри коректно');
		return false;
	}


	else {
	    $.ajax({
	         type: 'POST',
	         url: './file.php',
	         data: msg,
	        success: function(data) { 
	            $('#info').html(data);
	         },
	         error:  function(xhr, str) {
		    	alert('Виникла помилка: ' + xhr.responseCode);
	         }
	       });
	    return false;
	}
});
