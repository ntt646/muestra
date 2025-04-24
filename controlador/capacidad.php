<?php 

    include('../include/modulos.php');
    

    $capacidad = $_POST['capacidad'];
    $depa = $_POST['id'];

    if ($capacidad <=8 ) {
       
    
        $consu= pg_query("SELECT iddepa from departamentos where codigo='$depa'");
        $result=pg_fetch_array($consu);
        $iddepa=$result['iddepa'];

        $query= pg_query("UPDATE departamentos set espacios=$capacidad where iddepa=$iddepa");

        if ($query) {
        
        header('Location: ../vista/inicioInvermarin.php?cod=2');
        }else{
            echo "<h1 style='color:#fff;'>Error al Ingresar</h1>";
        }

    }else{
        ?>
        <script type="text/javascript">
            alert('La cantidad excede la capacidad disponible');
        </script>   
        <?php 

        header('Location: ../vista/inicioInvermarin.php?cod=2');

    }

    

 ?>