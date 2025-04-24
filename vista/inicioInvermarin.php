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

		if (!empty($_GET['p'])) {
			$p=$_GET['p'];
		}else{
			$p=0;
		}



		if (!empty($nav)) {
		    
		    if ($nav==2) {
		        
		        //reporte  por departamentos

		    	$sitio = cargaTemplate("reportePropietario");

		        $sitio = cargaModulo("{_MENU_IZQ_}", "menuInver", $sitio);
		        $sitio = str_replace("{_USER_}", $nUser, $sitio);
		        $sitio = str_replace("{_ACTIVE3_}", 'active', $sitio);
		        $sitio = str_replace("{_PDF_}", '1', $sitio);
		        $sitio = str_replace("{_MODIFICAR_}", '<th>Detalle</th>', $sitio);
		        $sitio = str_replace("{_CAPACIDAD_}", '<th>Capacidad</th>', $sitio);
		        $sitio = str_replace("{_RESER_}", '', $sitio);

		        $listaInver= construirListaInverCapacidad($rptInvermarin);


		        $sitio = str_replace("{_TABLA_}", $listaInver, $sitio);

		        echo $sitio;
		    }elseif ($nav==3) {

		    	$sitio = cargaTemplate("reportePropietarioReser");

		        $sitio = cargaModulo("{_MENU_IZQ_}", "menuInver", $sitio);
		        $sitio = str_replace("{_USER_}", $nUser, $sitio);
		        
		        $sitio = str_replace("{_ACTIVE4_}", 'active', $sitio);

		        if ($p==1) {
		        	$sitio = str_replace("{_RE_}", '<p>Ver departamento</p>', $sitio);
		        	
		        }else{
		        	$sitio = str_replace("{_RE_}", '', $sitio);

		        }


		        $sitio = str_replace("{_PDF_}", '1', $sitio);
		        $sitio = str_replace("{_MODIFICAR_}", '', $sitio);
		        $sitio = str_replace("{_RESER_}", '<th>Reserva</th>', $sitio);

		        $listaInver= construirListaInverReserva($rptInvermarin);


		        $sitio = str_replace("{_TABLA_}", $listaInver, $sitio);

		        echo $sitio;
		    }
		}else{
		//inicio Invermarin

		$sitio = cargaTemplate("inicioInver");

		$sitio = cargaModulo("{_MENU_IZQ_}", "menuInver", $sitio);
		$sitio = str_replace("{_USER_}", $nUser, $sitio);
		$sitio = str_replace("{_ACTIVE_}", 'active', $sitio);

		$listaHuesped= construirListaHuespedInver($huespedInvermarin);

		$sitio = str_replace("{_TABLA_}", $listaHuesped, $sitio);


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
