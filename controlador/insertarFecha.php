<?php 

    include('../include/modulos.php');
    
    $depa = $_POST['idfecha'];
    if ($_POST['fechaini'] > $_POST['fechafi']) {
        
        if ($_SESSION['rol']==4) {
            header('Location: ../vista/huespedMetro.php?id='.$depa);
            echo "La fecha inicial es mayor a la fecha final";
        }elseif ($_SESSION['rol']==5) {
            header('Location: ../vista/inicioPropietario.php');
            echo "La fecha inicial es mayor a la fecha final";
        }

    }elseif (empty($_POST['fechaini']) && empty($_POST['fechafi'])) {

        if ($_SESSION['rol']==4) {
            header('Location: ../vista/huespedMetro.php?id='.$depa);
            echo "Rellene los campos de fecha";
        }elseif ($_SESSION['rol']==5) {
            header('Location: ../vista/inicioPropietario.php');
            echo "Rellene los campos de fecha";
        }

    }else{

        $fechaini = $_POST['fechaini'];
        $fechafi= $_POST['fechafi'];  
        $horaini= $_POST['horaini'];  
        $horafi= $_POST['horafi'];  

       
        
        if ($_SESSION['rol']==4) {

            $query= pg_query("INSERT into fechas (fecha_inicio, fecha_fin, grupo, departamento, hora_e, hora_s)
                        values('$fechaini', '$fechafi', 2, $depa, '$horaini', '$horafi')");

            if ($query) {
            
                header('Location: ../vista/huespedMetro.php?id='.$depa);
            }else{
                echo "<h1 style='color:#fff;'>Error al Ingresar</h1>";
            }
        }elseif ($_SESSION['rol']==5) {

            $query= pg_query("INSERT into fechas (fecha_inicio, fecha_fin, grupo, departamento, hora_e, hora_s)
                        values('$fechaini', '$fechafi', 3, $depa, '$horaini', '$horafi')");

            if ($query) {
            
                header('Location: ../vista/inicioPropietario.php?');
            }else{
                echo "<h1 style='color:#fff;'>Error al Ingresar</h1>";
            }
        }elseif ($_SESSION['rol']==3) {

            $consulR=pg_query($con,"SELECT reserva from departamentos where iddepa=$depa");
            $resulR=pg_fetch_array($consulR);

            $reserva=$resulR['reserva'];

           $query= pg_query("INSERT into fechas (fecha_inicio, fecha_fin, grupo, departamento, hora_e, hora_s, reserva)
                        values('$fechaini', '$fechafi', 1, $depa, '$horaini', '$horafi', '$reserva')");

            if ($query) {
            
                header('Location: ../vista/inicioInvermarin.php?id='.$depa);
            }else{
                echo "<h1 style='color:#fff;'>Error al Ingresar</h1>";
            }
        }
    }

    

 ?>