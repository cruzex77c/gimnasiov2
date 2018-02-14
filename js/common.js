$(document).ready(function(){
	/*$(".fecha_full").datepicker({
		changeMonth: true,
		changeYear: true
	});*/
	$("input[type=text]").blur(function(e){
		 $(this).val($(this).val().toUpperCase());
	});
	
});

function ajaxError(xhr, textStatus, error){
	alertify.error("Error" + error);
	console.error(xhr);
	console.error(textStatus);
	console.error(error);
}

