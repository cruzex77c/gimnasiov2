<?php
	include("conexi.php");
	$link = Conectarse();
	
	$fecha_inicial = $_POST['fecha_inicial'];
	$fecha_final = $_POST['fecha_final'];
	
	$consulta_fechaTurno = "SELECT * FROM turnos LEFT JOIN  usuarios USING (id_usuario) WHERE fecha_cierre_turno BETWEEN '$fecha_inicial' AND '$fecha_final' ";
	$resultado_fechaTurno = mysqli_query($link,$consulta_fechaTurno);
	
	$contar_row = mysqli_num_rows($resultado_fechaTurno);
	
	if($contar_row < 1){
		?>
			<br>
			<br>
			<div class="alert alert-warning text-center">
				<strong>No hay ingresos en estas fechas</strong>
			</div>
	<?php
	}else{
		?>
				<div class="table-responsive" id="div_table">
					<table class="table table-hover" id="reporte">
						<thead>
							<tr>
								<th class="text-center">Folio</th>
								<th class="text-center">Fecha</th>
								<th class="text-center">Hora</th>
								<th class="text-center">Usuario</th>
								<th class="text-center">Ingreso</th>
								<th class="text-center hidden-print">Acciones</th>
							</tr>
						</thead>
						<tbody>
							<?php
								while($row = mysqli_fetch_assoc($resultado_fechaTurno)){
									extract($row);
									$total[] = $saldo_final;
							?>
								<tr>
									<td class="text-center"><?php echo $turno;?></td>
									<td class="text-center"><?php echo date("d-m-Y",strtotime($fecha_cierre_turno));?></td>
									<td class="text-center"><?php echo $hora_fin;?></td>
									<td class="text-center"><?php echo $usuario;?></td>
									<td class="text-center"><?php echo '$'.$saldo_final;?></td>
									<td class="text-center">
										<a  class="btn btn-default hidden-print" title="Ver detalles" href="reporte_detalles.php?folio=<?php echo $turno;?>">
										<i class="fa fa-eye"></i></a>
									</td>
								</tr>
							<?php
								}
							?>
							<tr>
								<td colspan="4" class="text-right"><strong>Total</strong></td>
								<td class="text-center">
									<?php 
										echo '$'.array_sum($total);
									?>
								</td>
							</tr>
						</tbody>
					</table>
				</div>
		<?php
	}
	
?>