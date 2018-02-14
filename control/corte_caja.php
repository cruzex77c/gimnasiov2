<?php 
include('conexi.php');
$link = Conectarse();

$respuesta = array();

$turno = $_POST['cerrarTurno'];
$id_usuario = $_POST['id_usuario'];
$consultarTotal = "select sum(cantidad_pagada) as total from historial_pago where turno='$turno'";
$resultTotal = mysqli_query($link,$consultarTotal);
while($rowTotal = mysqli_fetch_assoc($resultTotal)){
	extract($rowTotal);
}

$consulta = "UPDATE turnos SET fecha_cierre_turno=CURDATE(), hora_fin=CURTIME(), saldo_final='$total', id_usuario='$id_usuario', cerrado=1";

if(mysqli_query($link,$consulta)){
	$respuesta['estatus'] = "success";
}else{
	$respuesta['estatus'] = "error";
	$respuesta['mensaje'] = "error en ".$consulta.mysqli_error($link);
}

echo json_encode($respuesta);
?>