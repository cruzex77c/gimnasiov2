<form id="form_nuevo_empleado" class="form">
	<div id="modal_nuevo_empleado" class="modal fade" role="dialog">
		<div class="modal-dialog modal-md">
<!--INICIO DEL MODAL -->
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title text-center">Nuevo Empleado</h4>	
				</div>
					<div class="modal-body">
						<div class="row">
							<div class="col-md-12">
							<!--INICIO DEL FORMULARIO -->
									<div class="row">
										<div class="col-md-6">
											<input id="id_staff" class="hidden" name="id_staff">
											<label for="nombre_staff" class="text-center">Nombre: </label>
											<input type="text" class="form-control" id="newnombre_staff" name="nombre_staff" required>
										</div>
										<div class="col-md-6">
											<label for="tel_staff" class="text-center">Telefono: </label>
											<input type="text" class="form-control" id="tel_staff" name="tel_staff" required>
										</div>
									</div>
									<div class="row">
										<div class="col-md-6">
											<label for="telref_staff" class="text-center">Telefono de referencia: </label>
											<input type="text" class="form-control" id="telref_staff" name="telref_staff" required>
										</div>
										<div class="col-md-6">
											<label for="correo_staff" class="text-center">Correo electronico: </label>
											<input type="email" class="form-control" id="correo_staff" name="correo_staff" required>
										</div>
									</div>
									<div class="row">
										<div class="col-md-6">
											<label for="area_staff" class="text-center">Area: </label>
											<input type="text" class="form-control" id="area_staff" name="area_staff" required>
										</div>
										<div class="col-md-6">
											<label for="cargo_staff" class="text-center">Cargo: </label>
											<input type="text" class="form-control" id="cargo_staff" name="cargo_staff" required>
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