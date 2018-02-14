$(document).ready(function(){
	
	//--------CARGAR JORNADA-----

	var turno = function(){
		$.ajax({
			url: 'control/turnos.php',
			method: 'POST',
			dataType: 'JSON',	
		}).done(function(respuesta){
			if(respuesta.estatus == 'success'){
				$('#turno').text(respuesta.turno);
				$('#input_turno').val(respuesta.turno);
			}else{
				console.log('error');
				console.log(respuesta.mensaje);
			}
		});
	};
	
	$('#cerrar_turno').click(function(event){
		event.preventDefault();
		var cerrarTurno = $('#input_turno').val();
		var id_usuario = $('#id_usuario').val();
		$.ajax({
			url: 'control/corte_caja.php',
			method: 'POST',
			dataType: 'JSON',
			data:{cerrarTurno:cerrarTurno,id_usuario:id_usuario}
		}).done(function(respuesta){
			
			if(respuesta.estatus == 'success'){
					swal(
				  'Success',
				  'Se ha cerrardo el turno exitosamente',
				  'success'
				);
				location.href = 'login/logout.php';
			}else{
					swal(
				  'Error',
				  'Error al cerrar el turno',
				  'error'
				);
			}
		});
	});
	turno();
	
	//LISTAR
	$('#btn_perfil').click(function(event){
		event.preventDefault();
		var id_usuario = $('#id_usuario').val();
		//console.log(id_usuario);
		$.ajax({
			url: 'control/perfil.php',
			method: 'POST',
			dataType: 'JSON',
			data:{'id_usuario':id_usuario}
		}).done(function(respuesta){
			if(respuesta.encontrado == 1){
				$.each(respuesta["fila"], function(name, value){
					$("#"+name).val(value);
				});
					$('#modal_perfil').modal('show');					
			}else{
				console.log(respuesta.mensaje);
							
			}
		});
			
	});
	$('#buscar_afiliado').autocomplete({
		source: "control/search_json.php?tabla=cliente&campo=nombre_cliente&valor=nombre_cliente&etiqueta=nombre_cliente",
		minLength : 2,
		autoFocus: true,
		open: function(){
        setTimeout(function () {
            $('.ui-autocomplete').css('z-index', 99999999999999);
        }, 0);
		},
		select: function( event, ui ){
			$("#id_buscar_cliente").val(ui.item.extras.id_cliente);
			var id_cliente = ui.item.extras.id_cliente;
			$('#form_buscar').submit(function(event){
				event.preventDefault();
				location.href = "detalles_afiliado.php?id_afiliado="+id_cliente;
			});
		}
	});
	//GUARDAR
	$('#btn_actualizar_perfil').click(function(){
		
		var boton = $(this);
		var icono = boton.find('.fa');
		var id_usuario = $('#id_usuario').val();
		var usuario = $('#usuario').val();
		var pass = $('#pass').val();
		var rpass = $('#rpass').val();
		if(pass === ""){
			swal(
				  'Error',
				  'Tiene que colocar una contraseña',
				  'error'
				);
		}else{
			if(pass === rpass){
				boton.prop('disabled',true);
				icono.toggleClass('fa-save fa-spinner fa-spin fa-floppy-o');
				$.ajax({
					url: 'control/guardar_pass.php',
					method: 'POST',
					dataType: 'JSON',
					data:{id_usuario:id_usuario, usuario:usuario,pass:pass}
				}).done(function(respuesta){
					if(respuesta.estatus == 'success'){
						swal(
						  'Correcto',
						  'Sus datos se han actualizado correctamente',
						  'success'
						);
						$('#modal_perfil').modal('hide');
					}else{
						swal(
						  'Error',
						  'No se pudo actualizar sus datos, Por favor intentelo más tarde',
						  'error'
						);
					}
				}).always(function(){
					boton.prop('disabled',false);
					icono.toggleClass('fa-save fa-spinner fa-spin fa-floppy-o');
				});
			}else{
				swal(
				  'Error',
				  'Las contraseñas no coinciden',
				  'error'
				);
			}
		}
	});
	
	//--------CREAR RESPALDO DE BD--------
	$('#btn_respaldo').click(function(event){
		event.preventDefault();
		var href = $(this);
		var icono = href.find('.fa');
		icono.toggleClass('fa-database fa-spinner fa-spin fa-floppy-o');
		function respaldar(){
			$.ajax({
				url: 'respaldoS/bd/Backup.php',
				dataType: 'JSON'
			}).done(function(respuesta){
				if(respuesta.estatus == 'success'){
					console.log(respuesta.mensaje);
					swal(
					  'Correcto',
					  'Se ha respladado de base de datos',
					  'success'
					);
				}else{
					swal(
					  'Error',
					  'Error al respaldar la DB',
					  'error'
					);
				}
			}).always(function(){
				icono.toggleClass('fa-database fa-spinner fa-spin fa-floppy-o');				
			});
		}
		swal({
						  title: "Confirmacion",
						  text: "¿Desea respaldar la BD?",
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
							respaldar();
						  } else {
							sweetAlert.close();
							icono.toggleClass('fa-database fa-spinner fa-spin fa-floppy-o');				
						  }
						});	
	});
	
});