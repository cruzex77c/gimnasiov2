$(document).ready(function(){
	$('#btn_ingresos').click(function(){
		if($('#panel_ingresos').hasClass("hidden-print")){
			$('#panel_ingresos').removeClass("hidden-print");
			$('#panel_egresos').addClass("hidden-print");
			
			if($('#body_ingresos').hasClass("hidden-print")){
				$('#body_ingresos').removeClass("hidden-print");
			}
			
		}else{
			$('#panel_egresos').addClass("hidden-print");
			window.print();
		}
		
	});
	
	$('#btn_egresos').click(function(){
		if($('#panel_egresos').hasClass("hidden-print")){
			$('#panel_egresos').removeClass("hidden-print");
			$('#panel_ingresos').addClass("hidden-print");
			
			if($('#body_egresos').hasClass("hidden-print")){
				$('#body_egresos').removeClass("hidden-print");
			}
			
		}else{
			$('#panel_ingresos').addClass("hidden-print");
			window.print();
		}
	});
});