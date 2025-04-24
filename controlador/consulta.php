<?php 



	include('../include/modulos.php');
	

	if ($_SESSION['rol']==6) {
		$id = $_POST['cedula'];
		//$productos = implode(",", $_POST['buscador']);

		echo $id;
		$consul=pg_query("SELECT estatus from familiares where cedula=$id");

		//$consul=pg_query("SELECT estatus from familiares where cedula=$number");

		$cuenta=pg_num_rows($consul);

		if ($cuenta > 0) {
			$resul=pg_fetch_array($consul);

			$estado=$resul['estatus'];
		}else{
			$estado=0;
		}

		if ($estado==1) {
			$query= pg_query("SELECT dp.iddepa
				    	from familiares fm
						inner join departamentos dp on dp.iddepa=fm.departamento
						where fm.cedula=$id");
		

		

			$datos=pg_fetch_array($query);

			$cod=$datos['iddepa'];

		
			if (!empty($cod)) {
			
				
				header('Location: ../vista/inicioRecepcion.php?id='.$cod);
				
			

			}else{
				echo "<h1 style='color:#fff;'>Error al Modificar</h1>";
			}
		}else{
			$data=1;
			header('Location: ../vista/inicioRecepcion.php?cd='.$data);
		}
	}

	if ($_SESSION['rol']==7) {
		

		if (!empty($_POST['cedula'])) {
			$number=$_POST['cedula'];
		}else{
			$number=0;
		}

		if (!empty($_POST['texto'])) {
			$text=$_POST['texto'];
		}else{
			$text='';
		}

		$consul=pg_query("SELECT estatus from familiares where cedula=$number");

		$cuenta=pg_num_rows($consul);

		if ($cuenta > 0) {
			$resul=pg_fetch_array($consul);

			$estado=$resul['estatus'];
		}else{
			$estado=0;
		}
		

		$consuldepa=pg_query("SELECT estatus from departamentos where codigo='$text'");
	
		$cuentadepa=pg_num_rows($consuldepa);

		if ($cuentadepa > 0) {
			
			$resuldepa=pg_fetch_array($consuldepa);

			$estadodepa=$resuldepa['estatus'];
		}else{
			$estadodepa=0;
		}

		if ($estado ==1) {
			if (!empty($number)) {
				$consul=pg_query("SELECT fm.idfami,fm.nombres, fm.apellidos, fm.cedula, dp.nombre as titular,
								dp.codigo , fm.edad, fm.grupo, fm.invitado, tr.nombre as torre,
								ch.codigo as brz, dp.iddepa
						    	from familiares fm
								inner join departamentos dp on dp.iddepa=fm.departamento
								inner join torres tr on dp.torre=tr.idtor
								left join codigos_huesped ch on fm.idfami=ch.idfam
								where fm.cedula='$number'");
				$resul=pg_fetch_array($consul);
				$depa=$resul['iddepa'];

				header('Location: ../vista/inicioConsul.php?id='.$depa);
			}
		}else{
			$data=1;
			header('Location: ../vista/inicioConsul.php?cd='.$data);
		}

		if ($estadodepa ==0) {	
			if (!empty($text)) {
				$consul=pg_query("SELECT fm.idfami,fm.nombres, fm.apellidos, fm.cedula, dp.nombre as titular,
								dp.codigo , fm.edad, fm.grupo, fm.invitado, tr.nombre as torre,
								ch.codigo as brz, dp.iddepa
						    	from familiares fm
								inner join departamentos dp on dp.iddepa=fm.departamento
								inner join torres tr on dp.torre=tr.idtor
								left join codigos_huesped ch on fm.idfami=ch.idfam
								where dp.codigo ilike '$text'");
				$resul=pg_fetch_array($consul);
				$depa=$resul['iddepa'];

				header('Location: ../vista/inicioConsul.php?id='.$depa);
			}
		}else{
			$data=2;
			header('Location: ../vista/inicioConsul.php?cd='.$data);
		}

		
	}

 ?>


