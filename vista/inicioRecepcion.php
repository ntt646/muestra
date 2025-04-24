<?php 

if (!empty($_GET['id'])) {
	$depa=$_GET['id'];
}else{
	$depa=0;
}

if (!empty($_GET['ac'])) {
	$codbrz=$_GET['ac'];
}else{
	$codbrz=0;
}

if (!empty($_GET['cd'])) {
	$cd=$_GET['cd'];
}else{
	$cd=0;
}

	


include('../include/modulos.php');
	

if (!empty($_SESSION['nombre'])) {
	
	$contra=$_SESSION['contra'];
	$nUser=$_SESSION['user'];

	if ($contra != base64_encode('123456')) {

		if (!empty($_GET['cod'])) {
			$nav=$_GET['cod'];
		}else{
			$nav=0;
		}
		if (!empty($_GET['if'])) {
			$br=$_GET['if'];
		}else{
			$br=0;
		}

		if ($nav==1) {

			$sitio = cargaTemplate("extenciones");

			$sitio = cargaModulo("{_MENU_IZQ_}", "menuRecep", $sitio);
			$sitio = str_replace("{_USER_}", $nUser, $sitio);
			$sitio = str_replace("{_ACTIVE2_}", 'active', $sitio);
			$sitio = str_replace("{_SEGURIDAD_}", 'display:none', $sitio);
			

			//$exiteVehiculo=pg_num_rows($consulVehiC);

			//se añadio un else para no mostara el parrafo
			if ($br==1) {
				$sitio = str_replace("{_P_}", '<p>El codigo de brazalete no existe</p>', $sitio);	
			}else{
				$sitio = str_replace("{_P_}", '', $sitio);	

			}

			$sitio = cargaModulo("{_FORM3_}", 'formCarroE', $sitio);
			//$sitio = str_replace("{_IDC_}", $id, $sitio);
			$sitio = str_replace("{_SUBMIT_}", '../controlador/cargarVehiculoExt.php', $sitio);
			
			$sitio = cargaModulo("{_FORM4_}", 'cargaAdiBrz', $sitio);

			//$exiteFecha=pg_fetch_array($consultaFecha);
		    //echo "<pre>";print_r($exiteFecha);echo "</pre>";exit;

				
			$sitio = cargaModulo("{_FECHA_}", 'fechaE', $sitio);
			//$sitio = str_replace("{_IDT_}", $id, $sitio);

		    //$listaVehi= construirListaVehiculo($consulVehiC);

		    //$sitio = str_replace("{_TABLA2_}", $listaVehi, $sitio);
			
		}elseif ($nav == 2) {
			$sitio = cargaTemplate("rptControl");

			$sitio = cargaModulo("{_MENU_IZQ_}", "menuRecep", $sitio);
			$sitio = str_replace("{_USER_}", $nUser, $sitio);
			$sitio = str_replace("{_ACTIVE3_}", 'active', $sitio);

			$lista= construirListaSeguridadHuesped($total_Huesped);
	    	$sitio = str_replace("{_TABLA_}", $lista, $sitio);
	    	$sitio = str_replace("{_STYLE_}", "", $sitio);
	    	$sitio = str_replace("{_FORM_}", "", $sitio);
	    	//$sitio = str_replace("{_ID_}", $brz, $sitio);

	    	$exiteVehiculos=pg_num_rows($totalVehiSe);

		    $listaVehis= construirListaVehiculoSe($totalVehiSe);

		    $sitio = str_replace("{_TABLA2_}", $listaVehis, $sitio);

		    $listaTraba= construirListaTrabajadoresSe($trabajadorT);

	    	$sitio = str_replace("{_TABLA4_}", $listaTraba, $sitio);



		}elseif ($nav == 3) {
			$sitio = cargaTemplate("rptControlTiempo");

			$sitio = cargaModulo("{_MENU_IZQ_}", "menuRecep", $sitio);
			$sitio = str_replace("{_USER_}", $nUser, $sitio);
			$sitio = str_replace("{_ACTIVE4_}", 'active', $sitio);

			$lista= construirListaTiempoHuesped($entrSal);
	    	$sitio = str_replace("{_TABLA_}", $lista, $sitio);
	    	
	    	//$sitio = str_replace("{_ID_}", $brz, $sitio);

	    	
		    $listaVehis= construirListaTiempoVehiculo($entrSalVe);

		    $sitio = str_replace("{_TABLA2_}", $listaVehis, $sitio);



		}elseif ($nav == 4) {
			$sitio = cargaTemplate("despacho");

			$sitio = cargaModulo("{_MENU_IZQ_}", "menuRecep", $sitio);
			$sitio = str_replace("{_USER_}", $nUser, $sitio);
			$sitio = str_replace("{_ACTIVE5_}", 'active', $sitio);
			
			
			$lista= construirListaRecepcionDespacho($fechasDepa);
		    $sitio = str_replace("{_TABLA_}", $lista, $sitio);
			//$lista= construirListaRecepcion($huespedR);
		    //$sitio = str_replace("{_TABLA_}", $lista, $sitio);
	    	//$sitio = str_replace("{_ID_}", $brz, $sitio);

		}else{

			
			//inicio Recepcion

			$sitio = cargaTemplate("inicioRecep");

			$sitio = cargaModulo("{_MENU_IZQ_}", "menuRecep", $sitio);
			$sitio = str_replace("{_USER_}", $nUser, $sitio);
			$sitio = str_replace("{_ACTIVE_}", 'active', $sitio);

			if ($cd==1) {
		    	$sitio = str_replace("{_C_}", "<p>La cedula no existe</p>", $sitio);
				
			}else{
		    	$sitio = str_replace("{_C_}", "", $sitio);

			}



			if (!empty($huespedR)) {

				$datos=pg_fetch_array($huespedFecha);
				$fechai=date("d/m/Y", strtotime($datos['fi']));
				$fechaf=date("d/m/Y", strtotime($datos['ff']));

				$lista= construirListaRecepcion($huespedR);
		    	$sitio = str_replace("{_TABLA_}", $lista, $sitio);
		    	$sitio = str_replace("{_STYLE_}", "", $sitio);
		    	$sitio = str_replace("{_STYLEE_}", "display:none;", $sitio);
		    	$sitio = str_replace("{_FORM_}", "", $sitio);
		    	$sitio = str_replace("{_ID_}", $depa, $sitio);
		    	$sitio = str_replace("{_FECHAI_}", $fechai, $sitio);
		    	$sitio = str_replace("{_FECHAF_}", $fechaf, $sitio);

		    	if ($codbrz == 3) {
		    		
		    	$sitio = str_replace("{_P_}", "<p>El codigo ingresado no existe</p>", $sitio);
		    		
		    	}elseif ($codbrz == 2) {
		    		$sitio = str_replace("{_P_}", "<p>El codigo ingresado ya esta en uso</p>", $sitio);
		    	}else{
		    		$sitio = str_replace("{_P_}", "", $sitio);
		    	}

			}else{
				$sitio = cargaModulo("{_FORM_}", "consultaCedula", $sitio);
		    	$sitio = str_replace("{_STYLE_}", "display:none", $sitio);


				//$lista= construirListaFamiliares($huesped);
		    	$sitio = str_replace("{_TABLA_}", '', $sitio);
			}
		}
		
		

		echo $sitio;
	}else{

  		$sitio = cargaTemplate("cambioContra");

  		$user=$_SESSION['user'];

		$sitio = str_replace("{_ID_}", $user, $sitio);
		$sitio = str_replace("{_MENU_IZQ_}", '', $sitio);
		$sitio = str_replace("{_RUT_}", '../controlador/modiContraUser.php', $sitio);



		echo $sitio;

  	}
}else{

	header('location: ../');
}


 ?>
