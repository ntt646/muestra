<?php 

	include('../include/modulos.php');
	


	$id = $_GET['vh'];
	//$productos = implode(",", $_POST['buscador']);


	$query= pg_query("SELECT vh.idcar, vh.placa,vh.marca, vh.modelo, vh.color,dp.iddepa
					    	from vehiculo vh
							inner join departamentos dp on dp.iddepa=vh.iddepa
							where vh.idcar='$id'");

	$datos=pg_fetch_array($query);

	$cod=$datos['iddepa'];
	
	if ($cod > 0) {
		
		pg_query("DELETE from vehiculo where idcar=$id");

		if ($_SESSION['rol']==4) {
			
			header('Location: ../vista/huespedMetro.php?id='.$cod);
			
		}else{
			header('Location: ../vista/modiFamiliar.php?id='.$cod);
		}

	}else{
		echo "<h1 style='color:#fff;'>Error al Modificar</h1>";
	}


 ?>