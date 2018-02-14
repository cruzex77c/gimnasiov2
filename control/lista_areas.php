<?php 
	include('conexi.php');
	$link = Conectarse();
?>
<table  class="table">
	<thead>
		<tr>
			<th class="text-center">Id</th>
			<th class="text-center">Nombre</th>
			<th class="text-center">Acciones</th>
		</tr> 
	</thead>
	<tbody>
		<?php 
			$consulta = "SELECT * FROM  areas";
			$resultado = mysqli_query($link,$consulta) or die ("Error en la BD $consulta ".mysqli_error($link));
			while($row = mysqli_fetch_assoc($resultado)){
				$id_area = $row["id_area"];
				$nombre_area = $row["nombre_area"];
		?>
			<tr>
				<td class="text-center"><?php echo $id_area;?></td>
				<td class="text-center"><?php echo $nombre_area;?></td>
				<td class="text-center">
					<button class="btn btn-warning btn_editar" type="button" title="Editar" data-id_area="<?php echo $id_area;?>"><i class="fa fa-pencil"></i>
					</button>
					<button class="btn btn-danger btn_eliminar" type="button" title="Eliminar" data-id_area="<?php echo $id_area;?>"><i class="fa fa-trash"></i>
					</button>
				</td>
			</tr>
		<?php	
			}
		?>
	</tbody>
	
</table>