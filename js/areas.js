$(document).ready(function(){
	//MODAL
	$('#btn_area').click(function(){
		$('#form_nueva_area')[0].reset();
		$('#modal_nueva_area').modal('show');
		console.log("form");
	});
	var listarArea = function (){
		$.ajax({
			url: 'control/lista_areas.php',
			method: 'POST',
			dataType: 'HTML',
		}).done(function(respuesta){
			$('#lista_area').html(respuesta);
				//EDITAR
				$('.btn_editar').click(function(){
					$('#form_nueva_area')[0].reset();
					var boton = $(this);
					var icono = boton.find('.fa');
					icono.toggleClass('fa-pencil fa-spinner fa-spin fa-floppy-o');
					boton.prop('disabled',true);
					var id_area = boton.data('id_area');
					$.ajax({
						url: 'control/buscar_normal.php',
						method: 'POST',
						dataType: 'JSON',
						data:{campo: 'id_area', tabla:'areas', id_campo: id_area}
					}).done(function(respuesta){  
						if(respuesta.encontrado == 1){
							$.each(respuesta["fila"], function(name, value){	
								
									$("#"+name).val(value);
							});
							$('#modal_nueva_area').modal('show');
					}
						icono.toggleClass('fa-pencil fa-spinner fa-spin fa-floppy-o');
						boton.prop('disabled',false);
					});
					
				});
				//ELIMINAR
			$('.btn_eliminar').click(function(){
				var boton = $(this);
				var icono = boton.find('.fa');
				boton.prop('disabled',true);
				icono.toggleClass('fa-trash fa-spinner fa-spin fa-floppy-o');
				var fila = boton.closest('tr');
				var id_area = boton.data('id_area');
				var eliminar = function(){
				$.ajax({
					url: 'control/eliminar_normal.php',
					method: 'POST',
					dataType: 'JSON',
					data: {campo: 'id_area', tabla:'areas', id_campo: id_area}
				
				}).done(function(respuesta){
					if(respuesta.estatus== 'success'){
						swal(
						  'Eliminado',
						  'Se elimino correctamente',
						  'success'
						)
						fila.fadeOut(1000);
						listarArea();
					}else{
						swal(
						  'Error',
						  'No se pudo eliminar',
						  'error'
						)
					}
					});
				};
					swal({
						  title: "Confirmacion",
						  text: "¿Desea eliminarlo?",
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
						  } else {
							sweetAlert.close();
						  }
						  icono.toggleClass("fa-trash fa-spinner fa-spin fa-floppy-o");
						  boton.prop('disabled',false);
						});	
			});
		});
	};
	listarArea();
	
	//GUARDAR
	$('#form_nueva_area').submit(function(event){
		event.preventDefault();
		var formulario = $(this);
		var boton = $(this).find(":submit");
		var icono = boton.find('.fa');
		icono.toggleClass('fa-save fa-spinner fa-spin fa-floppy-o');
		boton.prop('disabled',true);
		$.ajax({
			url: 'control/guardar_normal.php',
			method: 'POST',
			datatype: 'JSON',
			data: {tabla: 'areas',
					   datos: formulario.serializeArray()
				}
		}).done(function(respuesta){
			if(respuesta.estatus == 'success'){
				swal(
					'Guardado',
					'Se guardo correctamente',
					'success'
				)
				$('#modal_nueva_area').modal('hide');
				icono.toggleClass('fa-save fa-spinner fa-spin fa-floppy-o');
				listarArea();
				boton.prop('disabled',false);
			}else{
				swal(
					'Error',
					'Error al guardar',
					'error'
				)
				console.log(respuesta.mensaje);
			}
		});
	});
});