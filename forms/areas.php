<form id="form_nueva_area" class="form">
	<div id="modal_nueva_area" class="modal fade" role="dialog">
		<div class="modal-dialog modal-sm">
<!--INICIO DEL MODAL -->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title text-center">Nueva Area</h4>	
			</div>
				<div class="modal-body">
					<div class="row">
						<div class="col-md-12">
						<!--INICIO DEL FORMULARIO -->
							<div class="panel panel-default">
								<div class="panel-body">
									<div class="form-group">
										<input id="id_area" class="hidden" name="id_area">
										<label for="nombre_area" class="text-center">Nombre: </label>
										<input type="text" class="form-control" id="nombre_area" name="nombre_area" required>
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