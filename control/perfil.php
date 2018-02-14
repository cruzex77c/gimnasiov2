<?php
include('conexi.php');
$link = Conectarse();
$respuesta = array();
$id_usuario = $_POST['id_usuario'];

$consulta = "SELECT * FROM usuarios LEFT JOIN staff USING(id_staff) WHERE id_usuario='$id_usuario'";

$mensaje_error = 'no encontrado';

$result_complete = mysqli_query($link, $consulta)
or die ("Error al ejecutar consulta: $consulta".mysql_error($link));

$numero_filas = mysqli_num_rows($result_complete);
$contador = 0;

while($fila = mysqli_fetch_assoc($result_complete)){
	$contador++;

	$respuesta["fila"] = $fila;	
}

$respuesta['numero_filas'] = "$numero_filas";

$respuesta['mensaje'] = $numero_filas < 1 ? $mensaje_error:'OK';
$respuesta["encontrado"] =  $numero_filas < 1 ? 0 : 1;

print(json_encode($respuesta));


?>
