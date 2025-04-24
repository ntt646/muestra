<?php 

    include('../include/modulos.php');
    

    $reserva = $_POST['reserva'];
    $depa = $_POST['id'];

    $consul= pg_query("SELECT reserva from reserva where reserva='$reserva'");

    $resul=pg_num_rows($consul);

    if ($resul > 0) {
    	
    	header('Location: ../vista/inicioInvermarin.php?cod=3&p=1');

    }else{
    	$query= pg_query("UPDATE departamentos set reserva='$reserva' where iddepa=$depa");

    	$querys= pg_query("INSERT INTO reserva(
					iddepa, reserva)
					VALUES ($depa, '$reserva');");

    	 if ($query) {
    
	    header('Location: ../vista/inicioInvermarin.php?cod=3');
	    }else{
	        echo "<h1 style='color:#fff;'>Error al Ingresar</h1>";
	    }

    }
    
   
    

    

 ?>