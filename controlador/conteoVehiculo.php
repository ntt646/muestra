<?php 

    include('../include/modulos.php');
    

   
    //$depa= $_POST['id'];
    $idcar= $_POST['idcar'];

    $query= pg_query($con,"SELECT iddepa, placa, chequeo from vehiculo where idcar=$idcar");
    $resul=pg_fetch_array($query);
    $depa=$resul['iddepa'];
    $placa=$resul['placa'];
    $check=$resul['chequeo'];

    $queryD= pg_query($con,"SELECT fecha_inicio as fi, fecha_fin as ff from fechas where departamento=$depa and estatus=1");
    $resulD=pg_fetch_array($queryD);
    $fi=$resulD['fi'];
    $ff=$resulD['ff'];

    if ($check==1) {
         header('Location: ../vista/inicioConsul.php?id='.$depa);
    }else{
        if (!empty($idcar)) {

        $horae=date('H:i:s');
        $fech=date('d-m-Y H:i:s');
        

        $query2= pg_query($con,"UPDATE vehiculo set chequeo=1 where idcar=$idcar");

        pg_query("INSERT INTO horavh(
                             hora_entrada, hora_salida, hora_ingreso, departamentos, placa, idcar, lugar)
                            VALUES ('$horae','00:00', '$fech', $depa,'$placa',$idcar, 1);");

        pg_query("INSERT INTO hora_realvh(
                        hora_entrada, hora_salida, departamentos, placa, idcar, lugar)
                        VALUES ('$horae','00:00', $depa,'$placa',$idcar, 1);");

        pg_query("INSERT INTO fechas_clientes(
                fecha_ingreso, fecha_egreso, idcar, iddepa)
                VALUES ('$fi', '$ff',$idcar,$depa);");
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