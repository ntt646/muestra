<?php 

    include('../include/modulos.php');
    

    $depa = $_POST['id'];


    if (!empty($_POST['nombre'])) {
        $apellido = $_POST['apellido'];
        $nombre=$_POST['nombre'];   
        $cedula=$_POST['cedula'];   
        $edad=$_POST['edad']; 
        $fechainit=$_POST['fechainit']; 
        $fechafit=$_POST['fechafit']; 
    }else{
        $apellido = 'N/A';
        $nombre='N/A';   
        $cedula=0;   
        $edad=0; 
    }
      
    $consul=pg_query($con,"SELECT cedula from trabajadores where cedula=$cedula");
    $resul=pg_fetch_array($consul);

    $existeCedula=$resul['cedula'];

    //$productos = implode(",", $_POST['buscador']);

    if ($cedula!=$existeCedula) {
         $query= pg_query("INSERT into trabajadores (nombres, apellidos, cedula, edad, grupo, departamento)
                    values('$nombre', '$apellido', $cedula, $edad, 3, $depa)");
    
        $query2= pg_query("INSERT INTO fecha_trabajador(
                     fecha_ingreso, fecha_egreso, iddepa, cedula)
                    VALUES ('$fechainit', '$fechafit', $depa, $cedula);");
    }else{
         $query= pg_query("UPDATE trabajadores set departamento= $depa, estatus=1 where cedula=$cedula");
    
        $query2= pg_query("INSERT INTO fecha_trabajador(
                     fecha_ingreso, fecha_egreso, iddepa, cedula)
                    VALUES ('$fechainit', '$fechafit', $depa, $cedula);");
    }
   

    if ($query) {
        
        header('Location: ../vista/inicioPropietario.php');
    }else{
        echo "<h1 style='color:#fff;'>Error al Ingresar</h1>";
    }


 ?>