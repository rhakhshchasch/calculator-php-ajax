$(document).ready(function(){

	$('#form').submit(function (event) {
		event.preventDefault();					/* отменяет поведение по умолчанию */

		let form = $(this);

		// console.log(event);

		$.ajax({
			url: '/php_Aleksey/main/php/calculator_function_AJAX/controller/calculator.php',         	/* Куда пойдет запрос */
			method: 'post',                    		/* Метод передачи (post или get) */
			dataType: 'json',						/* Тип данных в ответе (xml, json, script, html) */
			data: form.serialize(),  				/* Параметры передаваемые в запросе */
			success: function(output){  			/* функция которая будет выполнена после успешного запроса  */
				// console.log(output);     			/* В переменной data содержится ответ от calculator.php */
				const result = output.Result;
				$("#ajaxResult").html(result);
			},
			error: function (jqXHR, exception) {
				if (jqXHR.status === 0) {
					console.log('Not connect. Verify Network.');
				} else if (jqXHR.status == 404) {
					console.log('Requested page not found (404).');
				} else if (jqXHR.status == 500) {
					console.log('Internal Server Error (500).');
				} else if (exception === 'parsererror') {
					console.log('Requested JSON parse failed.');
				} else if (exception === 'timeout') {
					console.log('Time out error.');
				} else if (exception === 'abort') {
					console.log('Ajax request aborted.');
				} else {
					console.log('Uncaught Error. ' + jqXHR.responseText);
				}
			}
		});
});
});