<?php 
	include("login/login_success.php");
    include ('control/conexi.php');
    $link = Conectarse();
    $activo = "principal";
	$consultarTurno = "SELECT * FROM turnos WHERE cerrado = 0";
	$resultTurno = mysqli_query($link,$consultarTurno) or die(mysqli_error($link));
	while($rowTurno = mysqli_fetch_assoc($resultTurno)){
		extract($rowTurno);
	}
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
	<?php include('styles.php')?>
</head>

<body>

    <div id="wrapper">
    
        <?php include('menu.php'); ?>    

        <div id="page-wrapper">
            <div class="container-fluid">
                <br>
                <div class="row hidden-print">
                    <div class="col-lg-4 col-md-6">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-sort-up fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge" id="nuevos_afiliados"></div>
                                        <div>Afiliados Nuevos</div>
                                    </div>
                                </div>
                            </div>
                            <a href="afiliados.php">
                                <div class="panel-footer">
                                    <span class="pull-left">Ver Detalles</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                     </div>
                     <div class="col-lg-4 col-md-6">
                        <div class="panel panel-green">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-sort fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge" id="activos_afiliados"></div>
                                        <div>Afiliados Activos</div>
                                    </div>
                                </div>
                            </div>
                            <a href="afiliados.php">
                                <div class="panel-footer">
                                    <span class="pull-left">Ver Detalles</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>       
                     <div class="col-lg-4 col-md-6">
                        <div class="panel panel-red">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-sort-down fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge" id="vencidos_afiliados"></div>
                                        <div>Afiliados Vencidos</div>
                                    </div>
                                </div>
                            </div>
                            <a href="afiliados.php">
                                <div class="panel-footer">
                                    <span class="pull-left">Ver Detalles</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
			</div>
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<ul class="nav nav-tabs hidden-print">
							<li class="active"><a data-toggle="tab" href="#ingresos"><i class="fa fa-angle-double-up"></i> Ingresos</a></li>
							<li><a data-toggle="tab" href="#egresos"><i class="fa fa-angle-double-down"></i> Egresos</a></li>
							<li><a data-toggle="tab" href="#grafica"><i class="fa fa-bar-chart"></i> Grafica</a></li>
						 </ul>
						<br>
						<div class="row visible-print">
							<div class="col-md-9 text-center">
								<h3 class="text-center">SISTEMA DE GIMASIO</h3>
								<br>Fecha: <?php echo date('j-m-y');?><br>
							</div>
						</div>
						
						  <div class="tab-content">
							<div id="ingresos" class="tab-pane fade in active">
								<div class="row" id="div_ingresos">
									<div class="col-md-8 col-md-offset-2">
										<div class="panel panel-default">
										  <div class="panel-heading">
											<div class="row">
												<div class="col-md-10">
													<h4 class="text-center">Ingresos del dia</h4>
												</div>
												<div class="col-md-2 text-center hidden-print">
													<button class="btn btn-default" id="btn_printingresos" title="Imprimir ingresos"><i class="fa fa-print"></i></button>
												</div>
											</div>
										  </div>
										  <div class="panel-body table-responsive">
											  <table class="table">
												  <thead>
													  <th class="text-center">Folio</th>
													  <th class="text-center">Nombre</th>
													  <th class="text-center">Concepto</th>
													  <th class="text-center">Cantidad</th>
													  <th class="text-center hidden-print">Acciones</th>
												  </thead>
												  <tbody>
														<?php

															$ingresos = "SELECT * FROM historial_pago LEFT JOIN cliente USING (id_cliente) WHERE turno='$turno'";

															$result = mysqli_query($link, $ingresos) or die ('Error en la DB '.mysqli_error($link));

															while($row = mysqli_fetch_assoc($result)){
																extract($row);
																if($des_historial == "CANCELADO"){
																	
																}else{
																	$totalDia[] = $cantidad_pagada;
																}
														?>
													  <tr>
															<td class="text-center"><?php echo $id_historial; ?></td>
															<td class="text-center"><?php echo $nombre_cliente; ?></td>
															<td class="text-center"><?php echo $concepto_pago; ?></td>
															<td class="text-center">$<?php echo $cantidad_pagada; ?></td>
															<td class="text-center hidden-print">
																<?php
																	if($des_historial == "CANCELADO"){
																		echo "CANCELADO";
																	}else{
																	?>	
																	
																<button class="btn btn-danger btn-cancelarIngreso" data-id_historial="<?php echo $id_historial;?>" title="Cancelar pago"><li class="fa fa-trash"></li></button>
																<?php
																	}
																?>
															</td>
													  </tr>
													  <?php } ?>
													  <tr>
														<td colspan="3" class="text-right"><strong>TOTAL</strong></td>
														<td class="text-center">
															<?php 
																if(isset($totalDia)){
																   echo '$'.array_sum($totalDia); 
																}else{
																
																}
															 ?>
														</td>
													  </tr>
												  </tbody>
											  </table>
										  </div>
										</div>
									</div>
								</div>
							</div>
							<div id="egresos" class="tab-pane fade">
								<div class="row" id="div_egresos">
									<div class="col-md-8 col-md-offset-2">
										<div class="panel panel-default">
										  <div class="panel-heading">
											<div class="row">
												<div class="col-md-10">
													<h4 class="text-center">Egresos del dia</h4>
												</div>
												<div class="col-md-1 text-center hidden-print">
													<button class="btn btn-default" id="btn_printegresos" title="Imprimir egresos"><i class="fa fa-print"></i></button>
												</div>
												<div class="col-md-1 text-center hidden-print">
													<button class="btn btn-success" id="btn_nuevoegresos" title="Nuevo egreso"><i class="fa fa-plus"></i></button>
												</div>
											</div>
										  </div>
										  <div class="panel-body table-responsive text-center" id="div_tabla_egresos">
											  <table class="table">
												  <thead>
													  <th class="text-center">Descripcion</th>
													  <th class="text-center">Area</th>
													  <th class="text-center">Cantidad</th>
													  <th class="text-center hidden-print">Acciones</th>
												  </thead>
												  <tbody>
														<?php

															$egresos = "SELECT * FROM egresos WHERE turno='$turno'";

															$result_egresos = mysqli_query($link, $egresos) or die ('Error en la DB '.mysqli_error($link));

															while($row_egresos = mysqli_fetch_assoc($result_egresos)){
																extract($row_egresos);
																if($estatus_egreso == "CANCELADO"){
																	
																}else{
																$totalDiaEgresos[] = $cantidad_egreso;
																}
														?>
													  <tr>
															<td class="text-center"><?php echo $descripcion_egreso; ?></td>
															<td class="text-center"><?php echo $area_egreso; ?></td>
															<td class="text-center">$<?php echo $cantidad_egreso; ?></td>
															<td class="text-center hidden-print">
															<?php 
															if($estatus_egreso == "CANCELADO"){
																echo 'CANCELADO';
															}else{
															?>
																<button class="btn btn-danger btn-cancelarEgreso" data-id_egreso="<?php echo $id_egreso;?>" title="Cancelar egreso"><li class="fa fa-trash"></li></button>
															</td>
															<?php 
															}
															?>
													  </tr>
													  <?php } ?>
													  <tr>
														<td colspan="2" class="text-right"><strong>TOTAL</strong></td>
														<td class="text-center">
															<?php 
																if(isset($totalDiaEgresos)){
																   echo '$'.array_sum($totalDiaEgresos); 
																}else{
																
																}
															 ?>
														</td>
													  </tr>
												  </tbody>
											  </table>
										  </div>
										</div>
									</div>
								</div>
							</div>
							<div id="grafica" class="tab-pane fade">
								<div class="row">
									<div id="container" style="width:100%; height:400px;"></div>
								</div>
							</div>
							
						  </div>
						</div>
					</div>
			</div>
				
              
				<div class="row hidden-print">
					<div class="col-md-8 col-md-offset-2">
						<hr>
								<h3 class="text-center" id="total">Total <?php 
									if(isset($totalDia) && !isset($totalDiaEgresos)){
										echo '$'.array_sum($totalDia);
									}else if(!isset($totalDia) && isset($totalDiaEgresos)){
										
									}else if(isset($totalDia) && isset($totalDiaEgresos)){
										echo '$'.(array_sum($totalDia) - array_sum($totalDiaEgresos));										
									}else{
										echo "0";
									}
									?>
								</h3>
							
					</div>
				</div>
            
            </div>
        <!-- /#page-wrapper -->

        </div>
    <!-- /#wrapper -->
	<?php include('forms/egresos.php');?>
    <?php include('scripts.php') ?>
	<script src="https://code.highcharts.com/highcharts.src.js"></script>
    <script src="js/drashboard.js"></script>

</body>

</html>
