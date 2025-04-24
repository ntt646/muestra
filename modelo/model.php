<?php 

include('mod_conexion.php');

function agregarCargaArchivos ($nombreArchivo) {
    //global $c_host, $c_user, $c_pass, $c_db;
    //$database = new database($c_host, $c_user, $c_pass);
    //$database->setDb($c_db);
    $sql = pg_query("INSERT into carga_archivos (nombre_archivo) VALUES ('$nombreArchivo');");
   echo "1";
}

function insercionCodigos ($codigo) {
    //global $c_host, $c_user, $c_pass, $c_db;
    //$database = new database($c_host, $c_user, $c_pass);
    //$database->setDb($c_db);
    $consulta=pg_query("SELECT codigo,estatus from codigos where codigo=$codigo ");

    $resul=pg_num_rows($consulta);

    if ($resul> 0) {
        $result=pg_fetch_array($consulta);

        $estatus=$result['estatus'];
        $codigoE=$result['codigo'];
    }else{
        //$estatus=$result['estatus'];
        $codigoE=0;
    }
    

    if ($codigo!=$codigoE) {
        $sql = pg_query("INSERT into codigos (codigo) VALUES ($codigo);");
    }else{

        if ($estatus==0) {
            $sql = pg_query("INSERT into codigos (codigo) VALUES ($codigo);");
        }
    }

   
   
}

function validarCarga () {
    //global $c_host, $c_user, $c_pass, $c_db;
    //$database = new database($c_host, $c_user, $c_pass);
    //$database->setDb($c_db);
    $sql = pg_query("SELECT * from carga_archivos where fecha = current_date;");


   
   $data=pg_num_rows($sql);

   if (!empty($data)) {
        return $data;
    } else {
        return false;
    }
}

function activarEstatus ($codigo) {
    //global $c_host, $c_user, $c_pass, $c_db;
    //$database = new database($c_host, $c_user, $c_pass);
    //$database->setDb($c_db);
    $sql = pg_query("UPDATE departamentos set  estatus=2  where iddepa=$codigo;");

   $data=pg_fetch_object($sql);

   if (!empty($data)) {
        return $data;
    } else {
        return false;
    }
   
}

function desactivarEstatus ($codigo) {
    //global $c_host, $c_user, $c_pass, $c_db;
    //$database = new database($c_host, $c_user, $c_pass);
    //$database->setDb($c_db);
    $sql = pg_query("UPDATE departamentos set  estatus=1  where iddepa=$codigo;");

   $data=pg_fetch_object($sql);

   if (!empty($data)) {
        return $data;
    } else {
        return false;
    }
   
}

function validarEstatus ($codigo) {
    //global $c_host, $c_user, $c_pass, $c_db;
    //$database = new database($c_host, $c_user, $c_pass);
    //$database->setDb($c_db);
    $sql = pg_query("SELECT estatus from departamentos where iddepa=$codigo
    	order by estatus desc");

   $data=pg_fetch_object($sql);

   if (!empty($data)) {
        return $data;
    } else {
        return false;
    }
   
}


function consultarFamilia ($codigo) {
    //global $c_host, $c_user, $c_pass, $c_db;
    //$database = new database($c_host, $c_user, $c_pass);
    //$database->setDb($c_db);
    $sql = pg_query("SELECT fm.idfami, fm.nombres, fm.apellidos, fm.cedula, dp.nombre as titular, dp.codigo ,
    				fm.edad 
			    	from familiares fm
					inner join departamentos dp on dp.iddepa=fm.departamento
					where dp.iddepa=$codigo");

   $data=pg_fetch_object($sql);

   //echo "<pre>";print_r($data);echo "</pre>";

   if (!empty($data)) {
        return $data;
    } else {
        return false;
    }
   
}



function rptPropietarios () {
    //global $c_host, $c_user, $c_pass, $c_db;
    //$database = new database($c_host, $c_user, $c_pass);
    //$database->setDb($c_db);
    $sql = pg_query("SELECT dp.iddepa, dp.codigo, dp.nombre as propietario, tr.nombre as torre, gr.nombre,
    					dp.estatus
						from departamentos dp 
						inner join torres tr on tr.idtor = dp.torre
						inner join grupo gr on gr.idgr= dp.clasificacion
						where dp.clasificacion =3;");

    $data=pg_fetch_object($sql);

   if (!empty($data)) {
        return $data;
    } else {
        return false;
    }
   
}


function modificaPassword ($pass, $user) {
    //global $c_host, $c_user, $c_pass, $c_db;
    //$database = new database($c_host, $c_user, $c_pass);
    //$database->setDb($c_db);

    $consu= pg_query("SELECT iduser from usuarios where usuario ='$user'");
    $resul=pg_fetch_array($consu);
    $iduser=$resul['iduser'];

    $sql = pg_query("UPDATE usuarios set contra= '$pass', contra2='$pass'
                        where iduser =$iduser;");

    $data=pg_fetch_object($sql);

   if (!empty($data)) {
        return $data;
    } else {
        return false;
    }
   
}

 ?>