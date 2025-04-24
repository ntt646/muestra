<?php 


include('../include/modulos.php');

if (!empty($_SESSION['user'])) {
	
   $contra=$_SESSION['contra'];
   //echo "<pre>";print_r($mod_contra);echo "</pre>";exit;

   if ($contra != base64_encode('123456')) {
   		//inicio propietario

		$sitio = cargaTemplate("inicioPropie");

		if (!empty($_GET['cd'])) {
			$par=$_GET['cd'];
		}else{
			$par=0;
		}

		$codDepar=$_SESSION['user'];

		include('../modelo/consultas.php');

		$datos=pg_fetch_array($consulDepa);
		//$cuenta=pg_fetch_array($consulDepaTotal);
		$torre=$datos['nombre'];
		$estado=$datos['estatus'];
		$id=$datos['iddepa'];
		$class=$datos['invitado'];

		//echo $class;


		$sitio = str_replace("{_DEPA_}", $codDepar, $sitio);
		$sitio = str_replace("{_TORRE_}", $torre, $sitio);


		if ($estado==2) {
			$sitio = str_replace("{_MOROSO_}", 'display:none', $sitio);
			$sitio = str_replace("{_STYLE_EST_}", 'background-color:red', $sitio);
			$sitio = cargaModulo("{_ERROR_}", 'moroso', $sitio);
			
		}else{
			//FAMILIARES
			$sitio = str_replace("{_NO_MOROSO_}", 'display:none', $sitio);

			$conteo=pg_num_rows($consulFamicuent);

			$exiteFecha=pg_num_rows($consulFecha);
    		//echo "<pre>";print_r($hoy);echo "</pre>";exit;

			if ($exiteFecha > 0) {
				$sitio = str_replace("{_FECHA_}", '', $sitio);
				$sitio = str_replace("{_STYLE_FECHA_}", 'display:none;', $sitio);
			}else{
				
				$sitio = cargaModulo("{_FECHA_}", 'fecha', $sitio);
				$sitio = str_replace("{_IDT_}", $id, $sitio);

			}


			if ($conteo < 8) {

				//$fam=pg_fetch_array($consulFami);

				if ($class == 1) {
					//$sitio = cargaModulo("{_FORM_}", '', $sitio);
					$sitio = str_replace("{_LLENOF_}", 'display:none', $sitio);
					$sitio = str_replace("{_JS_}", 'display:block', $sitio);

				}else{
 
					if ($par==1) {
					$sitio = str_replace("{_P_}", '<p>Cedula Invalida</p>', $sitio);
					
					}else{
						$sitio = str_replace("{_P_}", '<p></p>', $sitio);

					}	
					$sitio = cargaModulo("{_FORM_}", 'form2', $sitio);
					$sitio = str_replace("{_IDF_}", $id, $sitio);
					$sitio = str_replace("{_SUBMIT_}", '../controlador/cargarFamiliar.php', $sitio);
					$sitio = str_replace("{_CONTEO_}", 8-$conteo, $sitio);
				}
				
				$sitio = str_replace("{_JS_}", 'display:none', $sitio);

				//INVITADOS
			
				if ($par==2) {
					$sitio = str_replace("{_P_}", '<p>Cedula Invalida</p>', $sitio);
					
				}else{
					$sitio = str_replace("{_P_}", '<p></p>', $sitio);

				}
				$sitio = cargaModulo("{_FORM2_}", 'form2', $sitio);
				$sitio = str_replace("{_IDF_}", $id, $sitio);
				$sitio = str_replace("{_SUBMIT_}", '../controlador/cargaInvitados.php', $sitio);
				$sitio = str_replace("{_CONTEO_}", 8-$conteo, $sitio);
			}else{

				if ($par==2) {
					$sitio = str_replace("{_P_}", '<p>Cedula Invalida</p>', $sitio);
					
				}else{
					$sitio = str_replace("{_P_}", '<p></p>', $sitio);

				}
				
				$sitio = str_replace("{_LLENOF_}", 'display:none', $sitio);
				$sitio = str_replace("{_INVITADOS_CLUB_}", 'display:none', $sitio);

			}

			$sitio = cargaModulo("{_FORM5_}", 'form3', $sitio);
			$sitio = str_replace("{_IDF_}", $id, $sitio);
			$sitio = str_replace("{_SUBMIT_}", '../controlador/cargaInvitados.php', $sitio);
			//$sitio = str_replace("{_CONTEO_}", 8-$conteo, $sitio);

			//VEHICULO
			$exiteVehiculo=pg_num_rows($consulVehi);

			if ($exiteVehiculo > 0) {
				$sitio = str_replace("{_FORM3_}", '', $sitio);
				$sitio = str_replace("{_LLENO_}", 'display:none', $sitio);

			}else{
				$sitio = cargaModulo("{_FORM3_}", 'formCarro', $sitio);
				$sitio = str_replace("{_IDC_}", $id, $sitio);
				$sitio = str_replace("{_SUBMIT_}", '../controlador/cargarVehiculo.php', $sitio);
			}
			

			//TRABAJADOR
			$sitio = cargaModulo("{_FORM4_}", 'formTrabajador', $sitio);
			$sitio = str_replace("{_IDT_}", $id, $sitio);
			$sitio = str_replace("{_SUBMIT_}", '../controlador/cargarTrabajador.php', $sitio);


			//datos
			$lista= construirListaFamiliaresE($consulFami);
	    	//echo "<pre>";print_r($lista);echo "</pre>";


			$sitio = str_replace("{_STYLE_COLUMNA_}", 'display:none;', $sitio);	
			$sitio = str_replace("{_STYLE_COLUMNA2_}", 'display:none;', $sitio);
	    	$sitio = str_replace("{_TABLA_}", $lista, $sitio);

	    	$listaVehi= construirListaVehiculoE($consulVehi);

	    	$sitio = str_replace("{_TABLA2_}", $listaVehi, $sitio);

	    	//rpt trabajadores

	    	$listaTraba= construirListaTrabajadores($consulTrabajador);

	    	$sitio = str_replace("{_TABLA4_}", $listaTraba, $sitio);

	    	//rpt codigos de brazaletes

	    	$listaBraza= construirListaBrazalete($consulBraza);

	    	$sitio = str_replace("{_TABLA3_}", $listaBraza, $sitio);

		    //echo "<pre>";print_r($codDepar);echo "</pre>";
		}
		

		echo $sitio;
  	}else{

  		$sitio = cargaTemplate("cambioContra");

  		$codDepar=$_SESSION['user'];

		$sitio = str_replace("{_ID_}", $codDepar, $sitio);
		$sitio = str_replace("{_RUT_}", '../controlador/modiContraPropie.php', $sitio);



		echo $sitio;

  	}
	
}else{

	header('location: ../');
}


 ?>
