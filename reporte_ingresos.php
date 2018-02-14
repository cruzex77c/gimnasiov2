<?php 
	include('login/login_success.php');
    include('control/conexi.php');
    $link = Conectarse();
    $activo = "reportes";
	
	$dt_fecha_inicial = new DateTime("first day of this month");
	$dt_fecha_final = new DateTime("last day of this month");
	
	$fecha_inicial = $dt_fecha_inicial->format("Y-m-d");
	$fecha_final = $dt_fecha_final->format("Y-m-d");
?>
<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Sistema Gimnasio">
    <meta name="author" content="Marco Ortega">
    <title>Reporte de ingresos</title>
	<style>
	#btn_fecha{
		position: relative;
		top: 25px;
	}
	.botones > button{
		position:relative;
		top: 25px;
	}
	@media screen and (max-width: 990px){
		.botones > button{	
			margin-top: 10px;
			float: right;
			margin-right: 10px;
		}
	}
	</style>
	<?php include('styles.php'); ?>
</head>

<body>

    <div id="wrapper">
    
        <?php include('menu.php'); ?>    

        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <h3 class="text-center">Reporte de ingresos</h3>
                        <hr class="hidden-print">
						<form id="form_ingresos" class="">
							<div class="row">
									<div class="col-md-3 text-center hidden-print">
										<label for="fecha_inicial">Desde:</label>
										<input required class="form-control" type="date" name="fecha_inicial" id="fecha_inicial" value="<?php echo $fecha_inicial;?>">
									</div>
									<div class="col-md-3 text-center hidden-print">
										<label for="fecha_final">Hasta:</label>
										<input required class="form-control" type="date" name="fecha_final" id="fecha_final" value="<?php echo $fecha_final;?>">
									</div>
									<div class="col-md-2 hidden-print">
										<button type="button" class="btn btn-success" id="btn_fecha">
											<i class="fa fa-search"></i> Buscar
										</button>
									</div>
									<div class="col-md-2 col-md-offset-2 hidden-print botones">
										<button type="button" class="btn btn-info" id="btn_imprimir" title="Imprimir">
											<i class="fa fa-print"></i> 
										</button>
										<button type="button" class="btn btn-default" id="btn_exel" title="Exportar a exel">
											<i class="fa fa-file-excel-o"></i> 
										</button>
									</div>
							</div>
						</form>
						<br><br>
						<div class="conteiner">
							<div id="lista_reporteIngresos" class="text-center table-responsive">
							</div>
						</div>
                    </div>
                </div>
            </div>
			<!-- /#page-wrapper -->
		</div>
		<!-- /#wrapper -->
	</div>
	<?php include('scripts.php');?>
    <script src="js/reporte_ingresos.js"></script>
</body>
</html>