<?php 
include('../modelo/model.php');

if (!empty($_FILES)) {

//echo $_FILES;


    foreach ($_FILES["archivo"]['tmp_name'] as $key => $tmp_name ) {

            //Validamos que el archivo exista

        if ($_FILES["archivo"]["name"][$key]) {
            //echo "<pre>";print_r($_FILES["archivo"]['name']);echo "</pre>";exit;

            $filename = $_FILES["archivo"]["name"][$key]; //Obtenemos el nombre original del archivo
            $nombreArchivo=$filename;
            $source = $_FILES["archivo"]["tmp_name"][$key]; //Obtenemos un nombre temporal del archivo
            $nombreTmpArchivo=$source;

            //echo "<pre>";print_r($filename);echo "</pre>";exit;

            $directorio = '../recursos/respaldos/Carga_de_Archivos'; //Declaramos un  variable con la ruta donde guardaremos los archivos
            //Validamos si la ruta de destino existe, en caso de no existir la creamos

            if (!file_exists($directorio)) {

                mkdir($directorio, 0777) or die("No se puede crear el directorio de extracci&oacute;n");
            }

            $dir = opendir($directorio); //Abrimos el directorio de destino
            $target_path = $directorio . '/' . $nombreArchivo; //Indicamos la ruta de destino, así como el nombre del archivo
            //Movemos y validamos que el archivo se haya cargado correctamente
            //El primer campo es el origen y el segundo el destino
                
            if (!file_exists($target_path)) {
                 
            	move_uploaded_file($nombreTmpArchivo, $target_path);

                $idrespaldo = agregarCargaArchivos($nombreArchivo);

                  
                
                // echo "El archivo $filename se ha almacenado en forma exitosa. ";
                //$sitio=  str_replace("{_RSP_}", 'access', $sitio); //er1 = Archivo Guardado

                /////----------------INICIO BLOQUE PARA LA LECTURA DE ARCHIVOS----------------------/////

                include ('../recursos/inportacionEXCEL/carga.php');
                
                header('Location: ../vista/inicioAdmin.php?cod=2');


            }       
                 /////--------------FIN BLOQUE PARA LA LECTURA DE ARCHIVOS-----------------------/////
    
        } 
        else 
        {
                //se agrego en caso de que el archivo existA
                    header('Location: ../vista/inicioAdmin.php?cod=2&fi=3');

                //$sitio=  str_replace("{_RSP_}", 'er1', $sitio); //er1 = Archivo Existente    
        }
                closedir($dir); //Cerramos el directorio de destino
                ///error al agregar  
                //header('Location: ../vista/inicioAdmin.php?cod=2&fi=2');

    }       
            

}  




 ?>