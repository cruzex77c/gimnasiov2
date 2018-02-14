<?php 
include('conexi.php');
$link = Conectarse();
$respuesta = array();
$tabla = $_POST['tabla'];
$campo = $_POST['campo'];
$id_campo = $_POST['id_campo'];
$id_valor = $_POST['id_valor'];
$valor = $_POST['valor'];

$consulta = "UPDATE $tabla SET $campo='$valor' WHERE $id_campo='$id_valor'";

if(mysqli_query($link,$consulta)){
	$respuesta['estatus'] = 'success';
}else{
	$respuesta['estatus'] = 'error';
	$respuesta['mensaje'] = 'Error en '.$consulta.mysqli_error($link);
}

echo json_encode($respuesta);
?>