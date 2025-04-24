<?php 

    include('../include/modulos.php');
    

   
    //$depa= $_POST['id'];
    $idfam= $_POST['idfam'];

    $query= pg_query($con,"SELECT departamento, chequeo from familiares where idfami=$idfam");
    $resul=pg_fetch_array($query);
    $depa=$resul['departamento'];
    $check=$resul['chequeo'];

    $queryD= pg_query($con,"SELECT fecha_inicio as fi, fecha_fin as ff from fechas where departamento=$depa and estatus=1");
    $resulD=pg_fetch_array($queryD);
    $fi=$resulD['fi'];
    $ff=$resulD['ff'];

    if ($check==1) {
        header('Location: ../vista/inicioConsul.php?id='.$depa);
    }else{
        if (!empty($idfam)) {
            $query2= pg_query($con,"UPDATE familiares set chequeo=1 where idfami=$idfam");

            $horae=date('H:i:s');
            $fech=date('d-m-Y H:i:s');

            pg_query("INSERT INTO hora(
                hora_entrada, hora_salida, hora_ingreso, departamentos, idfam, lugar)
                VALUES ('$horae','00:00', '$fech', $depa, $idfam, 1);");

            pg_query("INSERT INTO hora_real(
                            hora_entrada, hora_salida, departamentos, idfam, lugar)
                            VALUES ('$horae','00:00',$depa,$idfam, 1);");

            pg_query("INSERT INTO fechas_clientes(
                    fecha_ingreso, fecha_egreso, idfami, iddepa)
                    VALUES ('$fi', '$ff',$idfam,$depa);");
        }
    

        if ($query2) {
            
            
            header('Location: ../vista/inicioConsul.php?id='.$depa);
            

        }else{
            header('Location: ../vista/inicioConsul.php');
            //echo "hola";
            //datoInvalido($cod);
        }
    }

    


 ?>