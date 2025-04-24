<?php 

	include('../include/modulos.php');
	

	$id = $_POST['id'];
	$apellido = $_POST['apellido'];
	$nombre=$_POST['nombre'];	
	$cedula=$_POST['cedula'];	
	$edad=$_POST['edad'];	
	$depa = $_POST['depa'];


	$query= pg_query("UPDATE familiares SET nombres = '$nombre', apellidos= '$apellido', cedula=$cedula,
		edad=$edad
	 WHERE idfami = $id");
	

	if ($query) {
		
		if ($_SESSION['rol']==4) {
			
			header('Location: ../vista/huespedMetro.php?id='.$depa);
			
		}elseif ($_SESSION['rol']==3) {
			header('Location: ../vista/visualInvermarin.php?id='.$depa);
		}else{
			header('Location: ../vista/modiFamiliar.php?id='.$depa);
		}//header('Location: ../vista/inicioAdmin.php?cod=3');
	}else{
		echo "<h1 style='color:#fff;'>Error al Modificar</h1>";
	}


 ?>