<?php 

    include('../include/modulos.php');
    

    $depa = $_POST['id'];
    $pass = base64_encode($_POST['pass1']);
    $confiPass = base64_encode($_POST['pass2']);

    $consu= pg_query("SELECT iduser from usuarios where usuario='$depa'");
    $result=pg_fetch_array($consu);
    $iduser=$result['iduser'];

    $query= pg_query("UPDATE usuarios set contra='$pass', contra2='$confiPass' where iduser=$iduser");
    

    if ($query) {
        
        header('Location: ../');
    }else{
        echo "<h1 style='color:#fff;'>Error al Ingresar</h1>";
    }


 ?>