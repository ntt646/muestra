<?php 

if (!empty($_GET['id'])) {
	$id=$_GET['id'];
	
}

if (!empty($_GET['cd'])) {
	$par=$_GET['cd'];
	
}else{
	$par=0;
}
include('../include/modulos.php');

 
$nUser=$_SESSION['user'];
    
if (!empty($_GET['id'])) {	
            //echo "<pre>";print_r($conteo);echo "</pre>";exit;

	$sitio = cargaTemplate("cargaHuesped");

	$sitio = cargaModulo("{_MENU_IZQ_}", "menuMetro", $sitio);
	$sitio = str_replace("{_USER_}", $nUser, $sitio);

	$sitio = str_replace("{_ACTIVE2_}", 'active', $sitio);
	$sitio = str_replace("{_PDF_}", $id, $sitio);

	$conteo=pg_num_rows($cargaFamilia);
	$conteoDentro=pg_num_rows($cargaFamiliaDentro);

	if ($conteo < 8) {
		
		if ($par==1) {
		$sitio = str_replace("{_P_}", '<p>Cedula Invalida</p>', $sitio);
		
		}else{
			$sitio = str_replace("{_P_}", '<p></p>', $sitio);

		}
		if ($conteoDentro > 0) {
				$sitio = str_replace("{_FORM_}", '', $sitio);
				$sitio = str_replace("{_STYLE_FORM_}", 'display:none;', $sitio);
			}else{

				$sitio = cargaModulo("{_FORM_}", 'form', $sitio);

				$sitio = str_replace("{_IDF_}", $id, $sitio);
				$sitio = str_replace("{_SUBMIT_}", '../controlador/cargaMetro.php', $sitio);
				$sitio = str_replace("{_CANCELAR_}", '../vista/inicioCatmeca.php?cod=2', $sitio);
			}	

		
	}else{
		$sitio = str_replace("{_FORM_}", '', $sitio);
		$sitio = str_replace("{_STYLE_FORM_}", 'display:none;', $sitio);
	}


	$exiteVehiculo=pg_num_rows($consulVehiC);

	if ($exiteVehiculo > 0) {
		$sitio = str_replace("{_FORM3_}", '', $sitio);
		$sitio = str_replace("{_LLENO_}", 'display:none', $sitio);

	}else{
		$sitio = cargaModulo("{_FORM3_}", 'formCarro', $sitio);
		$sitio = str_replace("{_IDC_}", $id, $sitio);
		$sitio = str_replace("{_SUBMIT_}", '../controlador/cargarVehiculocac.php', $sitio);
	}


	$exiteFecha=pg_fetch_array($consultaFecha);
    //echo "<pre>";print_r($exiteFecha);echo "</pre>";exit;

	if ($exiteFecha > 0) {
		$sitio = str_replace("{_FECHA_}", '', $sitio);
		$sitio = str_replace("{_STYLE_FECHA_}", 'display:none;', $sitio);
	}else{
		
		$sitio = cargaModulo("{_FECHA_}", 'fecha', $sitio);
		$sitio = str_replace("{_IDT_}", $id, $sitio);

	}
	$sitio = str_replace("{_STYLE_COLUMNA2_}", 'display:none;', $sitio);	
	$sitio = str_replace("{_STYLE_COLUMNA_}", 'display:none;', $sitio);	


	$listaMetro= construirListaFamiliares($cargaFamilia);

    $sitio = str_replace("{_TABLA_}", $listaMetro, $sitio);

    $listaVehi= construirListaVehiculo($consulVehiC);

    $sitio = str_replace("{_TABLA2_}", $listaVehi, $sitio);


	echo $sitio;

}else{
	$id=0;
	$sitio = cargaTemplate("error");
	echo $sitio;

}


 ?>
