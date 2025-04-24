<?php 

include('modulos.php');

if (!empty($_POST)) {

	if ($_POST['action'] == 'finFamilia') {
		
		$cod= $_POST['block'];
		$depa= $_POST['depa'];

		$query= pg_query($con,"UPDATE  familiares set invitado=$cod where departamento = $depa");
	}

	if ($_POST['action'] == 'confirmarCedula') {
		
		$cedula= $_POST['ced'];
		
		$consul=pg_query($con,"SELECT cedula from familiares where cedula=$cedula");
		$resul=pg_fetch_array($consul);

		$existeCedula=$resul['cedula'];

		if ($existeCedula==$cedula) {
			$data=1;
		}else{
			
			$data=0;

		}
		echo $data;
	}


	if ($_POST['action'] == 'modiReserva') {
		
		$reserva= $_POST['reserva'];
		//$depa= $_POST['depanuereser'];
		
		$consul= pg_query("SELECT reserva from reserva where reserva='$reserva'");

    	$resul=pg_num_rows($consul);

    	if ($resul > 0) {
    		echo "1";
    	}else{
    		$query= pg_query($con,"UPDATE  reserva set reserva='$reserva' where iddepa = $depa");
			$query2= pg_query($con,"UPDATE  departamentos set reserva='$reserva' where iddepa = $depa");
	
    	}

		

	}


	if ($_POST['action'] == 'cargaCodBrazalete') {
		
		$cod= $_POST['codigo'];
	    //$depa= $_POST['id'];
	    $codfa= $_POST['codfami'];

	    $query= pg_query($con,"SELECT idcod from codigos where codigo=$cod");
	    $query2= pg_query($con,"SELECT departamento from familiares where idfami=$codfa");

	    $resul=pg_num_rows($query);

	    $data=pg_fetch_array($query2);
	    $depa=$data['departamento'];

	    if ($resul > 0) {
	        
	       $dat=pg_fetch_array($query);
	       $brazalette=$dat['idcod'];
	       
	       $consul=pg_query("SELECT codigo from codigos_huesped where idfam=$codfa");
	       $resp=pg_fetch_array($consul);

	       $existe=$resp['codigo'];

	       if ($existe != $cod) {

	           $inser= pg_query("INSERT INTO codigos_huesped(idcod, idfam, iddepa, codigo)
	                        VALUES ($brazalette, $codfa, $depa, $cod);");

	           $data=1;

	       }else{

	       	 echo "Existe";
	       }

	        if (!empty($data)) {
		        return $data;
		    } else {
		        return false;
		    }
		}
	}

	if ($_POST['action']=='password') {

		$user= $_POST['user'];

		$key="";
		$pattern= "1234567890abcdefghijklmnopqrstuvwxyz";
		$max = strlen($pattern)-1;
		for ($i=0; $i < 6; $i++) { 
			$key .= substr($pattern, mt_rand(0,$max), 1);
		}

		$consu= pg_query("SELECT iduser from usuarios where usuario ='$user'");
	    $resul=pg_fetch_array($consu);
	    $iduser=$resul['iduser'];

	    $newPass=base64_encode($key);
	    $sql = pg_query("UPDATE usuarios set contra= '$newPass', contra2='$newPass'
	                        where iduser =$iduser;");

	    $data=pg_fetch_object($sql);

	   if (!empty($data)) {
	        return $data;
	    } else {
	        return false;
	    }
	}

	if ($_POST['action']=='asiste') {

		$idfam= $_POST['idfam'];

		$consu= pg_query("SELECT asiste from familiares where idfami ='$idfam'");
	    $resul=pg_fetch_array($consu);
	    $asiste=$resul['asiste'];

	    if ($asiste == 1) {
	    	$sql = pg_query("UPDATE familiares set asiste= 0
	                        where idfami =$idfam;");
	    	$process=0;
	    }else{
	    	$sql = pg_query("UPDATE familiares set asiste= 1
	                        where idfami =$idfam;");
	    	$process=1;
	    }


	   echo $process;
	}

	if ($_POST['action']=='salidaTotal') {

		$depa= $_POST['depa'];

		//verifica fecha
		$consufecha= pg_query("SELECT *
							from  fechas
							where departamento=$depa");

	    $resul=pg_num_rows($consufecha);
	    

	    //quita la fecha
	    if ($resul > 0) {
	    	$fecha = pg_query("UPDATE fechas set estatus=0 where departamento =$depa;");
	    }else{
	    	echo "Error al despachar motivado a la fecha";
	    }

	    $consufechacli= pg_query("SELECT *
							from  fechas_clientes
							where departamento=$depa");

	    $resulcli=pg_num_rows($consufechacli);
	    

	    //quita la fecha
	    if ($resulcli > 0) {
	    	$fechacli = pg_query("UPDATE fechas_clientes set estatus=0 where departamento =$depa;");
	    }else{
	    	echo "Error al despachar motivado a la fecha cliente";
	    }

	    $consuhora= pg_query("SELECT *	from  hora	where departamentos=$depa");

	    $resulhora=pg_num_rows($consuhora);
	    

	    if ($resulhora > 0) {
	    	$hora = pg_query("UPDATE hora set estatus=0 where departamentos =$depa;");
	    }else{
	    	echo "Error al despachar motivado a la hora";
	    }

	    $consuhoraR= pg_query("SELECT *
							from  hora_real
							where departamentos=$depa");

	    $resulhoraR=pg_num_rows($consuhoraR);
	    

	    if ($resulhoraR > 0) {
	    	$hora_real = pg_query("UPDATE hora_real set estatus=0 where departamentos =$depa;");
	    }else{
	    	echo "Error al despachar motivado a la fecha";
	    }

	    //quita la reserva
	    $consuReserva= pg_query("SELECT *
							from  reserva
							where iddepa=$depa");

	    $resulReserva=pg_num_rows($consuReserva);
	    

	    if ($resulReserva > 0) {
	    	$reserva = pg_query("UPDATE reserva set estatus=0 where iddepa =$depa;");
	    }

	    //fecha y hora vehiculo
	    $consuhoravh= pg_query("SELECT *
							from  horavh
							where departamentos=$depa");

	    $resulhoravh=pg_num_rows($consuhoravh);
	    

	    if ($resulhoravh > 0) {
	    	$horavh = pg_query("UPDATE horavh set estatus=0 where departamentos =$depa;");
	    }else{
	    	echo "Error al despachar motivado a la fecha";
	    }

	    $consuhoraRvh= pg_query("SELECT *
							from  hora_realvh
							where departamentos=$depa");

	    $resulhoraRvh=pg_num_rows($consuhoraRvh);
	    

	    if ($resulhoraRvh > 0) {
	    	$hora_realvh = pg_query("UPDATE hora_realvh set estatus=0 where departamentos =$depa;");
	    }else{
	    	echo "Error al despachar motivado a la fecha";
	    }

	    //verifica familiares

	    $consufamiliares=pg_query("SELECT * from familiares where departamento=$depa");

	     $resulFamilia=pg_num_rows($consufamiliares);
	    

	    if ($resulFamilia > 0) {
	    	$familia = pg_query("UPDATE familiares set estatus=0 where departamento =$depa and invitado=1;");
	    	$familia2 = pg_query("UPDATE familiares set asiste=0, chequeo=0 where departamento =$depa;");
	    }else{
	    	echo "Error al despachar motivado a los huespedes";
	    }

	    //verifica brazaletes

	    $consubrazaletes=pg_query("SELECT * from codigos_huesped where iddepa=$depa");

	     $resulBrazalete=pg_num_rows($consubrazaletes);
	    

	    if ($resulBrazalete > 0) {

	    	$brazalete = pg_query("UPDATE codigos_huesped set estatus=0 where iddepa =$depa;");
	    }else{
	    	echo "Error al despachar motivado a los brazaetes";
	    }

	    //verifica vehiculos

	    $consuvehiculo=pg_query("SELECT * from vehiculo where iddepa=$depa");

	     $resulVehiculo=pg_num_rows($consuvehiculo);
	    

	    if ($resulVehiculo > 0) {

	    	$vehiculo = pg_query("UPDATE vehiculo set chequeo=0, estatus=0 where iddepa =$depa;");
	    }else{
	    	echo "Error al despachar motivado a los vehiculos";
	    }

	    pg_query("UPDATE departamentos set estatus = 1, reserva='' where iddepa=$depa and clasificacion!=3");

	}
	
}


 ?>