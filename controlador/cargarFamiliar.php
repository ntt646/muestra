<?php 

    include('../include/modulos.php');
    

    $depa = $_POST['id'];


    if (!empty($_POST['nombre'])) {
        $apellido = $_POST['apellido'];
        $nombre=$_POST['nombre'];   
        $cedula=$_POST['cedula'];   
        $edad=$_POST['edad']; 
    }else{
        $apellido = 'N/A';
        $nombre='N/A';   
        $cedula=0;   
        $edad=0; 
    }

     $consul=pg_query($con,"SELECT cedula from familiares where cedula=$cedula");
    $resul=pg_fetch_array($consul);

    $existeCedula=$resul['cedula'];

    if ($edad <= 8) {
        
        $query= pg_query("INSERT into familiares (nombres, apellidos, cedula, edad, grupo, departamento, invitado, asiste)
                    values('$nombre', '$apellido', NULL, $edad, 3, $depa, 2,0)");
    
        if ($query) {
            
            header('Location: ../vista/inicioPropietario.php');
        }else{
            echo "<h1 style='color:#fff;'>Error al Ingresar</h1>";
        }
    }else{

        if ($existeCedula!=$cedula) {
        $consul= pg_query("SELECT * from familiares where departamento=$depa");

        $resul=pg_num_rows($consul);

        if ($resul >= 1) {
            $query= pg_query("INSERT into familiares (nombres, apellidos, cedula, edad, grupo, departamento, invitado, asiste)
                        values('$nombre', '$apellido', $cedula, $edad, 3, $depa, 2,0)");
        }else{

            $query= pg_query("INSERT into familiares (nombres, apellidos, cedula, edad, grupo, departamento, invitado, asiste)
                        values('$nombre', '$apellido', $cedula, $edad, 3, $depa, 3,0)");

            pg_query("UPDATE departamentos set estatus=0 where iddepa=$depa");
        }
         
        //$productos = implode(",", $_POST['buscador']);

        

        if ($query) {
            
            header('Location: ../vista/inicioPropietario.php');
        }else{
            echo "<h1 style='color:#fff;'>Error al Ingresar</h1>";
        }
        
    }else{
            $data=1;
            header('Location: ../vista/inicioPropietario.php?cd='.$data);

    }
    }


 ?>