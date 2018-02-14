$(document).ready(function(){

	var listarPaquetes = function (){
		$.ajax({
			url: 'control/listar_paquetes.php',
			method: 'POST',
			dataType: 'HTML',
		}).done(function(respuesta){
			$('#lista_paquete').html(respuesta);
			
			//EDITAR
				$('.btn_editar').click(function(){
					$('#form_nuevo_paquete')[0].reset();
					var boton = $(this);
					var icono = boton.find('.fa');
					icono.toggleClass('fa-pencil fa-spinner fa-spin fa-floppy-o');
					boton.prop('disabled',true);
					var id_paquete = boton.data('id_paquete');
					$.ajax({
						url: 'control/buscar_normal.php',
						method: 'POST',
						dataType: 'JSON',
						data:{campo: 'id_paquete', tabla:'paquetes', id_campo: id_paquete}
					}).done(function(respuesta){  
						if(respuesta.encontrado == 1){
							$.each(respuesta["fila"], function(name, value){	
								
									$("#"+name).val(value);
							});
							$('#modal_nuevo_paquete').modal('show');
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
					var id_paquete = boton.data('id_paquete');
					var eliminar = function(){
					$.ajax({
						url: 'control/eliminar_normal.php',
						method: 'POST',
						dataType: 'JSON',
						data: {campo: 'id_paquete', tabla:'paquetes', id_campo: id_paquete}
					
					}).done(function(respuesta){
						boton.prop('disabled',false);
						if(respuesta.estatus == "success"){
							swal(
						  'Eliminado',
						  'Se elimino correctamente',
						  'success'
						)
						fila.fadeOut(1000);
						listarPaquetes();
						}else{
						swal(
						  'Error',
						  'No se pudo eliminar',
						  'error'
						)
							console.log(respuesta.error);
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
	listarPaquetes();
	//MODAL
	$('#btn_paquete').click(function(){
		$('#form_nuevo_paquete')[0].reset();
		$('#modal_nuevo_paquete').modal('show');
		console.log("form");
	});
		//GUARDAR
	$('#form_nuevo_paquete').submit(function(event){
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
			data: {tabla: 'paquetes',
					   datos: formulario.serializeArray()
				}
		}).done(function(respuesta){
			if(respuesta.estatus == 'success'){
				swal(
					'Guardado',
					'Se guardo correctamente',
					'success'
				)
				$('#modal_nuevo_paquete').modal('hide');
				icono.toggleClass('fa-save fa-spinner fa-spin fa-floppy-o');
				listarPaquetes();
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