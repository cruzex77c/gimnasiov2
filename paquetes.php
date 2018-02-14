<?php 
	include('login/login_success.php');
    include('control/conexi.php');
    $link = Conectarse();
    $activo = "grupos";
?>
<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Sistema Gimnasio">
    <meta name="author" content="Marco Ortega">

    <title>Paquetes</title>
	<?php include('styles.php'); ?>
</head>

<body>

    <div id="wrapper">
    
        <?php include('menu.php'); ?>    

        <div id="page-wrapper">

            <div class="container-fluid">
                
                <div class="row">
                    <div class="col-md-12">
                        <h3 class="text-center">Paquetes</h3>
							<button class="btn btn-success" type="button" id="btn_paquete"><i class="fa fa-plus"></i> Agregar</button>
                        <hr>
                    </div>
                </div>
                <br>
            </div>
			<div class="table-responsive" id="lista_paquete">
				<div class="text-center"><i class="fa fa-circle-o-notch fa-spin fa-3x"></i></div>
			</div>
			<div class="container ">
				<?php include("forms/paquetes.php");?>
			</div>
			<!-- /#page-wrapper --> 
		</div>
		<!-- /#wrapper -->
	</div>
	<?php include('scripts.php');?>
    <script src="js/paquetes.js"></script>
</body>
</html>
