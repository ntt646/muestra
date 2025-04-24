<?php 



if (!empty($_GET['vh'])) {
	$vh=$_GET['vh'];
}else{
	$vh=0;
}


include('../include/modulos.php');


if (!empty($modVeh)) {
	
	$sitio = cargaTemplate("modiVehiculo");

	if ($_SESSION['rol']== 4) {
		
		$sitio = cargaModulo("{_MENU_IZQ_}", "menuMetro", $sitio);
		$sitio = str_replace("{_ACTIVE2_}", 'active', $sitio);
		$sitio = str_replace("{_RUT_}", 'huespedMetro.php?id', $sitio);

	}elseif ($_SESSION['rol']== 3) {
		$sitio = cargaModulo("{_MENU_IZQ_}", "menuInver", $sitio);
		$sitio = str_replace("{_ACTIVE3_}", 'active', $sitio);
		$sitio = str_replace("{_RUT_}", 'visualInvermarin.php?id', $sitio);
	}else{
		$sitio = cargaModulo("{_MENU_IZQ_}", "menu", $sitio);
		$sitio = str_replace("{_ACTIVE3_}", 'active', $sitio);
		$sitio = str_replace("{_RUT_}", 'modiFamiliar.php?id', $sitio);
	}


	$fila = pg_fetch_array($modVeh);

    //echo "<pre>";print_r($fila);echo "</pre>";exit;
	
	$placa = $fila['placa'];
	$modelo = $fila['modelo'];
	$marca = $fila['marca'];
	$color = $fila['color'];
	$idcar = $fila['idcar'];
	$iddepa = $fila['iddepa'];
	//$cedula = $fila['cedula'];


	$sitio = str_replace("{_PLACA_}", $placa, $sitio);
	$sitio = str_replace("{_MODELO_}", $modelo, $sitio);
	$sitio = str_replace("{_MARCA_}", $marca, $sitio);
	$sitio = str_replace("{_COLOR_}", $color, $sitio);
	$sitio = str_replace("{_ID_}", $idcar, $sitio);
	$sitio = str_replace("{_IDDEPA_}", $iddepa, $sitio);


	echo $sitio;
}

 ?>
