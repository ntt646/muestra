<?php 


if (!empty($_GET['id'])) {
	$id=$_GET['id'];
}else{
	$id=0;
}

if (!empty($_GET['fam'])) {
	$fam=$_GET['fam'];
}else{
	$fam=0;
}


include('../include/modulos.php');

    $nUser=$_SESSION['user'];
if (!empty($cargaFamilia)) {
	

	$sitio = cargaTemplate("Familiares");

	
	$sitio = cargaModulo("{_MENU_IZQ_}", "menu", $sitio);
	$sitio = str_replace("{_ACTIVE3_}", 'active', $sitio);
	$sitio = str_replace("{_PDF_}", $id, $sitio);
	$sitio = str_replace("{_USER_}", $nUser, $sitio);

	
	//$cargaFamilia= consultarFamilia($id);



	$listaFamilia= construirListaFamiliaresAd($cargaFamilia);

	$sitio = str_replace("{_TABLA_}", $listaFamilia, $sitio);

	$listaVehi= construirListaVehiculoAdm($consulVehiC);

    $sitio = str_replace("{_TABLA2_}", $listaVehi, $sitio);

    //rpt trabajadores

	$listaTraba= construirListaTrabajadores($consulTrabajadorF);

	$sitio = str_replace("{_TABLA4_}", $listaTraba, $sitio);

	    	
	echo $sitio;

}

if (!empty($modFamilia)) {
	
	$sitio = cargaTemplate("modiFamiliares");

	if ($_SESSION['rol']== 4) {
		
		$sitio = cargaModulo("{_MENU_IZQ_}", "menuMetro", $sitio);
		$sitio = str_replace("{_ACTIVE2_}", 'active', $sitio);
		$sitio = str_replace("{_RUT_}", 'huespedMetro.php?id', $sitio);
		$sitio = str_replace("{_USER_}", $nUser, $sitio);

	}elseif ($_SESSION['rol']== 3) {
		$sitio = cargaModulo("{_MENU_IZQ_}", "menuInver", $sitio);
		$sitio = str_replace("{_ACTIVE3_}", 'active', $sitio);
		$sitio = str_replace("{_RUT_}", 'visualInvermarin.php?id', $sitio);
		$sitio = str_replace("{_USER_}", $nUser, $sitio);
	}else{
		$sitio = cargaModulo("{_MENU_IZQ_}", "menu", $sitio);
		$sitio = str_replace("{_ACTIVE3_}", 'active', $sitio);
		$sitio = str_replace("{_RUT_}", 'modiFamiliar.php?id', $sitio);
		$sitio = str_replace("{_USER_}", $nUser, $sitio);
	}


	$fila = pg_fetch_array($modFamilia);

    //echo "<pre>";print_r($fila);echo "</pre>";exit;
	
	$nombre = $fila['nombres'];
	$apellido = $fila['apellidos'];
	$cedula = $fila['cedula'];
	$edad = $fila['edad'];
	$idFam = $fila['idfami'];
	$iddepa = $fila['iddepa'];
	//$cedula = $fila['cedula'];


	$sitio = str_replace("{_NOMBRE_}", $nombre, $sitio);
	$sitio = str_replace("{_APELLIDO_}", $apellido, $sitio);
	$sitio = str_replace("{_CEDULA_}", $cedula, $sitio);
	$sitio = str_replace("{_EDAD_}", $edad, $sitio);
	$sitio = str_replace("{_ID_}", $idFam, $sitio);
	$sitio = str_replace("{_IDDEPA_}", $iddepa, $sitio);


	echo $sitio;
}

 ?>
