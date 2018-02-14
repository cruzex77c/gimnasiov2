<?php
	include('conexi.php');
	$link = Conectarse();
	$respuesta = array();
	
	$id_cliente = $_POST['id_cliente'];
	$diains_cliente = $_POST['diains_cliente'];
	$diacorte_cliente = $_POST['diacorte_cliente'];
	$nombre_paquete = $_POST['nombre_paquete'];
	$costo_paquete = $_POST['costo_paquete']; 
	$turno = $_POST['turno'];
	$id_usuario = $_POST['id_usuario'];
	
	$consulta1 = "INSERT INTO
	historial_pago
	SET 
	id_historial='',
	id_cliente = '$id_cliente', 
	id_usuario = '$id_usuario',
	concepto_pago = '$nombre_paquete',
	cantidad_pagada = '$costo_paquete',
	 fecha_historial = CURDATE(), 
	 hora_historial = CURTIME(), 
	 turno = '$turno',
	 diacorte_historial=STR_TO_DATE('$diacorte_cliente', '%d/%m/%Y')";


	if(mysqli_query($link, $consulta1)){
		
			$respuesta["estatus"] = "success";
			$respuesta["folio_pago"] = mysqli_insert_id($link);
			
			$consulta2 = "UPDATE 
			cliente 
			SET
			diains_cliente = STR_TO_DATE('$diains_cliente', '%d/%m/%Y') ,
			diacorte_cliente= STR_TO_DATE('$diacorte_cliente', '%d/%m/%Y'),
			estatus_cliente = 'ACTIVO' 
			WHERE 
			id_cliente = '".$id_cliente."'";

			if(mysqli_query($link, $consulta2)){
				
					$respuesta["estatus"] = "success";
			}else{
					$respuesta["estatus"] = "error";
					$respuesta["mensaje"] = "Error en: ".$consulta2.mysqli_error($link);		
			}
			
	}else{
			$respuesta["estatus"] = "error";
			$respuesta["mensaje"] = "Error en: ".$consulta1.mysqli_error($link);		
	}

	
	
	echo json_encode($respuesta);
?>