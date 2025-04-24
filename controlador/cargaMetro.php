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
    $resul=pg_num_rows($consul);
   /* if ($resul > 0) {
        $result=pg_fetch_array($consul);
        $existCedula=$result['cedula'];
    }else{
        $existCedula=0;
    }
    */

    if ($edad <= 8) {
        
        $query= pg_query("INSERT into familiares (nombres, apellidos, cedula, edad, grupo, departamento, invitado)
                        values('$nombre', '$apellido', NULL, $edad, 2, $depa, 1)");
        

        if ($query) {
            
            header('Location: ../vista/huespedMetro.php?id='.$depa);
        }else{
            echo "<h1 style='color:#fff;'>Error al Ingresar</h1>";
        }
    }else{
        if ($resul > 0) {
            
                $query= pg_query("UPDATE familiares set estatus=1,departamento=$depa, grupo=2,asiste=1 where cedula=$cedula;");
               //$data=1;
                //header('Location: ../vista/huespedMetro.php?id='.$depa.'&cd='.$data);
                pg_query("UPDATE departamentos set estatus=0 where iddepa=$depa");
                if ($query) {
                    
                    header('Location: ../vista/huespedMetro.php?id='.$depa);
                }else{
                    echo "<h1 style='color:#fff;'>Error al Ingresar</h1>";
                }
            }else{
                 $query= pg_query("INSERT into familiares (nombres, apellidos, cedula, edad, grupo, departamento, invitado)
                        values('$nombre', '$apellido', $cedula, $edad, 2, $depa,1)");

                pg_query("UPDATE departamentos set estatus=0 where iddepa=$depa");
            

                if ($query) {
                    
                    header('Location: ../vista/huespedMetro.php?id='.$depa);
                }else{
                    echo "<h1 style='color:#fff;'>Error al Ingresar</h1>";
                }

            }
    }

   

 ?>