<form id="form_nuevo_usuario" class="form">
	<div id="modal_nuevo_usuario" class="modal fade" role="dialog">
		<div class="modal-dialog modal-md">
<!--INICIO DEL MODAL -->
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title text-center">Nuevo usuario</h4>	
				</div>
					<div class="modal-body">
						<div class="row">
							<div class="col-md-12">
							<!--INICIO DEL FORMULARIO -->
									<div class="row">
										<div class="col-md-6">
											<input id="id_usuario" class="hidden" name="id_usuario">
											<label for="usuario" class="text-center">Usuario: </label>
											<input type="text" class="form-control" id="usuario" name="usuario" required>
										</div>
										<div class="col-md-6">
											<label for="pass" class="text-center">Contraseña: </label>
											<input type="password" class="form-control" id="pass" name="pass" required>
										</div>
									</div>
									<div class="row">
										<div class="col-md-6">
											<label for="permisos" class="text-center">Permisos: </label>
											<select class="form-control" name="permisos" id="permisos">
												<option value="administrador">Administrador</option>
												<option value="usuario">Usuario</option>
											</select>
										</div>
										<div class="col-md-6">
											<label for="id_staff" class="text-center">Empleado: </label>
											<select class="form-control" name="id_staff" id="id_staff">
												<option value="">Elije un empleado ...</option>
												<?php
													$consultaStaff = "SELECT	* FROM staff
																			LEFT OUTER JOIN usuarios USING(id_staff)
																			WHERE ISNULL(id_usuario) ";
													$resultado = mysqli_query($link,$consultaStaff);
													while($row = mysqli_fetch_assoc($resultado)){
														$id_staff = $row['id_staff'];
														$nombre_staff = $row['nombre_staff'];
												?>
													<option value="<?php echo $id_staff;?>"><?php echo $nombre_staff;?></option>
												<?php	
													}
												?>
											</select>
										</div>
									</div>
							</div>
						</div>
					</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-danger" data-dismiss="modal">
								<i class="fa fa-times"></i> 
								Cerrar
							</button>
							<button type="submit" class="btn btn-success">
								<i class="fa fa-save"></i> 
								Guardar
							</button>
						</div>
			</div>
<!--FINAL DEL MODAL -->	
		</div>
	</div>
</form>