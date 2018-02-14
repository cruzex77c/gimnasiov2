
<!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">OMWEB-FITNESS</a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
                <li class="dropdown">
					<input type="text" id="input_turno" class="hidden">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-clock-o"></i> Turno: <span id="turno"></span> <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li id="cerrar_turno">
                            <a href="#"><i class="fa fa-fw fa-power-off"></i> Cerrar Turno</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li>
                        <li class="text-center"><img src="imagenes/logo.png" alt="" width="70%" ></li>
                        <li class="dropdown perfil text-center">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-circle"></i> <?php echo $_SESSION["usuario"]; ?> <b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a href=""  id="btn_perfil"><i class="fa fa-fw fa-user"></i> Mi perfil</a>
                                </li>
                                <li class="divider"></li>
                                <li>
                                    <a href="login/logout.php"><i class="fa fa-fw fa-power-off"></i> Salir</a>
                                </li>
                            </ul>
                        </li>
                    </li>
                    <hr>
                    <li>
					<form class="navbar-form navbar-left form-inline" id="form_buscar" role="search" method="GET" action="cliente_detalles.php">
                        <div class="input-group">
                        <span class="input-group-addon" id="sizing-addon1"><i class="fa fa-user"></i></span>
                          <input type="text" id="buscar_afiliado" name="cliente" class="form-control" placeholder="Buscar afiliado..">
                          <span class="input-group-btn">
                            <button class="btn btn-secondary" type="submit" title="Realizar busqueda de un afiliado"><i class="fa fa-search"></i></button>
                          </span>
                        </div>
                    </li>
					</form>
                    <li class="<?php echo $activo == "principal" ? "active": '' ;?>">
                        <a href="index.php"><i class="fa fa-fw fa-home"></i> Principal</a>
                    </li>
                    <li class="<?php echo $activo == "afiliados" ? "active": '' ;?>">
                        <a href="afiliados.php"><i class="fa fa-fw fa-users"></i> Afiliados</a>
                    </li>
                    <li class="<?php echo $activo == "reportes"?"active":'';?>">
									<a href="reporte_ingresos.php"><i class="fa fa-fw fa-file-text"></i> Reportes</a>
						</li>
                    <li class="<?php echo $activo == "grupos" ? "active": '' ;?>">
                        <a href="javascript:;" data-toggle="collapse" data-target="#demo"><i class="fa fa-th-large" aria-hidden="true"></i> Grupos <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="demo" class="collapse">
                            <li>
                                <a href="paquetes.php"> <i class="fa fa-cubes" aria-hidden="true"></i> Paquetes</a>
                            </li>
                            <li>
                                <a href="areas.php"><i class="fa fa-bars" aria-hidden="true"></i> Areas</a>
                            </li>
                        </ul>
                    </li>
                    <li class="<?php echo $activo == "usuarios"?"active": '' ;?>">
                        <a href="usuarios.php"><i class="fa fa-fw fa-users"></i> Usuarios</a>
                    </li>
                    <li class="<?php echo $activo == "empleados"?"active": '' ;?>">
                        <a href="empleados.php"><i class="fa fa-briefcase" aria-hidden="true"></i> Empleados</a>
                    </li>
					<li class="<?php echo $activo == "configuracion"?"active": '' ;?>">
					<a href="#" id="btn_respaldo"><i class="fa fa-database"></i> Respaldar BD</a>
					</li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>
		

	<!-- Modal -->
	<div id="modal_perfil" class="modal fade" role="dialog">
	  <div class="modal-dialog">

		<!-- Modal content-->
		<div class="modal-content">
		  <div class="modal-header">
			<button type="button" class="close" data-dismiss="modal">&times;</button>
			<h4 class="modal-title text-center">Mi perfil</h4>
		  </div>
		  <div class="modal-body">
		  <input type="text" id="id_usuario" value="<?php echo $_SESSION["id_usuario"]; ?>" class="hidden">
			<div class="row">
				<div class="col-md-12">
					<label for="nombre_staff">Nombre(s):</label>
					<input class="form-control" type="text" name="nombre_staff" id="nombre_staff" readonly>
				</div>
			</div>
			<div class="row">
				<div class="col-md-4">
					<label for="usuario">Usuario:</label>
					<input class="form-control" type="text" name="usuario" id="usuario">
				</div>
				<div class="col-md-4">
					<label for="pass">Contraseña:</label>
					<input class="form-control" type="password" name="pass" id="pass">
				</div>
				<div class="col-md-4">
					<label for="rpass">Repetir Contraseña:</label>
					<input class="form-control" type="password" name="rpass" id="rpass">
				</div>
			</div>
		  </div>
		  <div class="modal-footer">
			<button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Cerrar</button>
			<button type="button" id="btn_actualizar_perfil" class="btn btn-success"><i class="fa fa-floppy-o"></i> Guardar</button>
		  </div>
		</div>
	  </div>
	</div>

		