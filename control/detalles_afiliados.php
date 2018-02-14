<?php 
include ('conexi.php');
$link = Conectarse();
$respuesta = array();

$nuevos_afiliados = "SELECT count(id_cliente) as nuevos FROM cliente WHERE diains_cliente = CURDATE()";
$activos_afiliados = "SELECT count(id_cliente) as activos FROM cliente WHERE estatus_cliente ='ACTIVO'";
$vencidos_afiliados = "SELECT count(id_cliente) as vencidos FROM cliente WHERE estatus_cliente ='VENCIDO'";

$resultActivos = mysqli_query($link,$activos_afiliados);
if($resultActivos){
	while($filaActivos=mysqli_fetch_assoc($resultActivos)){
			$respuesta['estatus'] = 'success';
			$respuesta['activos'] = $filaActivos['activos'];
		}
}else{
		$respuesta['estatus'] = 'error';
		$respuesta['mensaje'] = 'Error en '.mysqli_error($link);
}

$resultVencidos = mysqli_query($link,$vencidos_afiliados);
if($resultVencidos){
	while($filaActivos=mysqli_fetch_assoc($resultVencidos)){
			$respuesta['estatus'] = 'success';
			$respuesta['vencidos'] = $filaActivos['vencidos'];
		}
}else{
		$respuesta['estatus'] = 'error';
		$respuesta['mensaje'] = 'Error en '.mysqli_error($link);
}

$resultNuevos = mysqli_query($link,$nuevos_afiliados);
if($resultNuevos){
	while($filaActivos=mysqli_fetch_assoc($resultNuevos)){
			$respuesta['estatus'] = 'success';
			$respuesta['nuevos'] = $filaActivos['nuevos'];
		}
}else{
		$respuesta['estatus'] = 'error';
		$respuesta['mensaje'] = 'Error en '.mysqli_error($link);
}

echo json_encode($respuesta);

?>