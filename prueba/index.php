<?php 
    include ('../control/conexi.php');
    $link = Conectarse();
	
?>
<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Sistema Gimnasio">
    <meta name="author" content="Marco Ortega">

    <title>PRINCIPAL</title>
	<link href="../css/bootstrap.min.css" rel="stylesheet">
	<link href="../css/jquery-ui-1.10.3.custom.css" rel="stylesheet" type="text/css">
    
</head>

<body>
 
<br>
	<div class="container">
		<div class="row">
				<div class="col-md-12">
					<h1 class="text-center">Ejemplo</h1>
					<hr>
				</div>
		</div>
		<div class="row">
			<div class="col-md-6 col-md-offset-3">	
				<label for="">Controlador:</label>
				<input type="text" id="input" class="form-control">
			</div>
		</div>
		<br>
		<div class="row">
			<div class="col-md-6 col-md-offset-3">
				<div class="text-center">
					<button class="btn" id="btn1">Boton 1</button>
					<button class="btn" id="btn2">Boton 2</button>
					<button class="btn" id="btn3">Boton 3</button>
				</div>
			</div>
		</div>
		<br>
		<div class="row">
			<div class="col-md-6 col-md-offset-3">
				<input type="text" id="input2"> 
			</div>
		</div>
	</div>

	<script type="text/javascript" src="../js/jquery.js"></script>
	<script src="../js/jquery-ui-1.10.3.custom.min.js"></script>
	<script src="../js/bootstrap.min.js"></script>
	<script>
	$(document).ready(function(){
		
		$('#btn1').click(function(){
			$('#input2').val('1');
		});
		$('#btn2').click(function(){
			$('#input2').val('2');
		});
		
		$('#btn3').click(function(){
			$('#input').val('');
		});
		
	});
	</script>

</body>

</html>
