<?phpheader("Content-Type: application/json");$response= array();include("../control/conexi.php");$link=Conectarse();$myusername=$_POST['usuario'];$mypassword=$_POST['password']; // To protect mysqli injection (more detail about mysqli injection)$myusername = stripslashes($myusername);$mypassword = stripslashes($mypassword);/* $myusername = mysqli_real_escape_string($myusername);$mypassword = mysqli_real_escape_string($mypassword); */$sql="SELECT * FROM usuarios	WHERE usuario='$myusername' AND pass='$mypassword'";$result=mysqli_query($link, $sql);	if (!$result){		 die('Error: ' . mysqli_error($link));	}$count=mysqli_num_rows($result);// Si la consulta devuelve 1 fila inicia la sesionif($count==1){	session_start();	session_regenerate_id(true);	$id_sesion = session_id();	$row = mysqli_fetch_assoc($result);		$id_usuario = $row['id_usuario'];	$usuario = $row['usuario'];	$permisos = $row['permisos'];		$_SESSION["id_usuario"] = $id_usuario or die("Error al asignar id usuario");	$_SESSION["usuario"] = $usuario or die("Error al iniciar usuario");	$_SESSION["permisos"] = $permisos or die("Error al iniciar permisos");		$response["login"] = 'valid';}else{	$response["login"] = "invalid";	$response["mensaje"] = "Usuario y/o Contraseña Inválidos";}$response["query"] = $sql;echo json_encode($response);?>