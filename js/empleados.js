$(document).ready(function(){
	$('#btn_empleado').click(function(){
		$('#form_nuevo_empleado')[0].reset();
		$('#modal_nuevo_empleado').modal('show');
	});
	
	var enlistarEmpleados = function(){
		$.ajax({
			url: 'control/lista_empleados.php',
			method: 'POST',
			dataType: 'HTML',
		}).done(function(respuesta){
			$('#lista_empleado').html(respuesta);
			//EDITAR
			$('.btn_editar').click(function(){
				$('#form_nuevo_empleado')[0].reset();
					var boton = $(this);
					var icono = boton.find('.fa');
					icono.toggleClass('fa-pencil fa-spinner fa-spin fa-floppy-o');
					boton.prop('disabled',true);
					var id_staff = boton.data('id_staff');
					$.ajax({
						url: 'control/buscar_normal.php',
						method: 'POST',
						dataType: 'JSON',
						data:{campo: 'id_staff', tabla:'staff', id_campo: id_staff}
					}).done(function(respuesta){  
						if(respuesta.encontrado == 1){
							$.each(respuesta["fila"], function(name, value){	
									if(name == 'nombre_staff'){
										console.log('nombre_staff'+value);
										$('#newnombre_staff').val(value);
									}else{
										$("#"+name).val(value);
									}
							});
							$('#modal_nuevo_empleado').modal('show');
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
				var id_staff = boton.data('id_staff');
				var eliminar = function(){
				$.ajax({
					url: 'control/eliminar_normal.php',
					method: 'POST',
					dataType: 'JSON',
					data: {campo: 'id_staff', tabla:'staff', id_campo: id_staff}
				
				}).done(function(respuesta){
					if(respuesta.estatus== 'success'){
						swal(
						  'Eliminado',
						  'Se elimino correctamente',
						  'success'
						)
						fila.fadeOut(1000);
						enlistarEmpleados();
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
	enlistarEmpleados();
	//GUARDAR
	$('#form_nuevo_empleado').submit(function(event){
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
			data: {tabla: 'staff',
					   datos: formulario.serializeArray()
				}
		}).done(function(respuesta){
			if(respuesta.estatus == 'success'){
				swal(
					'Guardado',
					'Se guardo correctamente',
					'success'
				)
				$('#modal_nuevo_empleado').modal('hide');
				icono.toggleClass('fa-save fa-spinner fa-spin fa-floppy-o');
				enlistarEmpleados();
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