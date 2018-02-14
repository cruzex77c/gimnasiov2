$(document).ready(function(){
	
	$('#btn_exel').prop('disabled',true);
	$('#btn_imprimir').prop('disabled',true);

	$('#btn_fecha').click(function(){
		$('#lista_reporteIngresos').html("<i class='fa fa-circle-o-notch fa-spin fa-3x fa-fw '></i>");
		var boton = $(this);
		var icono = boton.find('.fa');
		// var formulario = $('#form_ingresos').serialize();
		boton.prop('disabled',true);
		icono.toggleClass('fa-search fa-spinner fa-spin fa-floppy-o');
		$.ajax({
			url:'control/lista_reportes.php',
			method: 'POST',
			dataType: 'HTML',
			data: $('#form_ingresos').serialize()
		}).done(function(respuesta){
			$('#lista_reporteIngresos').html(respuesta);
			
			$('#btn_exel').click(function(){
				$('#reporte').tableExport({
					type:'excel',
					tableName:'Reporte', 
					ignoreColumn: [5],
					escape:'false'
				});
			});
			
			$('#btn_imprimir').click(function(){
				window.print();
			});
			
			icono.toggleClass('fa-search  fa-spinner fa-spin fa-floppy-o');
			boton.prop('disabled',false);
		}).always(function(){
			$('#btn_exel').prop('disabled',false);
			$('#btn_imprimir').prop('disabled',false);
		});
	});
	
});