$(document).ready(function(){


	cargarTabla();

	//----CALCULAR FECHA DE NACIMIENTO
		$("#fechanacimiento_cliente").blur(function(){

			var fecha = $("#fechanacimiento_cliente").val();
			var fecha_hoy= Date.today().toString('yyyy-MM-dd');

			//var diferencia = fecha_hoy - parseInt(fecha);

			var values=fecha_hoy.split("-");
			var dia = values[2];
			var mes = values[1];
			var ano = values[0];
			//console.log(dia+mes+ano);

			//fecha de nacimiento
			var values_n=fecha.split("-");
			var dia_n = values_n[2];
			var mes_n = values_n[1];
			var ano_n = values_n[0];
			//console.log(dia_n+mes_n+ano_n);

			if(mes_n>=mes && dia_n<=dia){
				var edad_n = (ano-ano_n)-1;
				//console.log("no cumple");
			}else{
				var edad_n = ano-ano_n;
				//console.log("cumple");
			}

			$("#edad_cliente").val(edad_n);
		});


	$('#btn_nuevo').click(function(){
		$('#modal_afiliado').modal('show');
		$('h4.modal-title').text('Nuevo Afiliado');
		$('#form_afiliado')[0].reset();
	});

	//--------ALTA DE AFILIADO
	$('#form_afiliado').submit(function(event){
		event.preventDefault();
		var boton = $(this).find(':submit');
		var icono = boton.find('.fa');
		boton.prop('disabled',true);
		icono.toggleClass("fa-save fa-spinner fa-spin fa-floppy-o ");

		$.ajax({
			url: 'control/guardar_normal.php',
			dataType: 'JSON',
			method: 'POST',
			data: {tabla: 'cliente', datos: $('#form_afiliado').serializeArray()}
		}).done(function(respuesta){
			if(respuesta.estatus == "success"){
				swal(
				  'Correcto',
				  'Se ha guardado correctamente',
				  'success'
				 );
				 $('#modal_afiliado').modal('hide');
				 cargarTabla();
			}else{
				swal(
				  'Error',
				  'No se ha podido guardar.',
				  'error'
				);
			}
		}).always(function(){
			boton.prop('disabled',false);
			icono.toggleClass("fa-save fa-spinner fa-spin fa-floppy-o");
		});

	});

}); //fin de document


