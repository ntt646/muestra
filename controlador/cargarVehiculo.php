<?php 

    include('../include/modulos.php');
    

    $depa = $_POST['id'];


    if (!empty($_POST['placa'])) {
        $placa = $_POST['placa'];
        $modelo=$_POST['modelo'];   
        $marca=$_POST['marca'];   
        $color=$_POST['color']; 
    }else{
        $modelo = 'N/A';
        $placa='N/A';   
        $marca=0;   
        $color=0; 
    }
     
    //$productos = implode(",", $_POST['buscador']);

    $query= pg_query("INSERT into vehiculo (placa, modelo, marca, color, grupo, iddepa)
                    values('$placa', '$modelo', '$marca', '$color', 3, $depa)");
    

    if ($query) {
        
        header('Location: ../vista/inicioPropietario.php');
    }else{
        echo "<h1 style='color:#fff;'>Error al Ingresar</h1>";
    }


 ?>