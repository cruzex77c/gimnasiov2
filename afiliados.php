<?php 
	include("login/login_success.php");
    include ('control/conexi.php');
    $link = Conectarse();
    $activo = "afiliados";
?>
<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Sistema Gimnasio">
    <meta name="author" content="Marco Ortega">

    <title>AFILIADOS</title>
	
	<?php include('styles.php'); ?>
</head>

<body>

    <div id="wrapper">
    
        <?php include('menu.php'); ?>    

        <div id="page-wrapper">

            <div class="container-fluid">
                
                <div class="row">
                    <div class="col-md-12">
                        <h3 class="text-center">Afiliados</h3>
                        <hr><br>
                    </div>
                </div>
                
                
                <br>
				<div class="row">
					<div class="col-md-12">
						<button class="btn btn-success" id="btn_nuevo"><i class="fa fa-plus"></i> Nuevo</button>
					</div>
				</div>
				<br>
                <div class="row">
                    <div class="col-md-12 table-responsive text-center" id="div_tabla">
						<i class="fa fa-circle-o-notch fa-spin fa-3x fa-fw"></i>
                    </div>
                </div>
            </div>
        <!-- /#page-wrapper --> 

        </div>
    <!-- /#wrapper -->
    <?php include('forms/afiliados.php'); ?>
    <?php include('forms/pagos_afiliados.php'); ?>
    <?php include('scripts.php'); ?>
    <script src="js/afiliados.js"></script>

</body>

</html>
