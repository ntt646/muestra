<?php 

    include('../include/modulos.php');
    

   
    //$depa= $_POST['id'];
    $idtr= $_POST['idtrs'];

    //echo $idtr;
    $query= pg_query($con,"SELECT departamento, cedula from trabajadores where idtrab=$idtr");
    $resul=pg_fetch_array($query);
    $depa=$resul['departamento'];
    $cedula=$resul['cedula'];
    

    if (!empty($idtr)) {

        $horaS=date('H:i:s');
        $fecha=date('Y-m-d');
        
        $query2= pg_query($con,"UPDATE trabajadores set chequeo=0 where idtrab=$idtr");

        pg_query("UPDATE fecha_trabajador set hora_salida='$horaS', lugar=1
                    where iddepa=$depa");

        $consu= pg_query($con,"SELECT fecha_ingreso as fecha_egreso as fe from fecha_trabajador where iddepa=$depa");

        $data=pg_fetch_array($consu);
        $fi=$data['fe'];
        $fe=$data['fe'];


        if ($fe <= $fecha) {
            pg_query("UPDATE fecha_trabajador set estatus=0, lugar=1
                    where iddepa=$depa and cedula=$cedula");
            pg_query("UPDATE trabajadores set estatus=0
                    where idtrab=$idtr");
        }

    }
    

    if ($query2) {
        
        
        header('Location: ../vista/inicioConsul.php?id='.$depa);
        

    }else{
        header('Location: ../vista/inicioConsul.php');
        //echo "hola";
        //datoInvalido($cod);
    }


 ?>