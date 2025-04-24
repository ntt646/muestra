<?php 

    include('../include/modulos.php');
    

   
    //$depa= $_POST['id'];
    $idtr= $_POST['idtr'];

    echo $idtr;
    $query= pg_query($con,"SELECT departamento, cedula, chequeo from trabajadores where idtrab=$idtr");
    $resul=pg_fetch_array($query);
    $depa=$resul['departamento'];
    $cedula=$resul['cedula'];
    $check=$resul['chequeo'];
    
    if ($check==1) {
        header('Location: ../vista/inicioConsul.php?id='.$depa);
    }else{
        if (!empty($idtr)) {

        $horae=date('H:i:s');
        
        $query2= pg_query($con,"UPDATE trabajadores set chequeo=1 where idtrab=$idtr");

        pg_query("UPDATE fecha_trabajador set hora_entrada='$horae', hora_salida='00:00', lugar=1
                    where iddepa=$depa");

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