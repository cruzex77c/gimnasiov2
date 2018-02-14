<?php 
	include('conexi.php');
	$link = Conectarse();
?>
<table  class="table">
	<thead>
		<tr>
			<th class="text-center">Nombre</th>
			<th class="text-center">Telefono</th>
			<th class="text-center">Telefono de referencia</th>
			<th class="text-center">Correo electtronico</th>
			<th class="text-center">Area</th>
			<th class="text-center">Cargo</th>
			<th class="text-center">Acciones</th>
		</tr> 
	</thead>
	<tbody>
		<?php 
			$consulta = "SELECT * FROM  staff";
			$resultado = mysqli_query($link,$consulta);
			while($row = mysqli_fetch_assoc($resultado)){
				$id_staff = $row["id_staff"];
				$nombre_staff = $row["nombre_staff"];
				$tel_staff = $row["tel_staff"];
				$telref_staff = $row["telref_staff"];
				$correo_staff = $row["correo_staff"];
				$area_staff = $row["area_staff"];
				$cargo_staff = $row["cargo_staff"];
		?>
			<tr>
				<td class="text-center"><?php echo $nombre_staff;?></td>
				<td class="text-center"><?php echo $tel_staff;?></td>
				<td class="text-center"><?php echo $telref_staff;?></td>
				<td class="text-center"><?php echo $correo_staff;?></td>
				<td class="text-center"><?php echo $area_staff;?></td>
				<td class="text-center"><?php echo $cargo_staff;?></td>
				<td class="text-center">
					<button class="btn btn-warning btn_editar" type="button" title="Editar" data-id_staff="<?php echo $id_staff;?>"><i class="fa fa-pencil"></i>
					</button>
					<button class="btn btn-danger btn_eliminar" type="button" title="Eliminar" data-id_staff="<?php echo $id_staff;?>"><i class="fa fa-trash"></i>
					</button>
				</td>
			</tr>
		<?php	
			}
		?>
	</tbody>
	
</table>