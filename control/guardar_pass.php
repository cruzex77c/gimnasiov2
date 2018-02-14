<?php 
include('conexi.php');
$link = Conectarse();

$respuesta = array();

$id_usuario = $_POST['id_usuario'];
$usuario = $_POST['usuario'];
$pass = $_POST['pass'];

$consulta = "UPDATE usuarios SET usuario='$usuario', pass='$pass' WHERE id_usuario='$id_usuario'";

if(mysqli_query($link,$consulta)){
	$respuesta['estatus'] = 'success';
}else{
	$respuesta['estatus'] = 'error';
	$respuesta['error'] = 'Error en '.$consulta.mysqli_error($link);
}

echo json_encode($respuesta);
?>

