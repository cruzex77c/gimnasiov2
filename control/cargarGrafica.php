<?php
include('conexi.php');
$link = Conectarse();
$respuesta = array();
$ano = $_POST['ano'];
$mes = $_POST['mes'];
$mes2 = $_POST['mes2'];
$mes3 = $_POST['mes3'];
$ano2 = $_POST['ano2'];	
if($mes == 2){
	
	$consulta_ingresos = "(
		SELECT DISTINCT
			(
				SELECT
					sum(cantidad_pagada) AS 'i".$mes."'
				FROM
					historial_pago
				WHERE
					MONTH (fecha_historial) = '$mes'
				AND YEAR (fecha_historial) = '$ano'
			) AS 'i".$mes."',
	(
				SELECT
					sum(cantidad_pagada) AS 'i".$mes2."'
				FROM
					historial_pago
				WHERE
					MONTH (fecha_historial) = '$mes2'
				AND YEAR (fecha_historial) = '$ano'
			) AS 'i".$mes2."',
	(
				SELECT
					sum(cantidad_pagada) AS 'i".$mes3."'
				FROM
					historial_pago
				WHERE
					MONTH (fecha_historial) = 'i".$mes3."'
				AND YEAR (fecha_historial) = '$ano2'
			) AS 'i".$mes3."'

		FROM
			historial_pago
	)";
	$result_ingresos = mysqli_query($link,$consulta_ingresos);
	while($row_ingresos = mysqli_fetch_assoc($result_ingresos)){
		$respuesta['ingresos'] = $row_ingresos;
	}
	
	$consulta_egresos = "
		(
		SELECT DISTINCT
			(
				SELECT
					sum(cantidad_egreso) AS 'e".$mes."'
				FROM
					egresos
				WHERE
					MONTH (fecha_egreso) = '$mes'
				AND YEAR (fecha_egreso) = '$ano'
			) AS 'e".$mes."',
			(
				SELECT
					sum(cantidad_egreso) AS 'e".$mes2."'
				FROM
					egresos
				WHERE
					MONTH (fecha_egreso) = '$mes2'
				AND YEAR (fecha_egreso) = '$ano'
			) AS 'e".$mes2."',
			(
				SELECT
					sum(cantidad_egreso) AS 'e".$mes3."'
				FROM
					egresos
				WHERE
					MONTH (fecha_egreso) = '$mes3'
				AND YEAR (fecha_egreso) = '$ano2'
			) AS 'e".$mes3."'
		FROM
			egresos
		)
	";
	$result_egresos = mysqli_query($link,$consulta_egresos);
	while($row_egresos = mysqli_fetch_assoc($result_egresos)){
		$respuesta['egresos'] = $row_egresos;
	}
	
	
}else if($mes == 1){
	$consulta_ingresos = "(
		SELECT DISTINCT
			(
				SELECT
					sum(cantidad_pagada) AS 'i".$mes."'
				FROM
					historial_pago
				WHERE
					MONTH (fecha_historial) = $mes
				AND YEAR (fecha_historial) = $ano
			) AS 'i".$mes."',
	(
				SELECT
					sum(cantidad_pagada) AS 'i".$mes2."'
				FROM
					historial_pago
				WHERE
					MONTH (fecha_historial) = $mes2
				AND YEAR (fecha_historial) = $ano2
			) AS 'i".$mes2."',
	(
				SELECT
					sum(cantidad_pagada) AS 'i".$mes3."'
				FROM
					historial_pago
				WHERE
					MONTH (fecha_historial) = $mes3
				AND YEAR (fecha_historial) = $ano2
			) AS 'i".$mes3."'

		FROM
			historial_pago
	)";
	
	$result_ingresos = mysqli_query($link,$consulta_ingresos);
	while($row_ingresos = mysqli_fetch_assoc($result_ingresos)){
		$respuesta['ingresos'] = $row_ingresos;
	}
	
	$consulta_egresos = "
		(
		SELECT DISTINCT
			(
				SELECT
					sum(cantidad_egreso) AS 'e".$mes."'
				FROM
					egresos
				WHERE
					MONTH (fecha_egreso) = '$mes'
				AND YEAR (fecha_egreso) = '$ano'
			) AS 'e".$mes."',
			(
				SELECT
					sum(cantidad_egreso) AS 'e".$mes2."'
				FROM
					egresos
				WHERE
					MONTH (fecha_egreso) = '$mes2'
				AND YEAR (fecha_egreso) = '$ano2'
			) AS 'e".$mes2."',
			(
				SELECT
					sum(cantidad_egreso) AS 'e".$mes3."'
				FROM
					egresos
				WHERE
					MONTH (fecha_egreso) = '$mes3'
				AND YEAR (fecha_egreso) = '$ano2'
			) AS 'e".$mes3."'
		FROM
			egresos
		)
	";
	
	$result_egresos = mysqli_query($link,$consulta_egresos);
	while($row_egresos = mysqli_fetch_assoc($result_egresos)){
		$respuesta['egresos'] = $row_egresos;
	}
	
	
}else{
	$consulta_ingresos = "(
		SELECT DISTINCT
			(
				SELECT
					sum(cantidad_pagada) AS 'i".$mes."'
				FROM
					historial_pago
				WHERE
					MONTH (fecha_historial) = '$mes'
				AND YEAR (fecha_historial) = '$ano'
			) AS 'i".$mes."',
	(
				SELECT
					sum(cantidad_pagada) AS 'i".$mes2."'
				FROM
					historial_pago
				WHERE
					MONTH (fecha_historial) = '$mes2'
				AND YEAR (fecha_historial) = '$ano'
			) AS 'i".$mes2."',
	(
				SELECT
					sum(cantidad_pagada) AS 'i".$mes3."'
				FROM
					historial_pago
				WHERE
					MONTH (fecha_historial) = 'i".$mes3."'
				AND YEAR (fecha_historial) = '$ano'
			) AS 'i".$mes3."'

		FROM
			historial_pago
	)";
	
	$result_ingresos = mysqli_query($link,$consulta_ingresos);
	while($row_ingresos = mysqli_fetch_assoc($result_ingresos)){
		$respuesta['ingresos'] = $row_ingresos;
	}
	
	$consulta_egresos = "
		(
		SELECT DISTINCT
			(
				SELECT
					sum(cantidad_egreso) AS 'e".$mes."'
				FROM
					egresos
				WHERE
					MONTH (fecha_egreso) = '$mes'
				AND YEAR (fecha_egreso) = '$ano'
			) AS 'e".$mes."',
			(
				SELECT
					sum(cantidad_egreso) AS 'e".$mes2."'
				FROM
					egresos
				WHERE
					MONTH (fecha_egreso) = '$mes2'
				AND YEAR (fecha_egreso) = '$ano'
			) AS 'e".$mes2."',
			(
				SELECT
					sum(cantidad_egreso) AS 'e".$mes3."'
				FROM
					egresos
				WHERE
					MONTH (fecha_egreso) = '$mes3'
				AND YEAR (fecha_egreso) = '$ano'
			) AS 'e".$mes3."'
		FROM
			egresos
		)
	";
	
	$result_egresos = mysqli_query($link,$consulta_egresos);
	while($row_egresos = mysqli_fetch_assoc($result_egresos)){
		$respuesta['egresos'] = $row_egresos;
	}
	
	
}


echo json_encode($respuesta);
?>