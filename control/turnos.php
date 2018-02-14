<?php
include('conexi.php');
$link = Conectarse();

$respuesta = array();

$consulta = "SELECT MAX(turno) AS turno FROM turnos";

if($result = mysqli_query($link,$consulta)){

	while($row = mysqli_fetch_row($result)){
		$respuesta['turno'] = $row[0];

		if($row[0] == null){
			$insertar = "INSERT INTO turno SET fecha_inicio_turno=CURDATE(), hora_inicio=CURTIME()";
			mysqli_query($link,$insertar);
		}	
	}

	$respuesta['estatus'] = 'success';
}else{
	$respuesta['estatus'] = 'error';
	$respuesta['mensaje'] = 'Error en la Consulta '.mysqli_error($link);
}

echo json_encode($respuesta);
?>