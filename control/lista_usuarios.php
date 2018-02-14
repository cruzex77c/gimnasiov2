<?php 
	include('conexi.php');
	$link = Conectarse();
?>
<table  class="table">
	<thead>
		<tr>
			<th class="text-center">Nombre</th>
			<th class="text-center">Usuario</th>
			<th class="text-center">Permiso</th>
			<th class="text-center">Acciones</th>
		</tr> 
	</thead>
	<tbody>
		<?php 
			$consulta = "SELECT * FROM  usuarios LEFT JOIN staff USING(id_staff)";
			$resultado = mysqli_query($link,$consulta);
			while($row = mysqli_fetch_assoc($resultado)){
				$id_usuario = $row["id_staff"];
				$usuario = $row["usuario"];
				$permisos = $row["permisos"];
				$nombre_staff = $row["nombre_staff"];
		?>
			<tr>
				<td class="text-center"><?php echo $nombre_staff;?></td>
				<td class="text-center"><?php echo $usuario;?></td>
				<td class="text-center"><?php echo $permisos;?></td>
				<td class="text-center">
					<button class="btn btn-danger btn_eliminar" type="button" title="Eliminar" data-id_usuario="<?php echo $id_usuario;?>"><i class="fa fa-trash"></i>
					</button>
				</td>
			</tr>
		<?php	
			}
		?>
	</tbody>
	
</table>