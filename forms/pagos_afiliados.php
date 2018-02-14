<form id="form_pago">
<div id="modal_pago" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title text-center">Nuevo pago</h4>
      </div>
      <div class="modal-body">
			<div class="row">
				<div class="col-sm-2">
								<div class="form-group">
									<label for="id_cliente">
										Id:
									</label>
									<input required type="number" readonly class="form-control" name="id_cliente" id="id_cliente_pago">
								</div>
							</div>
							<div class="col-sm-10">
								<div class="form-group">
									<label for="nombre_cliente">
										Nombre:
									</label>
									<input required type="text" readonly class="form-control"  name="nombre_cliente" id="nombre_cliente_pago"  >
								</div>
							</div>
			</div>
			<div class="row">
							<div class="col-sm-6">
								<div class="form-group">
									<label for="diains_cliente">
										Fecha de inicio:
									</label>
									<input required  type="text" class="form-control"  name="diains_cliente" id="diains_cliente" value="<?php echo date("d/m/Y")?>" >
								</div>
							</div>
							<div class="col-sm-6">
								<div class="form-group">
									<label for="diacorte_cliente">
										Fecha de vencimiento:
									</label>
									<input required type="text" readonly class="form-control"  name="diacorte_cliente" id="diacorte_cliente"  >
								</div>
							</div>
			</div>
			<div class="row">
							<div class="col-sm-6">
								<div class="form-group">
									<label for="nombre_paquete">
										Paquete:
									</label>
									<select required class="form-control" id="nombre_paquete" name="nombre_paquete">
									<option value="">Elija ...</option>
									<?php 
										$q_cliente ="SELECT * FROM paquetes ORDER BY nombre_paquete ASC";
										$result_cliente=mysqli_query($link,$q_cliente) or die("Error en: $q_cliente  ".mysqli_error($link));
								
											while($row = mysqli_fetch_assoc($result_cliente)){
												$id_paquete = $row["id_paquete"];
												$nombre_paquete = $row["nombre_paquete"];
												$costo_paquete = $row["costo_paquete"];
												$numero_paquete = $row["numero_paquete"];
												$periodo_paquete = $row["periodo_paquete"];
								?>
									  
									  <option data-costo="<?php echo $costo_paquete; ?>" data-periodo="<?php echo $periodo_paquete; ?>" data-numero="<?php echo $numero_paquete; ?>" value="<?php echo $nombre_paquete; ?>"><?php echo $nombre_paquete; ?></option>
							<?php 
								}
							?>  
									  
									 </select>
								</div>
							</div>
							<div class="col-sm-6">
								<div class="form-group">
									<label for="costo_paquete">
										Costo:
									</label>
									<input required type="text" readonly class="form-control"  name="costo_paquete" id="costo_paquete"  >
								</div>
							</div>
			</div>
      </div>
      
	  <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Cerrar</button>
        <button type="submit" class="btn btn-success"><i class="fa fa-usd"></i> Pagar</button>
      </div>
    </div>

  </div>
</div>
</form>