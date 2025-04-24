<?php 

    include('../include/modulos.php');
    
    $reserva= $_POST['nuevareserv'];
    $depa= $_POST['idnuerese'];

    $consul= pg_query("SELECT reserva from reserva where reserva='$reserva'");

    $resul=pg_num_rows($consul);

    if ($resul > 0) {

        ?>
        <script type="text/javascript">
            alert('La reserva ya existe');
        </script>   
        <?php 

        header('Location: ../vista/inicioInvermarin.php?cod=3');

    }else{
        
        $query= pg_query($con,"UPDATE  reserva set reserva='$reserva' where iddepa = $depa");
        $query2= pg_query($con,"UPDATE  departamentos set reserva='$reserva' where iddepa = $depa");

        if ($query) {
        
        header('Location: ../vista/inicioInvermarin.php?cod=3');
        }else{
            echo "<h1 style='color:#fff;'>Error al Ingresar</h1>";
        }

    }

    

 ?>