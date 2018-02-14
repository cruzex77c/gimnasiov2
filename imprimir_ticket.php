<?php 
	include("login/login_success.php");
	include("control/conexi.php");
	$link = Conectarse();
	$activo = "";
	$id_folio = $_GET['id_folio'];
	$consultaHistoriasPago = "SELECT * FROM historial_pago
									LEFT JOIN cliente USING(id_cliente)
									LEFT JOIN usuarios USING(id_usuario)
									LEFT JOIN staff USING(id_staff)
									WHERE id_historial = '$id_folio'";
	$resultadoHistorialPago = mysqli_query($link,$consultaHistoriasPago);
	while($row_HP = mysqli_fetch_assoc($resultadoHistorialPago)){
		extract($row_HP);

	}
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<title>Imprimir ticket</title>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Sistema Gimnasio">
    <meta name="author" content="Marco Ortega">
	<?php include('styles.php'); ?>
	<link href="css/imprimir_ticket.css" rel="stylesheet" media="all">
</head>
<body>
	<div id="wrapper">
        <?php include('menu.php'); ?>  
        <div id="page-wrapper">
			<div class="container-fluid text-center hoja">   
				<br>
				<div class="row header">
					<div class="col-xs-12 text-center">
						<img src="imagenes/logo.png" class="img-responsive">
					</div>
				</div>
				<div class="row cuerpo">
					<div class="col-xs-12">
						<h4 class="text-center">OMWEB<br>FITNESS</h4>
					</div>
					<hr>
					<div class="folio">
						No.Folio <?php echo $id_historial;?><br><br>
					</div>
					<div class="fecha">
						<strong>Fecha: </strong><?php echo date("d/m/Y", strtotime($fecha_historial));?><br>
						<strong>Usuario: </strong><?php echo $nombre_staff;?>
					</div>
					<br>
					
					<div class="col-xs-12 contenido">
					<br>
						<div class="text-left">
							<strong> Cliente: </strong>
							<i><?php echo $nombre_cliente;?></i>
							<br>
							<u>
								<i>
									<strong>Conceptos: </strong>
									<div class="row">
										<div class="col-xs-8">
											<?php echo $concepto_pago;?>
										</div>
										<div class="col-xs-4 text-right">
											$<?php echo number_format($cantidad_pagada);?>
										</div>
									</div>
								</i>
							</u>
							<hr>
							<div class="row">
								<div class="col-xs-8">
									<b>Total: </b>
								</div>
								<div class="col-xs-4 text-right">
									$<?php echo number_format($cantidad_pagada);?>
									<input id="cantidad_pagada" class="hidden" value="<?php echo $cantidad_pagada;?>">
								</div>
							</div>
							<br>
							<i><u>(<span id="total_texto"></span>/100 M.N).</u></i>
						</div>
					</div>
				</div>
				<div class="text-center footer">
					<br>
				</div>
			</div>
			<!-- /#page-wrapper --> 
		</div>
		<!-- /#wrapper -->
	</div>
	<?php include('scripts.php');?>
	<script src="js/numerosLetras.js"></script>
	<script>
		$(document).ready(function(){
			var total_final = $('#cantidad_pagada').val();
			$('#total_texto').text(NumeroALetras(total_final));
		});
	</script>
</body>
</html>