<?php 
	include('login/login_success.php');
    include('control/conexi.php');
    $link = Conectarse();
    $activo = "reportes";
	
	$folio = $_GET['folio'];
?>
<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Sistema Gimnasio">
    <meta name="author" content="Marco Ortega">
		<style>
		@media print{
			#page-wrapper{
				position: relative;
				bottom: 120px;
			}
		}
		</style>
    <title>Detalles</title>
	<?php include('styles.php'); ?>
</head>

<body>

    <div id="wrapper">
    
        <?php include('menu.php'); ?>    

        <div id="page-wrapper">
		
		<div class="row">
			<div class="col-md-12">
				<div class="page-header">
					<div class="alert alert-default text-center">
						<h3>Reporte del dia 	
							<?php
								$consul = "SELECT * FROM turnos LEFT JOIN usuarios USING(id_usuario) WHERE turno ='".$folio."' ";
								$result = mysqli_query($link,$consul);
								$row = mysqli_fetch_assoc($result);
								extract($row);
								echo date("d-m-Y",strtotime($fecha_cierre_turno));
							?>
						</h3>
					</div>
				</div>
			</div>
		</div>
            <div class="container-fluid">
                <div class="row" id="tabla_reporte">
                    <div class="col-md-6">
                        <div class="panel panel-info hidden-print" id="panel_ingresos">
							<div class="panel-heading">
								<h4 class="text-center"> Ingresos
									<span class="pull-right">	
										<button class="btn btn-info hidden-print" id="btn_ingresos" type="button" title="imprimir ingresos">
												<i class="fa fa-print" ></i>
										</button>	
									</span>
								</h4>
							</div>
							<div class="panel-body hidden-print" id="body_ingresos">
								<div class="table-responsive" id="">
									<table class="table table-hover">
										<tr>
											<th class="text-center">Nombre</th>
											<th class="text-center">Concepto</th>
											<th class="text-center">Pago</th>
										</tr>
										<?php
											
											$consul_ingresos = "SELECT * FROM historial_pago LEFT JOIN cliente USING(id_cliente) WHERE turno ='".$folio."'";
											$result_ingreesos = mysqli_query($link,$consul_ingresos);
												
											while($row_ingresos=mysqli_fetch_assoc($result_ingreesos)){
												extract($row_ingresos);
												$total_ingresos[] = $cantidad_pagada;
										?>
										<tr>
											<td class="text-center"><?php echo $nombre_cliente;?></td>
											<td  class="text-center"><?php echo $concepto_pago;?></td>
											<td  class="text-center"><?php echo '$'.$cantidad_pagada;?></td>
										</tr>
										<?php
											}
										?>
										<tr>
											<td colspan="2" class="text-right"><strong>TOTAL</strong></td>
											<td class="text-center">
												<?php
													echo '$'.array_sum($total_ingresos); 
												 ?>
											</td>
                                      </tr>
									</table>
								</div>
							</div>
						</div>
                    </div>
					
					<div class="col-md-6 ">
						<div class="panel panel-info hidden-print" id="panel_egresos">
							<div class="panel-heading " >
								<h4 class="text-center">Egresos
									<span class="pull-right">	
										<button class="btn btn-info" id="btn_egresos" type="button" title="imprimir egresos">
												<i class="fa fa-print" ></i>
										</button>	
									</span>
								</h4>
							</div>
							<div class="panel-body hidden-print" id="body_egresos">
								<div class="table-responsive" >
									<table class="table table-hover">
										<tr>
											<th class="text-center">Descripcion</th>
											<th class="text-center">Area</th>
											<th class="text-center">Pago</th>
										</tr>
										<?php
											$consulta_egresos = "SELECT * FROM egresos WHERE turno = '".$folio."'";
											$result_egresos = mysqli_query($link,$consulta_egresos);
												
											while($row_egresos = mysqli_fetch_assoc($result_egresos)){
												extract($row_egresos);
												$total_egresos[] = $cantidad_egreso;
										?>
										<tr>
											<td class="text-center"><?php echo $descripcion_egreso;?></td>
											<td  class="text-center"><?php echo $area_egreso;?></td>
											<td  class="text-center"><?php echo '$'.$cantidad_egreso;?></td>
										</tr>
										<?php
											}
										?>
										<tr>
											<td colspan="2" class="text-right"><strong>TOTAL</strong></td>
											<td class="text-center">
												<?php 
													echo '$'.array_sum($total_egresos); 
												 ?>
											</td>
                                      </tr>
									</table>
								</div>
							</div>
						</div>
					</div>
                </div>
               <div class="row">
					<div class="col-md-12">
						<div class="page-header">
							<div class="alert alert-warning text-center">
								<h4>BALANCE TOTAL</h4>
								<h4>
									<?php 
										echo '$'.(array_sum($total_ingresos) - array_sum($total_egresos));
									?>
								</h4>
							</div>
						</div>
					</div>
				</div>
            </div>
			<!-- /#page-wrapper --> 
		</div>
		<!-- /#wrapper -->
	</div>
	<?php include('scripts.php');?>
     <script src="js/reporte_detalles.js"></script>
</body>
</html>