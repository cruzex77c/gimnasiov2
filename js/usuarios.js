$(document).ready(function(){
	$('#btn_usuario').click(function(){
		$('#form_nuevo_usuario')[0].reset();
		$('#modal_nuevo_usuario').modal('show');
	});
	
	var enlistaUsuarios = function(){
		$.ajax({
			url: 'control/lista_usuarios.php',
			method: 'POST',
			dataType: 'HTML',
		}).done(function(resultado){
			$('#lista_usuario').html(resultado);
			//ELIMINAR
			$('.btn_eliminar').click(function(){
				var boton = $(this);
				var icono = boton.find('.fa');
				boton.prop('disabled',true);
				icono.toggleClass('fa-trash fa-spinner fa-spin fa-floppy-o');
				var fila = boton.closest('tr');
				var id_usuario = boton.data('id_usuario');
				var eliminar = function(){
				$.ajax({
					url: 'control/eliminar_normal.php',
					method: 'POST',
					dataType: 'JSON',
					data: {campo: 'id_usuario', tabla:'usuarios', id_campo: id_usuario}
				
				}).done(function(respuesta){
					if(respuesta.estatus== 'success'){
						swal(
						  'Eliminado',
						  'Se elimino correctamente',
						  'success'
						)
						fila.fadeOut(1000);
						enlistaUsuarios();
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
	enlistaUsuarios();
		//GUARDAR
	$('#form_nuevo_usuario').submit(function(event){
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
			data: {tabla: 'usuarios',
					   datos: formulario.serializeArray()
				}
		}).done(function(respuesta){
			if(respuesta.estatus == 'success'){
				swal(
					'Guardado',
					'Se guardo correctamente',
					'success'
				)
				$('#modal_nuevo_usuario').modal('hide');
				icono.toggleClass('fa-save fa-spinner fa-spin fa-floppy-o');
				enlistaUsuarios();
				boton.prop('disabled',false);
				location.reload();
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