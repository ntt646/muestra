<?php 

    include('../include/modulos.php');
    

    $depa = $_POST['id'];


    if (!empty($_POST['placa'])) {
        $placa = $_POST['placa'];
        $modelo=$_POST['modelo'];   
        $marca=$_POST['marca'];   
        $color=$_POST['color']; 
        $obser=$_POST['observ']; 
    }else{
        $modelo = 'N/A';
        $placa='N/A';   
        $marca=0;   
        $color=0; 
    }
     
    //$productos = implode(",", $_POST['buscador']);
     $consu=pg_query("SELECT iddepa, clasificacion from departamentos where codigo='$depa'");

            $res=pg_fetch_array($consu);

            $iddepa=$res['iddepa'];
            $grupo=$res['clasificacion'];


    $query= pg_query("INSERT into vehiculo (placa, modelo, marca, color, grupo, iddepa, observacion)
                    values('$placa', '$modelo', '$marca', '$color', $grupo, $iddepa, '$obser')");
    

    if ($query) {
        
        header('Location: ../vista/inicioConsul.php');
    }else{
        echo "<h1 style='color:#fff;'>Error al Ingresar</h1>";
    }


 ?>