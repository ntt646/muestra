<?php 

if (!empty($_GET['id'])) {
	$depa=$_GET['id'];
}else{
	$depa=0;
}
if (!empty($_GET['brz'])) {
	$brz=$_GET['brz'];
}else{
	$brz=0;
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

		if (!empty($nav)) {

			if ($nav==1) {
				$sitio = cargaTemplate("seguri");

				$sitio = cargaModulo("{_MENU_IZQ_}", "menuCon", $sitio);
				$sitio = str_replace("{_USER_}", $nUser, $sitio);

				$sitio = str_replace("{_ACTIVE3_}", 'active', $sitio);


				if (!empty($brazalete)) {
					//inicio Recepcion

					
					$datos=pg_fetch_array($huesFechaBrz);
					$fechai=$datos['fi'];
					$fechaf=$datos['ff'];

				//$conteo = pg_num_rows($consult);

				//if ($conteo > 1) {
					$lista= construirListaSeguridad($brazalete);
			    	$sitio = str_replace("{_TABLA_}", $lista, $sitio);
			    	$sitio = str_replace("{_STYLE_}", "", $sitio);
			    	$sitio = str_replace("{_FORM_}", "", $sitio);
			    	$sitio = str_replace("{_ID_}", $brz, $sitio);
				/*}else{
					$sitio = str_replace("{_TABLA_}", 'UNO', $sitio);
				}*/

				
			    	$sitio = str_replace("{_FECHAI_}", $fechai, $sitio);
			    	$sitio = str_replace("{_FECHAF_}", $fechaf, $sitio);

				}else{
					$sitio = cargaModulo("{_FORM_}", "EntraSal", $sitio);
			    	$sitio = str_replace("{_STYLE_}", "display:none", $sitio);


					//$lista= construirListaFamiliares($huesped);
			    	$sitio = str_replace("{_TABLA_}", '', $sitio);
				}
				echo $sitio;

			}

			if ($nav==2) {
				$sitio = cargaTemplate("rptSeguri");

				$sitio = cargaModulo("{_MENU_IZQ_}", "menuCon", $sitio);
				$sitio = str_replace("{_USER_}", $nUser, $sitio);
				$sitio = str_replace("{_ACTIVE2_}", 'active', $sitio);


				if (!empty($total_Huesped)) {
								
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
			    	

				}else{
					
			    	$sitio = str_replace("{_TABLA_}", '', $sitio);
				}
				echo $sitio;

			}

			if ($nav==3) {

				$sitio = cargaTemplate("extenciones");

				$sitio = cargaModulo("{_MENU_IZQ_}", "menuCon", $sitio);
				$sitio = str_replace("{_USER_}", $nUser, $sitio);
				$sitio = str_replace("{_ACTIVE4_}", 'active', $sitio);
				$sitio = str_replace("{_CONTROL_}", 'display:none;', $sitio);
				//$exiteVehiculo=pg_num_rows($consulVehiC);

				//se añadio un else para no mostara el parrafo
				/*if ($br==1) {
					$sitio = str_replace("{_P_}", '<p>El codigo de brazalete no existe</p>', $sitio);	
				}else{*/
					$sitio = str_replace("{_P_}", '', $sitio);	

				//}

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

				echo $sitio;

			}


		}else{

			//inicio Consultor

			$sitio = cargaTemplate("inicioSeguridad");

			$sitio = cargaModulo("{_MENU_IZQ_}", "menuCon", $sitio);
			$sitio = str_replace("{_USER_}", $nUser, $sitio);
			$sitio = str_replace("{_ACTIVE_}", 'active', $sitio);

			if ($cd==1) {
		    	$sitio = str_replace("{_C_}", "<p>La cedula no existe</p>", $sitio);
				
			}elseif ($cd==2) {
				$sitio = str_replace("{_C_}", "<p>El departamento no esta disponible</p>", $sitio);
			}else{
		    	$sitio = str_replace("{_C_}", "", $sitio);

			}


			if (!empty($huesped)) {

				$contFech=pg_num_rows($huespedFecha);
				if ($contFech  > 0) {
					
				
					$datos=pg_fetch_array($huespedFecha);
					$fechai=date("d/m/Y", strtotime($datos['fi']));
					$fechaf=date("d/m/Y", strtotime($datos['ff']));
				}else{
					$fechai='No';
					$fechaf='disponible';
				}
				//$conteo = pg_num_rows($consult);

				//if ($conteo > 1) {
					$lista= construirListaSeguridad($huesped);
			    	$sitio = str_replace("{_TABLA_}", $lista, $sitio);
			    	$sitio = str_replace("{_STYLE_}", "", $sitio);
			    	$sitio = str_replace("{_FORM_}", "", $sitio);
			    	$sitio = str_replace("{_ID_}", $depa, $sitio);
				/*}else{
			 		$sitio = str_replace("{_TABLA_}", 'UNO', $sitio);
				}*/
					$exiteVehiculo=pg_num_rows($consulVehiSe);

				    $listaVehi= construirListaVehiculoS($consulVehiSe);

				    $sitio = str_replace("{_TABLA2_}", $listaVehi, $sitio);

				    $listaTraba= construirListaTrabajadoresE($trabajador);
			    	$sitio = str_replace("{_CAPACIDADT_}", '<th>Chequeo</th>', $sitio);

	    			$sitio = str_replace("{_TABLA4_}", $listaTraba, $sitio);
				
				
		    	$sitio = str_replace("{_FECHAI_}", $fechai, $sitio);
		    	$sitio = str_replace("{_FECHAF_}", $fechaf, $sitio);

			}else{
				$sitio = cargaModulo("{_FORM_}", "consult", $sitio);
		    	$sitio = str_replace("{_STYLE_}", "display:none", $sitio);


				//$lista= construirListaFamiliares($huesped);
		    	$sitio = str_replace("{_TABLA_}", '', $sitio);
			}
		    
	        	//echo $fech;exit;
			echo $sitio;

		}
	}else{

  		$sitio = cargaTemplate("cambioContra");

  		$user=$_SESSION['user'];

		$sitio = str_replace("{_MENU_IZQ_}", '', $sitio);
		$sitio = str_replace("{_ID_}", $user, $sitio);
		$sitio = str_replace("{_RUT_}", '../controlador/modiContraUser.php', $sitio);



		echo $sitio;

  	}

	
}else{

	header('location: ../');
}


 ?>
