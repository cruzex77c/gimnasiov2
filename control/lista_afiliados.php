<?php
	include('conexi.php');
	$link = Conectarse();
	$consulta = "SELECT
						*
					FROM
						cliente
					LEFT JOIN (
						SELECT
							id_cliente,
							concepto_pago,
							max(fecha_historial) AS ultimo_pago
						FROM
							historial_pago
						GROUP BY
							id_cliente
					) AS ultimos_pagos
					USING (id_cliente)  WHERE tipo_cliente='AFILIADO'";
	$result = mysqli_query($link,$consulta);
	$num_rows = mysqli_num_rows($result);
	if($num_rows  < 1){
?>
	<br>
	<br>
	<div class="alert alert-warning text-center">
		<strong>No hay afiliados registrados</strong>
	</div>
<?php
	}else{


?>
<table class="table table-hover" id="table_afiliados">
	<thead>
		<tr>
			<th class="text-center">No. Afiliado</th>
			<th class="text-center">Nombre</th>
			<th class="text-center">Estatus</th>
			<th class="text-center">Dia inicio</th>
			<th class="text-center">Dia vencimiento</th>
			<th class="text-center">Paquete</th>
			<th class="text-center">Acciones</th>
		</tr>
		<tr>
			<th class="text-center">
				<input type="number" min="1" id="bus_num" class="form-control" placeholder="No" data-indice="0">
			</th>
			<th class="text-center">
				<input type="text" id="bus_nombre" class="form-control" placeholder="Buscar por nombre" data-indice="1">
			</th>
			<th class="text-center">
				<select class="form-control" id="bus_estatus" data-indice="2">
					<option value="">Todos</option>
					<option value="NUEVO">Nuevo</option>
					<option value="ACTIVO">Activo</option>
					<option value="VENCIDO">Vencido</option>
				</select>
			</th>
			<th class="text-center"></th>
			<th class="text-center"></th>
			<th class="text-center">
				<select id="bus_paquete" class="form-control" data-indice="5">
					<option value="">Todos</option>
					<?php
						$consultar_paquetes = "SELECT * FROM paquetes";
						$result_paquetes = mysqli_query($link,$consultar_paquetes);
						while($row_paquetes = mysqli_fetch_assoc($result_paquetes)){
							$nombre_paquete = $row_paquetes['nombre_paquete'];
					?>
					<option value="<?php echo $nombre_paquete; ?>"><?php echo $nombre_paquete; ?></option>
					<?php
						}
					?>
				</select>
			</th>
			<th class="text-center">Acciones</th>
		</tr>
	</thead>
	<tbody>
	<?php
		while($row = mysqli_fetch_assoc($result)){
			extract($row);
			switch($estatus_cliente){
				case 'VENCIDO':
					$color_fila = 'danger';
				break;
				case 'ACTIVO':
					$color_fila = 'success';
				break;
				case 'NUEVO':
					$color_fila = 'default';
				break;
			}
?>

		<tr class="<?php echo $color_fila; ?>">
			<td class="text-center"><?php echo $id_cliente;?></td>
			<td class="text-center"><a href="detalles_afiliado.php?id_afiliado=<?php echo $id_cliente; ?>"><?php echo $nombre_cliente;?></a></td>
			<td class="text-center"><?php echo $estatus_cliente;?></td>
			<td class="text-center"><?php echo ($diains_cliente != "") ? date("d/m/Y",strtotime($diains_cliente)) : "";?></td>
			<td class="text-center"><?php echo ($diacorte_cliente != "") ? date("d/m/Y",strtotime($diacorte_cliente)) : "";?></td>
			<td class="text-center"><?php echo $concepto_pago;?></td>
			<td class="text-center">
				<button data-id_afiliado="<?php echo $id_cliente; ?>" class="btn btn-warning btn_editar"><i class="fa fa-pencil"></i></button>
				<button data-id_afiliado="<?php echo $id_cliente; ?>" class="btn btn-success btn_pagar"><i class="fa fa-usd"></i></button>
				<button data-id_afiliado="<?php echo $id_cliente; ?>" class="btn btn-danger btn_eliminar"><i class="fa fa-trash"></i></button>
			</td>
		</tr>
<?php
		}
	}
 ?>
	</tbody>
</table>
<div id="mensaje">
</div>
