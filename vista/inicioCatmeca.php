<?php 

include('../include/modulos.php');
	

if (!empty($_SESSION['nombre'])) {
	
	$nUser=$_SESSION['user'];
    $contra=$_SESSION['contra'];

	if ($contra != base64_encode('123456')) {

		if (!empty($_GET['cod'])) {
			$nav=$_GET['cod'];
		}else{
			$nav=0;
		}


		if (!empty($nav)) {
		    
		    if ($nav==2) {
		       
		    	//reporte  por departamentos

		    	$sitio = cargaTemplate("reportePropietario");

		        $sitio = cargaModulo("{_MENU_IZQ_}", "menuMetro", $sitio);
				$sitio = str_replace("{_USER_}", $nUser, $sitio);

		        $sitio = str_replace("{_ACTIVE3_}", 'active', $sitio);
		        $sitio = str_replace("{_PDF_}", '2', $sitio);
		        $sitio = str_replace("{_MODIFICAR_}", '<th>Cargar Huesped</th>', $sitio);
		        $sitio = str_replace("{_CAPACIDAD_}", '', $sitio);
		        $sitio = str_replace("{_RESER_}", '', $sitio);




		        //$tabla=rptPropietarios();
		        //$tabla=pg_fetch_array($rptPropietarios);
				//echo "<pre>";print_r($tabla);echo "</pre>";

				$listaMetro= construirListaCacmeca($rptCacmeca);


		        $sitio = str_replace("{_TABLA_}", $listaMetro, $sitio);

		        echo $sitio;
		    }
		}else{
		//inicio Cacmeca

		$sitio = cargaTemplate("inicioMetro");

		$sitio = cargaModulo("{_MENU_IZQ_}", "menuMetro", $sitio);
		$sitio = str_replace("{_USER_}", $nUser, $sitio);
		
		$sitio = str_replace("{_ACTIVE_}", 'active', $sitio);
		$sitio = str_replace("{_PDF_}", 'active', $sitio);

		$listaHuesped= construirListaHuespedCacmeca($huespedCacmeca);

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
