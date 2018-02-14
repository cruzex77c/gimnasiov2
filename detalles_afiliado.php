<?php
	include('login/login_success.php');
    include('control/conexi.php');
    $link = Conectarse();
    $activo = "afiliados";
?>
<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Sistema Gimnasio">
    <meta name="author" content="Marco Ortega">

    <title>Afiliados</title>
	<?php include('styles.php'); ?>
</head>

<body>
    <div id="wrapper">

        <?php include('menu.php'); ?>

        <div id="page-wrapper">
            <div class="container-fluid">
				<?php
					$id_afiliado = $_GET['id_afiliado'];
					$consul_cliente = "SELECT * FROM cliente WHERE id_cliente ='".$id_afiliado."'";
					$result_cliente = mysqli_query($link,$consul_cliente);
					while($row_afiliado=mysqli_fetch_assoc($result_cliente)){
						extract($row_afiliado);
					}
				?>
				<br>
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-primary">
							<div class="panel-heading">
								<h4 class="text-center"> Datos personales</h4>
							</div>
							<div class="panel-body">
								<div class="row">
									<div class="col-sm-2">
										<div class="form-group">
											<label for="id_cliente">Numero de socio:</label>
											<input readonly type="text" class="form-control" name="id_cliente" id="id_cliente" value="<?php echo $id_cliente;?>">
										</div>
									</div>
									<div class="col-sm-6">
										<div class="form-group">
											<label for="">Nombre:</label>
											<input readonly type="text" class="form-control" name="" id="" value="<?php echo $nombre_cliente; ?>">
										</div>
									</div>
									<div class="col-sm-4">
										<div class="form-group">
											<label for="">fecha de nacimiento:</label>
											<input readonly type="text" class="form-control" name="" id="" value="<?php echo $fechanacimiento_cliente;?>">
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-sm-2">
										<label for="">Edad:</label>
										<input readonly type="text" class="form-control" name="" id="" value="<?php echo $edad_cliente;?>">
									</div>
									<div class="col-sm-4">
										<label for="">Sexo:</label>
										<input readonly type="text" class="form-control" name="" id="" value="<?php echo $sexo_cliente;?>">
									</div>
									<div class="col-sm-6">
										<label for="">Telefono:</label>
										<input readonly type="tel" class="form-control" name="" id="" value="<?php echo $tel_cliente;?>">
									</div>
								</div>
								<div class="row">
									<div class="col-sm-6">
										<label for="">Telefon de referencia:</label>
										<input readonly type="tel" class="form-control" name="" id="" value="<?php echo $telrefe_cliente;?>">
									</div>
									<div class="col-sm-6">
										<label for="">Correo Electronico:</label>
										<input readonly type="email" class="form-control" name="" id="" value="<?php echo $correo_cliente;?>">
									</div>
								</div>
							</div>
						</div>
                    </div>
				</div>
					<?php
						$q_cliente ="SELECT * FROM cliente RIGHT JOIN historial_pago USING (id_cliente) WHERE id_cliente = '".$id_cliente."'";

						$result_cliente= mysqli_query($link,$q_cliente);
						$count_rows = mysqli_num_rows($result_cliente);
						if($count_rows < 1){
					?>
					<br>
					<br>
					<div class="alert alert-warning text-center">
					  <strong>No hay historial de pagos de este afiliado</strong>
					</div>
				<?php
				}else{
				?>
				<div class="row">
					<div class="col-md-12">
						<div class="panel panel-primary">
							<div class="panel-heading">
								<h4 class="text-center">Historial de pagos</h4>
							</div>
							<div class="panel-body">
								<div class="table-responsive" id="">
									<table class="table table-hover">
										<tr>
											<th class="text-center">Folio</th>
											<th class="text-center">Paquete</th>
											<th class="text-center">Precio</th>
											<th class="text-center">Nombre</th>
											<th class="text-center">Dia de pago</th>
											<th class="text-center">Dia de corte</th>
											<th class="text-center">Acciones</th>
										</tr>
										<?php
											$consulta_cliente ="SELECT * FROM cliente RIGHT JOIN historial_pago USING (id_cliente) WHERE id_cliente = '".$id_afiliado."'";
											$result_cliente=mysqli_query($link,$consulta_cliente);

											while($row_cliente = mysqli_fetch_assoc($result_cliente)){
												extract($row_cliente);

										?>
										<tr>
											<td class="text-center"><?php echo $id_historial;?></td>
											<td  class="text-center"><?php echo $concepto_pago;?></td>
											<td  class="text-center"><?php echo $cantidad_pagada;?></td>
											<td  class="text-center"><?php echo $nombre_cliente;?></td>
											<td  class="text-center"><?php
												if($diains_cliente != ""){
													echo date("d/m/Y",strtotime($fecha_historial));
												}
												?>
											</td>
											<td  class="text-center"><?php
												if($diacorte_historial != ""){
													echo date("d/m/Y",strtotime($diacorte_historial));
												}
												?>
											</td>
											<td  class="text-center">
												<a class="btn btn-info" href="imprimir_ticket.php?id_folio=<?php echo $id_historial;?>">
													<i class="fa fa-print"></i>
												</a>
											</td>
										</tr>
										<?php
											}
										?>
									</table>
								</div>
							</div>
						</div>
					</div>
					<?php
						}
					?>
                </div>
            </div>
			<!-- /#page-wrapper -->
		</div>
		<!-- /#wrapper -->
	</div>
	<?php include('scripts.php');?>
    <!--<script src="js/detalles_afiliado.js"></script>-->
</body>
</html>
