<?php 

	include('../include/modulos.php');
	

	$id = $_POST['id'];
	$placa = $_POST['placa'];
	$marca=$_POST['marca'];	
	$modelo=$_POST['modelo'];	
	$color=$_POST['color'];	
	$depa = $_POST['depa'];


	$query= pg_query("UPDATE vehiculo SET placa = '$placa', marca= '$marca', modelo='$modelo',
		color='$color'
	 WHERE idcar = $id");
	

	if ($query) {
		
		if ($_SESSION['rol']==4) {
			
			header('Location: ../vista/huespedMetro.php?id='.$depa);
			
		}else{
			header('Location: ../vista/modiVehiculo.php?id='.$depa);
		}//header('Location: ../vista/inicioAdmin.php?cod=3');
	}else{
		echo "<h1 style='color:#fff;'>Error al Modificar</h1>";
	}


 ?>