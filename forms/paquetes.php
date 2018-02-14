<form id="form_nuevo_paquete" class="form">
	<div id="modal_nuevo_paquete" class="modal fade" role="dialog">
		<div class="modal-dialog modal-sm">
<!--INICIO DEL MODAL -->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title text-center">Nuevo Paquete</h4>	
			</div>
				<div class="modal-body">
					<div class="row">
						<div class="col-md-12">
						<!--INICIO DEL FORMULARIO -->
							<div class="panel panel-default">
								<div class="panel-body">
									<div class="form-group">
										<input id="id_paquete" class="hidden" name="id_paquete">
										<label for="nombre_paquete" class="text-center">Nombre: </label>
										<input type="text" class="form-control" id="nombre_paquete" name="nombre_paquete" required>
									</div>
									<div class="form-group">
										<label for="costo_paquete" class="text-center">Costo: </label>
										<div class="input-group">
											<span class="input-group-addon"><i class="fa fa-usd"></i></span>
											<input type="number" class="form-control" id="costo_paquete" name="costo_paquete" min="1" max="1000" required>
										</div>
									</div>
									<div class="form-group">
										<label for="numero_paquete" class="text-center">Cantidad: </label>
										<input type="number" class="form-control" id="numero_paquete" name="numero_paquete" min="1" max="100" required>
									</div>
									<div class="form-group">
										<label for="periodo_paquete" class="text-center">Periodo: </label>
										<select class="form-control" name="periodo_paquete" id="periodo_paquete">
											<option value="dias">Dias</option>
											<option value="semanas">Semanas</option>
											<option value="meses">Meses</option>
											<option value="años">Años</option>
										</select>
									</div>
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