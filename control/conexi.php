<?php
function Conectarse()
{
	$host="localhost";
	$db="gimnasio";
	$usuario="root";
	$pass="";
	$set_local = "SET time_zone = '-05:00'";
	$set_names = "SET NAMES 'utf8'";
	date_default_timezone_set('America/Mexico_City');

    if (!($link=mysqli_connect($host,$usuario,$pass)))
   {
     die( "Error conectando a la base de datos.". mysqli_error($link));
   }

   if (!mysqli_select_db($link, $db))
   {
		die( "Error seleccionando la base de datos.". mysqli_error($link));
   }

  /*  if (!mysqli_query( $link, $set_local))
   {
		die( "Error cambiando TimeZone.". mysqli_error());
   } */

	mysqli_query($link, "SET NAMES 'utf8'") or die("Error Cambiando charset").mysqli_error($link);

	setlocale(LC_ALL,"es_ES");
	mysqli_query($link, "SET CHARACTER SET utf8") or die("Error en charset UTF8".mysqli_error($link));


   //ACTIVAR SI LA BASE DE DATOS NO ESTA EN UTF-8
	//mysqli_query($set_names, $link) or die( "Error cambiando Charset". mysqli_error());
	// mysqli_query ("set character_set_client='utf8'");
	// mysqli_query ("set character_set_results='utf8'");
	// mysqli_query ("set collation_connection='utf8_general_ci'");
	// mysqli_query("SET NAMES 'utf8'");
	/* mysqli_query("SET CHARACTER SET utf8") or die(MYSQL_ERROR());
	mysqli_query("SET SESSION collation_connection = 'utf8_unicode_ci'");
	mysqli_set_charset('utf8', $link) or die(MYSQL_ERROR());
	 */

   return $link;
}
?>
