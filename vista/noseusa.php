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
            
            $sitio = cargaTemplate("reporteMorosos");

            $sitio = cargaModulo("{_MENU_IZQ_}", "menu", $sitio);
            $sitio = str_replace("{_ACTIVE4_}", 'active', $sitio);

            $update=desactivarEstatus($nav);

           
            $listaPropietarios= construirListaMorosos($rptPropietarios);

            $sitio = str_replace("{_TABLA_}", $listaPropietarios, $sitio);

            echo $sitio;

        }else{
            $sitio = cargaTemplate("reporteMorosos");

            $sitio = cargaModulo("{_MENU_IZQ_}", "menu", $sitio);
            $sitio = str_replace("{_ACTIVE4_}", 'active', $sitio);

            $update=activarEstatus($nav);


            $listaPropietarios= construirListaMorosos($rptPropietarios);

            $sitio = str_replace("{_TABLA_}", $listaPropietarios, $sitio);


            echo $sitio;
        }

}else{
//inicio administrador

$sitio = cargaTemplate("inicioAd");

$sitio = cargaModulo("{_MENU_IZQ_}", "menu", $sitio);
$sitio = str_replace("{_ACTIVE_}", 'active', $sitio);


echo $sitio;


}




 ?>
