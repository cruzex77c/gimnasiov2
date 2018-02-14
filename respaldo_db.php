<?php 
	$fecha_hoy = date("Ymd-His");
	$bak_dir = "C:\Users\cruzex77c\Downloads";
	#$md = "mkdir $bak_dir"; $a = system($md);
	#$ch = "chmod 777 $bak_dir"; $a = system($ch);
	
	$db_user = "root";
	$db_pass = "";
	$db_name = "omweb";
	$db_host = "localhost";
	$conexion = mysqli_connect($db_host,$db_user,$db_pass);
	
	$salida_db_sql = $bak_dir.'/'.$db_name.'-'.$fecha_hoy.'.sql'; // Datos
	$salida_db_tar = $bak_dir.'/'.$db_name.'-'.$fecha_hoy.'.tar.gz'; //Datos
	 
	$salida_db_sqlE = $bak_dir.'/'.$db_name.'E-'.$fecha_hoy.'.sql'; //Estructura
	$salida_db_tarE = $bak_dir.'/'.$db_name.'E-'.$fecha_hoy.'.tar.gz'; //Estructura
	
	 // $dump = "mysqldump --result-file=$salida_db_sql --default-character-set=utf8 --no-create-info --add-locks=FALSE --disable-keys=FALSE --extended-insert --user=$db_user --password=$db_pass $db_name";
	 // $a = system($dump);
	 // $comprime = "tar -czf $salida_db_tar $salida_db_sql";
	 // $a = system($comprime);
	 // $borra1 = "rm $salida_db_sql";
	 // $a = system($borra1);
	 
	 $dump = "mysqldump --result-file=$salida_db_sqlE --default-character-set=utf8 --add-locks=FALSE --disable-keys=FALSE --no-data --user=$db_user --password=$db_pass $db_name";
	 $a = system($dump);
	 $comprime = "tar -czf $salida_db_tarE $salida_db_sqlE";
	 $a = system($comprime);
	 $borra1 = "rm $salida_db_sqlE";
	 $a = system($borra1);
	 
	 echo "Backup ok";
?>