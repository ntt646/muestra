<?php 

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

		if (!empty($_GET['err'])) {
			$err=$_GET['err'];
		}else{
			$err=0;
		}

		if (!empty($_GET['fi'])) {
			$arch=$_GET['fi'];
		}else{
			$arch=0;
		}


		if (!empty($nav)) {
		    
		    if ($nav==2) {
		        //carga masiva de brazalete
		        $sitio = cargaTemplate("cargaMasiva");

		        $sitio = cargaModulo("{_MENU_IZQ_}", "menu", $sitio);
		        $sitio = str_replace("{_ACTIVE2_}", 'active', $sitio);
				$sitio = str_replace("{_USER_}", $nUser, $sitio);

		        $sitio = str_replace("{_ACTION_}", '../controlador/cargaMasiva.php', $sitio);
		        

		        $validarCarga=validarCarga();

				//echo "<pre>";print_r($validarCarga);echo "</pre>";exit;

				if ($arch==1) {
		        	$sitio = str_replace("{_P_}", '<p>El campo esta vacio ingrese un documento valido</p>', $sitio);
					
				}elseif ($arch==2) {
					$sitio = str_replace("{_P_}", '<p>Error al subir el archivo</p>', $sitio);
				}elseif ($arch==3) {
					$sitio = str_replace("{_P_}", '<p>El documento ya existe</p>', $sitio);
				}else{
					$sitio = str_replace("{_P_}", '', $sitio);
				}

		        if ($validarCarga >0) {
		        	$sitio = str_replace("{_RSP_}", 'access', $sitio);
		        }else{
		        	$sitio = str_replace("{_RSP_}", '', $sitio);
		        }

		        $listaCodigos= construirListaCodigos($rptBrazalete);


		        $sitio = str_replace("{_TABLA_}", $listaCodigos, $sitio);

		        echo $sitio;
		    }elseif ($nav==3) {
		    	//reporte para la modificacion familiar por departamento propietarioa

		    	$sitio = cargaTemplate("reportePropietario");

		        $sitio = cargaModulo("{_MENU_IZQ_}", "menu", $sitio);
				$sitio = str_replace("{_USER_}", $nUser, $sitio);
		        $sitio = str_replace("{_ACTIVE3_}", 'active', $sitio);
		        $sitio = str_replace("{_PDF_}", '', $sitio);

		        //$tabla=rptPropietarios();
		        //$tabla=pg_fetch_array($rptPropietarios);
				//echo "<pre>";print_r($tabla);echo "</pre>";
		        $sitio = str_replace("{_MODIFICAR_}", '<th>modificar</th>', $sitio);
		        $sitio = str_replace("{_CAPACIDAD_}", '', $sitio);
			    $sitio = str_replace("{_RESER_}", '', $sitio);


				$listaPropietarios= construirListaPropietarios($rptPropietarios);


		        $sitio = str_replace("{_TABLA_}", $listaPropietarios, $sitio);
		        //$sitio = str_replace("{_TABLA_}", $listaPropietarios, $sitio);


		        echo $sitio;
		    }elseif ($nav == 4) {

		    	//reporte de morosos; activacion/desactivacion de morosos

		    	$sitio = cargaTemplate("reporteMorosos");

		        $sitio = cargaModulo("{_MENU_IZQ_}", "menu", $sitio);
				$sitio = str_replace("{_USER_}", $nUser, $sitio);

		        $sitio = str_replace("{_ACTIVE4_}", 'active', $sitio);

		        //$tabla=rptPropietarios();

		        //echo "<pre>";print_r($tabla);echo "</pre>";
		        $listaPropietarios= construirListaMorosos($rptPropietarios);

		        $sitio = str_replace("{_TABLA_}", $listaPropietarios, $sitio);

		        echo $sitio;

		    }elseif ($nav == 5) {

		    	//reporte de morosos; activacion/desactivacion de morosos

		    	$sitio = cargaTemplate("ajustes");

		        $sitio = cargaModulo("{_MENU_IZQ_}", "menu", $sitio);
				$sitio = str_replace("{_USER_}", $nUser, $sitio);

		        $sitio = str_replace("{_ACTIVE5_}", 'active', $sitio);

		        if ($err==1) {
		        	$sitio = str_replace("{_P_}", '<p>El usuario  no exite</p>', $sitio);
		        }else{
		       		$sitio = str_replace("{_P_}", '<p></p>', $sitio);

		        }

		        //$tabla=rptPropietarios();

		        //echo "<pre>";print_r($tabla);echo "</pre>";
		        //$listaPropietarios= construirListaMorosos($rptPropietarios);

		        //$sitio = str_replace("{_TABLA_}", $listaPropietarios, $sitio);

		        echo $sitio;
		    }


 
		}else{
		//inicio administrador

		$sitio = cargaTemplate("inicioAd");

		$sitio = cargaModulo("{_MENU_IZQ_}", "menu", $sitio);
		$sitio = str_replace("{_USER_}", $nUser, $sitio);

		$sitio = str_replace("{_ACTIVE_}", 'active', $sitio);

		$cuenta=pg_fetch_assoc($total_personas);
		$total=$cuenta['cuenta'];
		$sitio = str_replace("{_TOTAL_}", $total, $sitio);

		$listaHuesped= construirListaHuesped($listaHuespe);

		$sitio = str_replace("{_TABLA_}", $listaHuesped, $sitio);


		echo $sitio;


		}
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
