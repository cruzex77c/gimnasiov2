<?php 
	include("login/login_success.php");
    include ('control/conexi.php');
    $link = Conectarse();
    $activo = "principal";
?>
<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Sistema Gimnasio">
    <meta name="author" content="Marco Ortega">

    <title>PRINCIPAL</title>
	<?php include('styles.php')?>
</head>

<body>

    <div id="wrapper">
    
        <?php include('menu.php'); ?>    

        <div id="page-wrapper">
			<input class="hidden" type="text" id="id_usuario" value="<?php echo $_SESSION['id_usuario'];?>">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<h3 class="text-center">Mi perfil</h3>	
						<hr>
						<br>
						<div class="row text-center" id="datos">
                            <i class="fa fa-spinner fa-pulse fa-3x fa-fw"></i>
						</div>
					</div>
				</div>
			</div>
			
			
        <!-- /#page-wrapper -->

        </div>
    <!-- /#wrapper -->

    <?php include('scripts.php') ?>
    <script src="js/perfil.js"></script>

</body>

</html>
