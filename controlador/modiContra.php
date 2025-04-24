<?php 

    include('../include/modulos.php');
    

    $user = $_POST['user'];
    $pass = base64_encode('123456');
    //$confiPass = $_POST['conficontra'];

    $consu= pg_query("SELECT iduser from usuarios where usuario='$user'");
    $result=pg_fetch_array($consu);
    $iduser=$result['iduser'];

    $query= pg_query("UPDATE usuarios set contra='$pass', contra2='$pass' where iduser=$iduser");
    

    if ($query) {
        ?>
        <script type="text/javascript">
            alert('Modificación exitosa');
        </script>
        <?php 
        header('Location: ../vista/inicioAdmin.php?cod=5');
    }else{
        echo "<h1 style='color:#fff;'>Error al Ingresar</h1>";
        header('Location: ../vista/inicioAdmin.php?cod=5&err=1');

    }


 ?>