function cargarTabla(){
	$.ajax({
		url: 'control/lista_afiliados.php',
		dataType: 'HTML',
		method: 'POST'
	}).done(function(respuesta){
		$('#div_tabla').html(respuesta);

			//---BUSCAR MODAL AFILIADO----
			$('.btn_editar').click(function(){
				var boton = $(this);
				var icono = boton.find('.fa');
				icono.toggleClass('fa-pencil fa-spinner fa-spin fa-floppy-o');
				var id_afiliado = boton.data('id_afiliado');
				$.ajax({
					url: 'control/buscar_normal.php',
					dataType: 'JSON',
					method: 'POST',
					data:{tabla: 'cliente', campo: 'id_cliente', id_campo: id_afiliado}
				}).done(function(respuesta){
					if(respuesta.encontrado == 1){
						$.each(respuesta["fila"], function(name, value){
							$("#"+name).val(value);
						});
						$("#modal_afiliado").modal("show");
						$('h4.modal-title').text('Editar Afiliado');
					}else{
						 console.log(respuesta.mensaje);
					}
				}).always(function(){
					icono.toggleClass('fa-pencil fa-spinner fa-spin fa-floppy-o');
				});
			});

			//----ELIMINAR Afiliado
			$('.btn_eliminar').click(function(){
				var boton = $(this);
				var id_afiliado = boton.data('id_afiliado');
				var fila = boton.closest('tr');
				swal({
					title: 'Eliminar',
					text: "¿Deseas eliminar el afiliado?",
					type: 'warning',
					showCancelButton: true,
					confirmButtonColor: '#c9302c',
					cancelButtonColor: '#d33',
					confirmButtonText: 'Eliminar'
				},function(){
					$.ajax({
						url: 'control/eliminar_normal.php',
						method: 'POST',
						dataType: 'JSON',
						data: {tabla: 'cliente', campo:'id_cliente', id_campo: id_afiliado}
					}).done(function(respuesta){
						if(respuesta.estatus == 'success'){
							fila.fadeOut(1000);
							cargarTabla();
							swal(
								'Correcto',
								'Se ha eliminado correctamente',
								'success'
							);
						}else{
							swal(
								'Error',
								'No se ha podido eliminar',
								'error'
							);
						}
					});
				});

			});

			//MOSTRAR MODAL PAGAR
			$('.btn_pagar').click(function(){
				$('#form_pago')[0].reset();
				var boton = $(this);
				var id_afiliado = boton.data('id_afiliado');
				$.ajax({
					url: 'control/buscar_normal.php',
					dataType: 'JSON',
					method: 'POST',
					data: {tabla: 'cliente', campo:'id_cliente', id_campo:id_afiliado}
				}).done(function(respuesta){
					if(respuesta.encontrado == 1){
						$.each(respuesta["fila"], function(name, value){
					$("#"+name+'_pago').val(value);

					});
					 if(respuesta.fila.estatus_cliente == 'ACTIVO'){
						 var date_dia_inicial = Date.parseExact(respuesta.fila.diacorte_cliente, "yyyy-MM-dd");

						$('#diains_cliente').val(date_dia_inicial.toString("dd/MM/yyyy"));
					 }
						$("#modal_pago").modal('show');
					}else{
					}
				});
			});

			//---PAGAR
			$('#form_pago').submit(function(event){
				event.preventDefault();
				var boton = $(this).find(':submit');
				var icono = boton.find('fa');
				var formulario = $(this);
				var id_turno = $('#input_turno').val();
				var id_usuario = $('#id_usuario').val();
				boton.prop('disabled',true);
				icono.toggleClass('fa-usd fa-spinner fa-spin fa-floppy-o');
				$.ajax({
					url: 'control/nuevo_pago.php',
					method: 'POST',
					dataType: 'JSON',
					data: formulario.serialize()+'&turno='+id_turno+'&id_usuario='+id_usuario
				}).done(function(respuesta){
					console.log(respuesta.mensaje);
					if(respuesta.estatus == 'success'){
						swal(
							'Correcto',
							'Se hizo el pago exitosamente',
							'success'
						);
						cargarTabla();
						window.location.href='imprimir_ticket.php?id_folio='+respuesta.folio_pago;
					}else{
						swal(
							'Error',
							'No se pudo realizar el pago, intentelo mas tarde',
							'error'
						);
						console.log(respuesta.mensaje);
					}
				}).always(function(){
					boton.prop('disabled',false);
					icono.toggleClass('fa-usd fa-spinner fa-spin fa-floppy-o');
				});
			});

			//----CAMBIAR AUTOMATICAMENTE LAS FECHAS
			$("#nombre_paquete").change( function colocarCosto(){
				seleccionado = $("#nombre_paquete option:selected");
				var periodo = seleccionado.data("periodo");
				var numero = seleccionado.data("numero");
				$("#costo_paquete").val(seleccionado.data("costo"));
				var fechaCorte = $('#diacorte_cliente');
				var date_fecha_inicio  =  Date.parseExact($('#diains_cliente').val(), "dd/MM/yyyy");

				switch (periodo){
					case "dias":
							var fechaVencimientoDia = date_fecha_inicio.add(numero).day();
							console.log('por dia: '+fechaVencimientoDia.toString('dd/MM/yyyy'));
							fechaCorte.val(fechaVencimientoDia.toString('dd/MM/yyyy'));
						break;
					case "semanas":
							var fechaVencimientoSemana = date_fecha_inicio.add(numero*7).day();
							console.log('por semana: '+fechaVencimientoSemana.toString('dd/MM/yyyy'));
							fechaCorte.val(fechaVencimientoSemana.toString('dd/MM/yyyy'));
						break;
					case "meses":
							var fechaHoy = date_fecha_inicio;
							var fechaVencimientoMes = date_fecha_inicio.add(numero).months();
							fechaCorte.val(fechaVencimientoMes.toString('dd/MM/yyyy'));
						break;
					case "años":
							var fechaVencimientoA = date_fecha_inicio.add(numero*6).months();
							var fechaVencimientoB = fechaVencimientoA.add(numero*6).months();
							fechaCorte.val(fechaVencimientoA.toString('dd/MM/yyyy'));
						break;
				}

			});

			$("#bus_num").keyup(function filtro_buscar(){
				var indice = $(this).data("indice");
				var valor_filtro = $(this).val();
				var num_rows = buscar(valor_filtro,'table_afiliados',indice);
				if(num_rows == 0){
					$('#mensaje').html("<div class='alert alert-warning text-center'><strong>No se ha encontrado.</strong></div>");
				}else{
					$('#mensaje').html('');
				}
			});
			$("#bus_num").change(function filtro_buscar(){
				var indice = $(this).data("indice");
				var valor_filtro = $(this).val();
				var num_rows = buscar(valor_filtro,'table_afiliados',indice);
				if(num_rows == 0){
					$('#mensaje').html("<div class='alert alert-warning text-center'><strong>No se ha encontrado.</strong></div>");
				}else{
					$('#mensaje').html('');
				}
			});
			$("#bus_nombre").keyup(function filtro_buscar(){
				var indice = $(this).data("indice");
				var valor_filtro = $(this).val();
				var num_rows = buscar(valor_filtro,'table_afiliados',indice);
				if(num_rows == 0){
					$('#mensaje').html("<div class='alert alert-warning text-center'><strong>No se ha encontrado.</strong></div>");
				}else{
					$('#mensaje').html('');
				}
			});
			$("#bus_estatus").change(function filtro_buscar(){
				var indice = $(this).data("indice");
				var valor_filtro = $(this).val();
				var num_rows = buscar(valor_filtro,'table_afiliados',indice);
				if(num_rows == 0){
					$('#mensaje').html("<div class='alert alert-warning text-center'><strong>No se ha encontrado.</strong></div>");
				}else{
					$('#mensaje').html('');
				} 
			});
			$("#bus_paquete").change(function filtro_buscar(){
				var indice = $(this).data("indice");
				var valor_filtro = $(this).val();
				var num_rows = buscar(valor_filtro,'table_afiliados',indice);
				if(num_rows == 0){
					$('#mensaje').html("<div class='alert alert-warning text-center'><strong>No se ha encontrado.</strong></div>");
				}else{
					$('#mensaje').html('');
				}
			});
	});
}


	//-----------------------BUSCAR-------------
		function buscar(filtro,table_id,indice) {
		  // Declare variables
		  var  filter, table, tr, td, i;
		  filter = filtro.toUpperCase();
		  table = document.getElementById(table_id);
		  tr = table.getElementsByTagName("tr");


		  // Loop through all table rows, and hide those who don't match the search query
		  for (i = 0; i < tr.length; i++) {
			td = tr[i].getElementsByTagName("td")[indice];
			if (td) {
			  if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
				tr[i].style.display = "";
			  } else {
				tr[i].style.display = "none";
			  }
			}
		  }
		  var num_rows = $(table).find('tbody tr:visible').length;
			return num_rows;
		}
