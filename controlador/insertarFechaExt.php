<?php 

    include('../include/modulos.php');
    
    $depa = $_POST['idfecha'];
    
        $horafi = $_POST['horafi'];
        $fechafi= $_POST['fechafi'];  
        $obser= $_POST['obse'];  

       
        

        $consu=pg_query("SELECT iddepa from departamentos where codigo='$depa'");

        $res=pg_fetch_array($consu);

        $iddepa=$res['iddepa'];

        if (!empty($fechafi)) {
            $query= pg_query("UPDATE fechas set fecha_fin='$fechafi', observacion='$obser'
             where departamento=$iddepa ");
        }

        if (!empty($horafi)) {
            $query= pg_query("UPDATE fechas set hora_s='$horafi', observacion='$obser'
             where departamento=$iddepa ");
        }


        if ($query) {
        
            header('Location: ../vista/inicioRecepcion.php?');
        }else{
            echo "<h1 style='color:#fff;'>Error al Ingresar</h1>";
        }
        
    

    

 ?>