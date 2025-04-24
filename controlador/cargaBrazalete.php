<?php 

    include('../include/modulos.php');
    

    $cod= $_POST['codbr'];
    //$depa= $_POST['id'];
    $codfa= $_POST['codfa'];

    $query= pg_query($con,"SELECT idcod from codigos where codigo=$cod");
    $query2= pg_query($con,"SELECT departamento from familiares where idfami=$codfa");
    

    $resul=pg_num_rows($query);

    $data=pg_fetch_array($query2);
    $depa=$data['departamento'];

    $queryR= pg_query($con,"SELECT cedula from familiares where departamento=$depa and idfami=$codfa");
    $dataR=pg_fetch_array($queryR);
    $cedula=$dataR['cedula'];

    $query3= pg_query($con,"SELECT reserva from departamentos where iddepa=$depa");
    $data3=pg_fetch_array($query3);
    $rese=$data3['reserva'];

    if ($resul > 0) {
        
        $dat=pg_fetch_array($query);
        $brazalette=$dat['idcod'];
       
        $consul=pg_query("SELECT codigo from codigos where codigo=$cod");
        $resp=pg_fetch_array($consul);

        $existe=$resp['codigo'];


        $consulBrz=pg_query("SELECT codigo from codigos_huesped where codigo=$existe");
        $respBrz=pg_fetch_array($consulBrz);

        $existeBrz=$respBrz['codigo'];

        if (empty($existeBrz)) {

            $inser= pg_query("INSERT INTO codigos_huesped(idcod, idfam, iddepa, codigo)
                            VALUES ($brazalette, $codfa, $depa, $cod);");

            pg_query("UPDATE codigos SET estatus=0 WHERE idcod=$brazalette;" );
            pg_query("UPDATE hora SET codbra=$brazalette WHERE idfam=$codfa;" );
            pg_query("UPDATE hora_real SET codbra=$brazalette WHERE idfam=$codfa;");
            pg_query("UPDATE reserva_cliente SET brazalete=$cod WHERE iddepa=$depa and cedula=$cedula and reserva='rese';");
            
            $process=1;
        }else{

            echo "Existe";
            $process=2;
        }


        
        
        header('Location: ../vista/inicioRecepcion.php?id='.$depa.'&ac='.$process);
        

    }else{

        $process=3;
        header('Location: ../vista/inicioRecepcion.php?id='.$depa.'&ac='.$process);
        //echo "hola";
        //datoInvalido($cod);
    }


 ?>