<form id="form_afiliado">
<div id="modal_afiliado" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title text-center"></h4>
      </div>
      <div class="modal-body">
		<div class="row">
							<input type="text" id="id_cliente" name="id_cliente" class="hidden">
							<div class="col-sm-6">
								<div class="form-group">
									<label for="color_ticket">
										Nombre:
									</label>
									<input required type="text" class="form-control" name="nombre_cliente" id="nombre_cliente"  >
								</div>
							</div>
							<div class="col-sm-4">
								<div class="form-group">
									<label for="pass">
										Fecha de Nacimiento: 
									</label>
									<input required type="date" class="form-control" name="fechanacimiento_cliente"  id="fechanacimiento_cliente" >
								</div>
							</div>
							<div class="col-sm-2">
								<div class="form-group">
									<label for="Edad">
										Edad:
									</label>
									<input required type="number" class="form-control" width="20" name="edad_cliente" id="edad_cliente" readonly   >
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
								<label for="sexo_cliente">Sexo:</label>
									<select class="form-control" id="sexo_cliente" name="sexo_cliente">
									  <option>Elija ..</option>
									  <option value="Masculino">Masculino</option>
									  <option value="Femenino">Femenino</option>
									 </select>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label for="pass">
										Telefono personal:
									</label>
									<input required type="tel" class="form-control" name="tel_cliente"  id="tel_cliente" >
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label for="pass">
										Telefono de referencia:
									</label>
									<input required type="tel" class="form-control" name="telrefe_cliente"  id="telrefe_cliente" >
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
										<label for="pass">
											Correo electronico:
										</label>
										<input type="email" class="form-control" name="correo_cliente"  id="correo_cliente" >
								</div>
							</div>
						</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Cerrar</button>
        <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Guardar</button>
      </div>
    </div>

  </div>
</div>
</form>