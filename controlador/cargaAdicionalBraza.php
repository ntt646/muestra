<?php 

    include('../include/modulos.php');
    

    $depart = $_POST['depab'];


       
    $codigo=$_POST['cod']; 
    $codigoA=$_POST['codA']; 
    $obser=$_POST['obser']; 
    
     
    //$productos = implode(",", $_POST['buscador']);
    $bzr= pg_query($con,"SELECT idcod from codigos where codigo=$codigo");
    $consudep= pg_query($con,"SELECT iddepa from departamentos where codigo='$depart'");
    $resultadodep=pg_fetch_array($consudep);
    $iddepa=$resultadodep['iddepa'];

    $resul=pg_num_rows($bzr);



    if ($resul > 0) {
        $query=pg_query("SELECT idcod, idfam, iddepa from codigos_huesped where codigo=$codigoA");

        $resultado=pg_fetch_array($query);
        $idf=$resultado['idfam'];
        $depa=$resultado['iddepa'];
        $brazalette=$resultado['idcod'];

        $queryR= pg_query($con,"SELECT cedula,nombres,apellidos,edad from familiares where departamento=$iddepa and idfami=$idf");
        $dataR=pg_fetch_array($queryR);
        $cedula=$dataR['cedula'];
        $nombres=$dataR['nombres'];
        $apellidos=$dataR['apellidos'];
        $edad=$dataR['edad'];

        $queryD= pg_query($con,"SELECT reserva from departamentos where iddepa=$depa");
        $numD=pg_num_rows($queryD);

        if ($numD>0) {
            $dataD=pg_fetch_array($queryD);
            $rese=$dataD['reserva'];
            
        }else{
            $rese=0;
        }

        if (!empty($rese) && $rese!=0) {
            $reserva=pg_query("INSERT INTO reserva_cliente(reserva, nombre, apellido, cedula, edad, iddepa,observacion)
                            VALUES ('$rese', '$nombres', '$apellidos', $cedula,$edad, $depa,'$obser');");
        }


        $up=pg_query("UPDATE codigos_huesped set estatus=0 where idcod=$brazalette"); 

        $inser= pg_query("INSERT INTO codigos_huesped(idcod, idfam, iddepa, codigo, observacion)
                            VALUES ($brazalette, $idf, $iddepa, $codigo, '$obser');");
        

        if ($inser) {
            
            header('Location: ../vista/inicioRecepcion.php');
        }else{
            echo "<h1 style='color:#fff;'>Error al Ingresar</h1>";
        }

    }else{
        //Se agrego codigo para parrafo
            header('Location: ../vista/inicioRecepcion.php?cod=1&if=1');

    }

   

 ?>