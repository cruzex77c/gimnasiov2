<form id="form_nuevo_egreso" class="form">
	<div id="modal_nuevo_egreso" class="modal fade" role="dialog">
		<div class="modal-dialog modal-md">
<!--INICIO DEL MODAL -->
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title text-center">Nuevo Egreso</h4>	
				</div>
					<div class="modal-body">
						<div class="row">
							<div class="col-md-4">
								<label for="descripcion_egresos">Descripcion:</label>
								<input type="text" required name="descripcion_egresos" id="descripcion_egresos" class="form-control">
							</div>
							<div class="col-md-4">
								<label for="cantidad_egresos">Cantidad:</label>
								<div class="input-group">
								<span class="input-group-addon" id="sizing-addon1"><i class="fa fa-usd"></i></span>
									<input type="number" min="0" required name="cantidad_egresos" id="cantidad_egresos" class="form-control">
								</div>
							</div>
							<div class="col-md-4">
								<label for="area_egresos">Area:</label>
								<select required name="area_egresos" id="area_egresos" class="form-control">
										<option value="">Elija...</option>
									<?php 
									$consultarAreas = "SELECT * FROM areas";
									$resultAreas = mysqli_query($link,$consultarAreas);
									while($rowAreas = mysqli_fetch_assoc($resultAreas)){
										extract($rowAreas);
									?>
										<option value="<?php echo $nombre_area; ?>"><?php echo $nombre_area; ?></option>
									<?php
									}
									?>
								</select>
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