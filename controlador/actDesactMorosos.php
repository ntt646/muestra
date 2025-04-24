<?php 

include('../modelo/mod_conexion.php');
include('../modelo/consultas.php');
include('../modelo/model.php');
include('../controlador/funciones.php');


if (!empty($_GET['id'])) {
	$nav=$_GET['id'];
}else{
	$nav=0;
}

if (!empty($nav)) {
        
        $validarEstatus= validarEstatus($nav);

        //echo "<pre>";print_r($validarEstatus);echo "</pre>"; exit;
        if ($validarEstatus->estatus ==2) {
            

            $update=desactivarEstatus($nav);
            header('Location: ../vista/inicioAdmin.php?cod=4');

        }else{

            $update=activarEstatus($nav);
            header('Location: ../vista/inicioAdmin.php?cod=4');

        }

}else{
//inicio administrador

$sitio = cargaTemplate("inicioAd");

$sitio = cargaModulo("{_MENU_IZQ_}", "menu", $sitio);
$sitio = str_replace("{_ACTIVE_}", 'active', $sitio);


echo $sitio;


}


 ?>
