$(document).ready(function(){
	var actualizar = function(){
		$.ajax({
			url: 'control/detalles_afiliados.php',
			method: 'POST',
			dataType: 'JSON',
		}).done(function(respuesta){
			$('#activos_afiliados').text(respuesta.activos);
			$('#vencidos_afiliados').text(respuesta.vencidos);
			$('#nuevos_afiliados').text(respuesta.nuevos);
		});
	};
	actualizar();
	
	$('#btn_printingresos').click(function(){
		
		if($('#div_egresos').hasClass('hidden-print')){
			if($('#div_ingresos').hasClass('hidden-print')){
				$('#div_ingresos').removeClass('hidden-print');
			}
		}else{
			$('#div_egresos').addClass('hidden-print');
			if($('#div_ingresos').hasClass('hidden-print')){
				$('#div_ingresos').removeClass('hidden-print');
			}
		}
		window.print();
	});
	
	$('#btn_printegresos').click(function(){
		
		if($('#div_ingresos').hasClass('hidden-print')){
			if($('#div_egresos').hasClass('hidden-print')){
				$('#div_egresos').removeClass('hidden-print');
			}
		}else{
			$('#div_ingresos').addClass('hidden-print');
			if($('#div_egresos').hasClass('hidden-print')){
				$('#div_egresos').removeClass('hidden-print');
			}
		}
		window.print();
	});
	
	//----CANCELAR INGRESO
	$('.btn-cancelarIngreso').click(function(){
		var boton = $(this);
		var icono = boton.find('.fa');
		var id_historial = boton.data('id_historial');
		boton.prop('disabled',true);
		icono.toggleClass("fa-trash fa-spinner fa-spin fa-floppy-o");
		
		var eliminar = function(){
			$.ajax({
				url: 'control/cancelarMovimiento.php',
				method: 'POST',
				dataType: 'JSON',
				data: {tabla:'historial_pago', campo:'des_historial', id_valor:id_historial,id_campo:'id_historial', valor:'CANCELADO'}
			}).done(function(respuesta){
				if(respuesta.estatus== 'success'){
						swal(
						  'Correcto',
						  'Se cancelo correctamente',
						  'success'
						)
						location.reload();
					}else{
						swal(
						  'Error',
						  'No se pudo cancelar',
						  'error'
						)
					}
			});
		};
		swal({
			title: "Confirmacion",
			text: "¿Desea cancelar el ingreso?",
			type: "warning",
			showCancelButton: true,
			confirmButtonColor: "#DD6B55",
			confirmButtonText: "Si",
			cancelButtonText: "No",
			closeOnConfirm: true,
			closeOnCancel: false
			},
			function(isConfirm){
			    if (isConfirm) {
					eliminar();
				}else {
					sweetAlert.close();
				}
				    icono.toggleClass("fa-trash fa-spinner fa-spin fa-floppy-o");
					boton.prop('disabled',false);
				});		
	});
	
	//----CANCELAR EGRESO
	$('.btn-cancelarEgreso').click(function(){
		var boton = $(this);
		var icono = boton.find('.fa');
		var id_egreso = boton.data('id_egreso');
		boton.prop('disabled',true);
		icono.toggleClass("fa-trash fa-spinner fa-spin fa-floppy-o");
		
		var eliminar = function(){
			$.ajax({
				url: 'control/cancelarMovimiento.php',
				method: 'POST',
				dataType: 'JSON',
				data: {tabla:'egresos', campo:'estatus_egreso', id_valor:id_egreso,id_campo:'id_egreso', valor:'CANCELADO'}
			}).done(function(respuesta){
				if(respuesta.estatus== 'success'){
						swal(
						  'Correcto',
						  'Se cancelo correctamente',
						  'success'
						)
						location.reload();
					}else{
						swal(
						  'Error',
						  'No se pudo cancelar',
						  'error'
						)
					}
			});
		};
		swal({
			title: "Confirmacion",
			text: "¿Desea cancelar el egreso?",
			type: "warning",
			showCancelButton: true,
			confirmButtonColor: "#DD6B55",
			confirmButtonText: "Si",
			cancelButtonText: "No",
			closeOnConfirm: true,
			closeOnCancel: false
			},
			function(isConfirm){
			    if (isConfirm) {
					eliminar();
				}else {
					sweetAlert.close();
				}
				    icono.toggleClass("fa-trash fa-spinner fa-spin fa-floppy-o");
					boton.prop('disabled',false);
				});		
	});
	 function cargarDatosGrafica(){
		var fecha_hoy= Date.today().toString('yyyy-MM-dd');
		var values=fecha_hoy.split("-");
		var mes = Number(values[1]);
		var ano = Number(values[0]);
		var meses = ['','Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'];
		if(mes == 2){
				var mes2 = 1;
				var mes3 = 12;
				var ano2 = ano-1;
		}else if(mes == 1){
				var mes2 = 12;
				var mes3 = 11;
				var ano2 = ano-1;
		}else{
				var mes2 = mes-1;
				var mes3 = mes2-1;
				var ano2 = 0;
		}	
		
		$.ajax({
			url: 'control/cargarGrafica.php',
			method: 'POST',
			dataType: 'JSON',
			data:{ano:ano, mes:mes, mes2:mes2, mes3:mes3,ano2:ano2} 
		}).done(function(respuesta){
			console.log(respuesta);
			var ingresos = [];
			var egresos = [];
			$.each(respuesta.ingresos, function(index,value){
				if(value == null){
					ingresos.push(0);
				}else{					
					ingresos.push(Number(value));
				}
			});
			console.log(ingresos);
			$.each(respuesta.egresos, function(index,value){
				if(value == null){
					egresos.push(0);
				}else{					
					egresos.push(Number(value));
				}
			});
			console.log(egresos);
				$('#container').highcharts({
        chart: {
            type: 'column',
            margin: 75
        },
        title: {
            text: 'Ultimos 3 meses'
        },
		xAxis: {
            categories: [meses[mes3], meses[mes2], meses[mes]]
        },
		yAxis: {
            title: {
                text: 'Total'
            }
        },
        plotOptions: {
            column: {
                depth: 25
            }
        },
        series: [{
			name: 'Ingresos',
            data: ingresos.reverse()
        },{
			name: 'Egresos',
            data: egresos.reverse()
		}]
    });

		});
	}
	
	//------MODAL PARA EGRESO
	$('#btn_nuevoegresos').click(function(){
		$('#form_nuevo_egreso')[0].reset();
		$('#modal_nuevo_egreso').modal('show');
	});
	
	//----GUARDAR EGRESO--------
	$('#form_nuevo_egreso').submit(function(event){
		event.preventDefault();
		var boton = $(this).find(':submit');
		var icono = boton.find('.fa');
		var id_turno = $('#input_turno').val();
		var formulario = $(this).serialize();
		boton.prop('disabled',true);
		icono.toggleClass("fa-save fa-spinner fa-spin fa-floppy-o");
		
		$.ajax({
			url: 'control/guardar_egreso.php',
			dataType: 'JSON',
			method:'POST',
			data: formulario+'&turno='+id_turno
		}).done(function(respuesta){
			if(respuesta.estatus == 'success'){
				swal(
						'Correcto',
						'Se guardado correctamente',
						'success'
					);
					location.reload();
					$('#modal_nuevo_egreso').modal('hide');
			}else{
				swal(
						'Error',
						'No se ha podido guardar correctamente',
						'error'
					);
			}
		}).done(function(){
			boton.prop('disabled',false);
			icono.toggleClass("fa-save fa-spinner fa-spin fa-floppy-o");
		});
		
	});
	
	cargarDatosGrafica();
	
});