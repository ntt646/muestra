<?php 

if (!empty($_GET['cd'])) {
	$cd=$_GET['cd'];
	
}else{
	$cd=0;
}

include('../include/modulos.php');

if (!empty($_SESSION['user'])) {
	
	$user=$_SESSION['user'];

	//inicio propietario

	$sitio = cargaTemplate("inicioHuespInver");

	$codDepar=$_SESSION['user'];

	include('../modelo/consultas.php');

	$datos=pg_fetch_array($consulDepa);
	$torre=$datos['nombre'];
	$estado=$datos['estatus'];
	$id=$datos['iddepa'];
	$class=$datos['invitado'];
	$disponibilidad=$datos['espacios'];


	$sitio = str_replace("{_DEPA_}", $codDepar, $sitio);
	$sitio = str_replace("{_TORRE_}", $torre, $sitio);


	
		//FAMILIARES
		$sitio = str_replace("{_NO_MOROSO_}", 'display:none', $sitio);

		$conteo=pg_num_rows($consulFami);
		if ($conteo < 8) {

			//$fam=pg_fetch_array($consulFami);
			if ($conteo < $disponibilidad) {

				if ($class == 2) {
					if ($par==1) {
					$sitio = str_replace("{_P_}", '<p>Cedula Invalida</p>', $sitio);
					
					}else{
						$sitio = str_replace("{_P_}", '<p></p>', $sitio);

					}	
					$sitio = str_replace("{_FORM_}", '', $sitio);
					$sitio = str_replace("{_LLENOF_}", 'display:none', $sitio);
					$sitio = str_replace("{_JS_}", 'display:block', $sitio);
					//$sitio = str_replace("{_CONTEO_}", '', $sitio);

				}else{
					$sitio = cargaModulo("{_FORM_}", 'form2', $sitio);
					$sitio = str_replace("{_IDF_}", $id, $sitio);
					$sitio = str_replace("{_SUBMIT_}", '../controlador/cargarHuespInver.php', $sitio);
					$sitio = str_replace("{_CONTEO_}", $disponibilidad-$conteo, $sitio);
				}
			
				$sitio = str_replace("{_JS_}", 'display:none', $sitio);
			}else{
				$sitio = str_replace("{_LLENOF_}", 'display:none', $sitio);
				
			}
			

		}

		$exiteVehiculo=pg_num_rows($consulVehi);

		if ($exiteVehiculo > 0) {
			$sitio = str_replace("{_FORM3_}", '', $sitio);
			$sitio = str_replace("{_LLENO_}", 'display:none', $sitio);

		}else{
			$sitio = cargaModulo("{_FORM3_}", 'formCarro', $sitio);
			$sitio = str_replace("{_IDC_}", $id, $sitio);
			$sitio = str_replace("{_SUBMIT_}", '../controlador/cargarVehiculoInver.php', $sitio);
		}
		//datos
		$lista= construirListaFamiliaresHi($consulFami);
    	//echo "<pre>";print_r($lista);echo "</pre>";


		$sitio = str_replace("{_STYLE_COLUMNA_}", 'display:none;', $sitio);	
		$sitio = str_replace("{_STYLE_COLUMNA2_}", 'display:none;', $sitio);
    	$sitio = str_replace("{_TABLA_}", $lista, $sitio);

    	$listaVehi= construirListaVehiculoHuesIn($consulVehi);

    	$sitio = str_replace("{_TABLA2_}", $listaVehi, $sitio);

	    //echo "<pre>";print_r($codDepar);echo "</pre>";
	
	

	echo $sitio;


}else{

	header('location: ../');
}


 ?>
