<?php 
	include('conexi.php');
	$link = Conectarse();
?>
<table  class="table">
	<thead>
		<tr>
			<th class="text-center">Id</th>
			<th class="text-center">Nombre</th>
			<th class="text-center">Precio</th>
			<th class="text-center">Cantidad</th>
			<th class="text-center">Periodo</th>
			<th class="text-center">Acciones</th>
		</tr> 
	</thead>
	<tbody>
		<?php 
			$consulta = "SELECT * FROM  paquetes";
			$resultado = mysqli_query($link,$consulta) or die ("Error en la BD $consulta ".mysqli_error($link));
			while($row = mysqli_fetch_assoc($resultado)){
				$id_paquete = $row["id_paquete"];
				$nombre_paquete = $row["nombre_paquete"];
				$costo_paquete = $row["costo_paquete"];
				$numero_paquete = $row["numero_paquete"];
				$periodo_paquete = $row["periodo_paquete"];
		?>
			<tr>
				<td class="text-center"><?php echo $id_paquete;?></td>
				<td class="text-center"><?php echo $nombre_paquete;?></td>
				<td class="text-center"><?php echo $costo_paquete;?></td>
				<td class="text-center"><?php echo $numero_paquete;?></td>
				<td class="text-center"><?php echo $periodo_paquete;?></td>
				<td class="text-center">
					<button class="btn btn-warning btn_editar" type="button" title="Editar" data-id_paquete="<?php echo $id_paquete;?>"><i class="fa fa-pencil"></i>
					</button>
					<button class="btn btn-danger btn_eliminar" type="button" title="Eliminar" data-id_paquete="<?php echo $id_paquete;?>"><i class="fa fa-trash"></i>
					</button>
				</td>
			</tr>
		<?php	
			}
		?>
	</tbody>
	
</table>