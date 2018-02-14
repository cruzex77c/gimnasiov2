<?php
include('conexi.php');
$link = Conectarse();
$respuesta = array();

$turno = $_POST['turno'];
$descripcion_egresos = $_POST['descripcion_egresos'];
$cantidad_egresos = $_POST['cantidad_egresos'];
$area_egresos = $_POST['area_egresos'];

$consulta = "INSERT INTO egresos SET
descripcion_egreso='$descripcion_egresos',
cantidad_egreso='$cantidad_egresos',
turno='$turno',
area_egreso='$area_egresos',
fecha_egreso=CURDATE(),
hora_egreso=CURTIME()
";

if(mysqli_query($link,$consulta)){
	$respuesta['estatus'] = 'success';
}else{
	$respuesta['estatus'] = 'error';
	$respuesta['error'] = 'Error en '.$consulta.mysqli_error($link);
}

echo json_encode($respuesta);
 ?>