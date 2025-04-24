<?php 

	include('../include/modulos.php');
	


	$id = $_GET['fam'];
	//$productos = implode(",", $_POST['buscador']);


	$query= pg_query("SELECT fm.idfami,fm.nombres, fm.apellidos, fm.cedula, dp.nombre as titular, dp.codigo , fm.edad, dp.iddepa
			    	from familiares fm
					inner join departamentos dp on dp.iddepa=fm.departamento
					where fm.idfami=$id");

	$datos=pg_fetch_array($query);

	$cod=$datos['iddepa'];
	
	if ($cod > 0) {
		
		pg_query("DELETE from codigos_huesped where idfam=$id");
		pg_query("DELETE from familiares where idfami=$id");

		if ($_SESSION['rol']==4) {
			
			header('Location: ../vista/huespedMetro.php?id='.$cod);
			
		}else{
			header('Location: ../vista/modiFamiliar.php?id='.$cod);
		}

	}else{
		echo "<h1 style='color:#fff;'>Error al Modificar</h1>";
	}


 ?>