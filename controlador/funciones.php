<?php 

function cargaTemplate($template)
{
    $sitio = file_get_contents("../vista/planti/".$template.".php");
    return $sitio;
}

function cargaModulo($texto,$modulo,$sitio)
{
  
        $sitio = str_replace($texto, file_get_contents("../vista/planti/".$modulo.".php"),$sitio);
    
	return $sitio;
}

/*function generarPassword($length, $user){
	$key="";
	$pattern= "1234567890abcdefghijklmnopqrstuvwxyz";
	$max = strlen($pattern)-1;
	for ($i=0; $i < $length; $i++) { 
		$key .= substr($pattern, mt_rand(0,$max), 1);
	}
	return $key;

    modificaPassword($key, $user);

}*/


function construirListaMorosos($data) {
    //echo "<pre>";print_r($data);echo "</pre>";

    $filas='';
    if ($data == '') {
        $rows = '<td>No existen datos de los Morosos</td>';
        $filas .= $rows;
    }
    else{
            //echo "<pre>";print_r($filas);echo "</pre>";
    	$count=pg_num_rows($data);
    	if ($count > 0) {

	        while ($datas = pg_fetch_array($data)) {

	        	//echo "<pre>";print_r($value);echo "</pre>";

	            if ($data <> "") {

	                $rows = file_get_contents("planti/tablaMorosos.html");

	                $rows = str_replace("{_ID_}", $datas['iddepa'], $rows);
	                $rows = str_replace("{_TR_}", $datas['torre'], $rows);
	                $rows = str_replace("{_NUM_}", $datas['codigo'], $rows);
	                $rows = str_replace("{_PRO_}", $datas['propietario'], $rows);
	                $rows = str_replace("{_STATUS_}", $datas['estatus'], $rows);

	                if ($datas['estatus']==2) {
	            		$rows = str_replace("{_STYLE_}", 'background-color: red;color:white;', $rows);
	            		$rows = str_replace("{_ESTATUS_}", "<img src='../recursos/img/unlock-fill.svg' width='32' height='32' title='Modificar' style='color:'>", $rows);
	                }else{
	            		$rows = str_replace("{_STYLE_}", '', $rows);
	            		$rows = str_replace("{_ESTATUS_}", "<img src='../recursos/img/lock-fill.svg' width='32' height='32' title='Modificar' >", $rows);
	                }
	                               

	                $filas .= $rows;
	            }
	    	}
	    }
    }

    $dato = ($filas);

    return $dato;
     
}

function construirListaPropietarios($data) {
    //echo "<pre>";print_r($data);echo "</pre>";

    $filas='';
    if ($data == '') {
        $rows = '<td>No existen datos de los propietarios</td>';
        $filas .= $rows;
    }
    else{
            //echo "<pre>";print_r($filas);echo "</pre>";
    	
    	$count=pg_num_rows($data);
    	if ($count > 0) {
    		
	        while ($datas = pg_fetch_array($data))  {

	        	//echo "<pre>";print_r($data);echo "</pre>";

	            if ($data <> "") {

	                $rows = file_get_contents("planti/tablaPropietarios.html");
	                $rows = str_replace("{_TR_}", $datas['torre'], $rows);
	                $rows = str_replace("{_NUM_}", $datas['codigo'], $rows);
	                $rows = str_replace("{_PRO_}", $datas['propietario'], $rows);
	                $rows = str_replace("{_CONTEO1_}", $datas['brz'], $rows);
	                $rows = str_replace("{_CONTEO2_}", $datas['est'], $rows);

	                if ($datas['estatus']==2) {
	            		$rows = str_replace("{_COLOR_}", 'background-color: red;', $rows);
	            		$rows = str_replace("{_STYLE_}", 'display:none;', $rows);
	            		$rows = str_replace("{_BOTON_}", "", $rows);
	                }else{
	            		$rows = str_replace("{_COLOR_}", '', $rows);
	            		$rows = str_replace("{_STYLE_}", '', $rows);
	            		$rows = str_replace("{_BOTON_}", $datas['iddepa'], $rows);
	                }
	                               

	                //$horas= criterioSobreTiempo($value->cantidad);
	                //$rows = str_replace("{_CRITERIO_}", $horas, $rows);

	                $filas .= $rows;
	            }
	        }
	    }
    }

    $dato = ($filas);

    return $dato;
    
}


function construirListaCacmeca($data) {
    //echo "<pre>";print_r($data);echo "</pre>";

    $filas='';
    if ($data == '') {
        $rows = '<td>No existen datos de los departamentos</td>';
        $filas .= $rows;
    }
    else{
            //echo "<pre>";print_r($filas);echo "</pre>";
    	
    	$count=pg_num_rows($data);
    	if ($count > 0) {
    		
	        while ($datas = pg_fetch_array($data))  {

	        	//echo "<pre>";print_r($data);echo "</pre>";

	            if ($data <> "") {

	                $rows = file_get_contents("planti/tablaCacmeca.html");
	                $rows = str_replace("{_TR_}", $datas['torre'], $rows);
	                $rows = str_replace("{_NUM_}", $datas['codigo'], $rows);
	                $rows = str_replace("{_PRO_}", $datas['propietario'], $rows);
	                $rows = str_replace("{_BOTON_}", $datas['iddepa'], $rows);
	                $rows = str_replace("{_CONTEO1_}", $datas['brz'], $rows);
	                $rows = str_replace("{_CONTEO2_}", $datas['est'], $rows);

	                $filas .= $rows;
	            }
	        }
	    }
    }

    $dato = ($filas);

    return $dato;
    
}

function construirCargaCatmeca($data) {
    //echo "<pre>";print_r($data);echo "</pre>";

    $filas='';
    if ($data == '') {
        $rows = '<td>No existen huespedes cargados</td>';
        $filas .= $rows;
    }
    else{
            //echo "<pre>";print_r($filas);echo "</pre>";
    	
    	$count=pg_num_rows($data);
    	if ($count > 0) {
    		
	        while ($datas = pg_fetch_array($data))  {

	        	//echo "<pre>";print_r($data);echo "</pre>";

	            if ($data <> "") {

	                $rows = file_get_contents("planti/tablaCacmeca.html");
	                $rows = str_replace("{_TR_}", $datas['torre'], $rows);
	                $rows = str_replace("{_NUM_}", $datas['codigo'], $rows);
	                $rows = str_replace("{_PRO_}", $datas['propietario'], $rows);
	                $rows = str_replace("{_STYLE_}", 'display:none;', $rows);
	                

	                $filas .= $rows;
	            }
	        }
	    }
    }

    $dato = ($filas);

    return $dato;
    
}


function construirListaFamiliares($data) {
    //echo "<pre>";print_r($data);echo "</pre>";

    $filas='';
    if ($data == '') {
        $rows = '<td>No existen datos Familiares cargados</td>';
        $filas .= $rows;
    }
    else{
            //echo "<pre>";print_r($filas);echo "</pre>";
    	
    	$count=pg_num_rows($data);
    	if ($count > 0) {
    		
	        while ($datas = pg_fetch_array($data))  {

	        	//echo "<pre>";print_r($datas);echo "</pre>";

	            if ($data <> "") {

	                $rows = file_get_contents("planti/tablaFamiliares.html");
	                $rows = str_replace("{_NOMBRE_}", $datas['nombres'], $rows);
	                $rows = str_replace("{_APELLIDO_}", $datas['apellidos'], $rows);
	                $rows = str_replace("{_CEDULA_}", $datas['cedula'], $rows);
	                $rows = str_replace("{_EDAD_}", $datas['edad'], $rows);
	                $rows = str_replace("{_STYLEP_}", 'display:none', $rows);
	                $rows = str_replace("{_TITULAR_}", $datas['titular'], $rows);
	               
	                $rows = str_replace("{_BOTON_}", $datas['idfami'], $rows);

	                if ($datas['grupo'] == 1 ) {
	                	//$rows = str_replace("{_STYLE_}", 'display:none;', $rows);
	                	$rows = str_replace("{_CONTEO_STYLE_}", 'display:block', $rows);
	                	$rows = str_replace("{_CONTEO_}", '0', $rows);
	                	$rows = str_replace("{_CODIGO_}", $datas['codigo'], $rows);

	                	       	
	                }elseif ( $datas['grupo'] == 3) {
	                	//$rows = str_replace("{_STYLE_}", 'display:none;', $rows);
	                	$rows = str_replace("{_CONTEO_STYLE_}", 'display:none;', $rows);
	                	$rows = str_replace("{_CONTEO_}", '0', $rows);
	                	 if ($datas['invitado']==1) {
	                		$rows = str_replace("{_CODIGO_}", 'Invitado', $rows);
		                }elseif ($datas['invitado']==3) {
		                	$rows = str_replace("{_CODIGO_}", 'Titular', $rows);
		                }else{
		                	$rows = str_replace("{_CODIGO_}", 'Familiar', $rows);
	                	}
	                	       	
	                }else{
	                	$rows = str_replace("{_CONTEO_STYLE_}", 'display:none', $rows);
	                	$rows = str_replace("{_STYLE_}", 'display:none', $rows);
	                	$rows = str_replace("{_CONTEO_}", '0', $rows);
	                	$rows = str_replace("{_CODIGO_}", $datas['codigo'], $rows);

	                }	                               

	                //$horas= criterioSobreTiempo($value->cantidad);
	                //$rows = str_replace("{_CRITERIO_}", $horas, $rows);

	                $filas .= $rows;
	            }
	        }
	    }
    }

    $dato = ($filas);

    return $dato;
    
}

function construirListaFamiliaresAd($data) {
    //echo "<pre>";print_r($data);echo "</pre>";

    $filas='';
    if ($data == '') {
        $rows = '<td>No existen datos Familiares cargados</td>';
        $filas .= $rows;
    }
    else{
            //echo "<pre>";print_r($filas);echo "</pre>";
    	
    	$count=pg_num_rows($data);
    	if ($count > 0) {
    		
	        while ($datas = pg_fetch_array($data))  {

	        	//echo "<pre>";print_r($datas);echo "</pre>";

	            if ($data <> "") {

	                $rows = file_get_contents("planti/tablaFamiliares.html");
	                $rows = str_replace("{_NOMBRE_}", $datas['nombres'], $rows);
	                $rows = str_replace("{_APELLIDO_}", $datas['apellidos'], $rows);
	                $rows = str_replace("{_CEDULA_}", $datas['cedula'], $rows);
	                $rows = str_replace("{_EDAD_}", $datas['edad'], $rows);
	                $rows = str_replace("{_STYLEP_}", 'display:none', $rows);
	                $rows = str_replace("{_TITULAR_}", $datas['titular'], $rows);
	               
	                $rows = str_replace("{_BOTON_}", $datas['idfami'], $rows);

	                if ($datas['grupo'] == 1 ) {
	                	//$rows = str_replace("{_STYLE_}", 'display:none;', $rows);
	                	$rows = str_replace("{_CONTEO_STYLE_}", 'display:block', $rows);
	                	$rows = str_replace("{_CONTEO_}", '0', $rows);
	                	$rows = str_replace("{_CODIGO_}", $datas['codigo'], $rows);

	                	       	
	                }elseif ( $datas['grupo'] == 3) {
	                	//$rows = str_replace("{_STYLE_}", 'display:none;', $rows);
	                	$rows = str_replace("{_CONTEO_STYLE_}", 'display:none;', $rows);
	                	$rows = str_replace("{_CONTEO_}", '0', $rows);
	                	 if ($datas['invitado']==1) {
	                		$rows = str_replace("{_CODIGO_}", 'Invitado', $rows);
		                }elseif ($datas['invitado']==3) {
		                	$rows = str_replace("{_CODIGO_}", 'Titular', $rows);
		                }else{
		                	$rows = str_replace("{_CODIGO_}", 'Familiar', $rows);
	                	}
	                	       	
	                }else{
	                	//$rows = str_replace("{_CONTEO_STYLE_}", 'display:none', $rows);
	                	//$rows = str_replace("{_STYLE_}", 'display:none', $rows);
	                	$rows = str_replace("{_CONTEO_}", '0', $rows);
	                	$rows = str_replace("{_CODIGO_}", $datas['codigo'], $rows);

	                }	                               

	                //$horas= criterioSobreTiempo($value->cantidad);
	                //$rows = str_replace("{_CRITERIO_}", $horas, $rows);

	                $filas .= $rows;
	            }
	        }
	    }
    }

    $dato = ($filas);

    return $dato;
    
}

function construirListaFamiliaresHi($data) {
    //echo "<pre>";print_r($data);echo "</pre>";

    $filas='';
    if ($data == '') {
        $rows = '<td>No existen datos Familiares cargados</td>';
        $filas .= $rows;
    }
    else{
            //echo "<pre>";print_r($filas);echo "</pre>";
    	
    	$count=pg_num_rows($data);
    	if ($count > 0) {
    		
	        while ($datas = pg_fetch_array($data))  {

	        	//echo "<pre>";print_r($datas);echo "</pre>";

	            if ($data <> "") {

	                $rows = file_get_contents("planti/tablaFamiliares.html");
	                $rows = str_replace("{_NOMBRE_}", $datas['nombres'], $rows);
	                $rows = str_replace("{_APELLIDO_}", $datas['apellidos'], $rows);
	                $rows = str_replace("{_CEDULA_}", $datas['cedula'], $rows);
	                $rows = str_replace("{_EDAD_}", $datas['edad'], $rows);
	                $rows = str_replace("{_STYLEP_}", 'display:none', $rows);
	                $rows = str_replace("{_STYLE_}", 'display:none', $rows);
	                $rows = str_replace("{_TITULAR_}", $datas['titular'], $rows);
	               
	                $rows = str_replace("{_BOTON_}", $datas['idfami'], $rows);

	                if ($datas['grupo'] == 1 ) {
	                	//$rows = str_replace("{_STYLE_}", 'display:none;', $rows);
	                	$rows = str_replace("{_CONTEO_STYLE_}", 'display:block', $rows);
	                	$rows = str_replace("{_CONTEO_}", '0', $rows);
	                	$rows = str_replace("{_CODIGO_}", $datas['codigo'], $rows);

	                	       	
	                }elseif ( $datas['grupo'] == 3) {
	                	//$rows = str_replace("{_STYLE_}", 'display:none;', $rows);
	                	$rows = str_replace("{_CONTEO_STYLE_}", 'display:none;', $rows);
	                	$rows = str_replace("{_CONTEO_}", '0', $rows);
	                	 if ($datas['invitado']==1) {
	                	$rows = str_replace("{_CODIGO_}", 'Invitado', $rows);
		                }else{
		                	$rows = str_replace("{_CODIGO_}", 'Familiar', $rows);
	                	}
	                	       	
	                }else{
	                	$rows = str_replace("{_CONTEO_STYLE_}", 'display:none', $rows);
	                	$rows = str_replace("{_STYLE_}", 'display:none', $rows);
	                	$rows = str_replace("{_CONTEO_}", '0', $rows);
	                	$rows = str_replace("{_CODIGO_}", $datas['codigo'], $rows);

	                }	                               

	                //$horas= criterioSobreTiempo($value->cantidad);
	                //$rows = str_replace("{_CRITERIO_}", $horas, $rows);

	                $filas .= $rows;
	            }
	        }
	    }
    }

    $dato = ($filas);

    return $dato;
    
}

function construirListaFamiliaresE($data) {
    //echo "<pre>";print_r($data);echo "</pre>";

    $filas='';
    if ($data == '') {
        $rows = '<td>No existen datos Familiares cargados</td>';
        $filas .= $rows;
    }
    else{
            //echo "<pre>";print_r($filas);echo "</pre>";
    	
    	$count=pg_num_rows($data);
    	if ($count > 0) {
    		
	        while ($datas = pg_fetch_array($data))  {

	        	//echo "<pre>";print_r($datas);echo "</pre>";

	            if ($data <> "") {

	                $rows = file_get_contents("planti/tablaFamiliares.html");
	                $rows = str_replace("{_NOMBRE_}", $datas['nombres'], $rows);
	                $rows = str_replace("{_APELLIDO_}", $datas['apellidos'], $rows);
	                $rows = str_replace("{_CEDULA_}", $datas['cedula'], $rows);
	                $rows = str_replace("{_EDAD_}", $datas['edad'], $rows);
					
					if ($datas['asiste']==0 && ($datas['invitado']==2 || $datas['invitado']==3)) {
						$rows = str_replace("{_TEXTO_}", 'ACTIVAR', $rows);
						$rows = str_replace("{_STYLEP_}", 'display:block;', $rows);
					}elseif ($datas['asiste']==1 && ($datas['invitado']==2 || $datas['invitado']==3)) {
						
						$rows = str_replace("{_TEXTO_}", 'DESACTIVAR', $rows);
						$rows = str_replace("{_STYLEP_}", 'display:block;', $rows);
					}else{
						$rows = str_replace("{_STYLEP_}", 'display:none;', $rows);

					}
	                $rows = str_replace("{_TITULAR_}", $datas['titular'], $rows);
	               
	                $rows = str_replace("{_BOTON_}", $datas['idfami'], $rows);

	                if ($datas['grupo'] == 1 ) {
	                	$rows = str_replace("{_STYLE_}", 'display:none;', $rows);
	                	$rows = str_replace("{_CONTEO_STYLE_}", 'display:block', $rows);
	                	$rows = str_replace("{_CONTEO_}", '0', $rows);
	                	$rows = str_replace("{_CODIGO_}", $datas['codigo'], $rows);

	                	       	
	                }elseif ( $datas['grupo'] == 3) {
	                	$rows = str_replace("{_STYLE_}", 'display:none;', $rows);
	                	$rows = str_replace("{_CONTEO_STYLE_}", 'display:none;', $rows);
	                	$rows = str_replace("{_CONTEO_}", '0', $rows);
	                	if ($datas['invitado']==1) {
	                		$rows = str_replace("{_CODIGO_}", 'Invitado', $rows);
		                }elseif ($datas['invitado']==3) {
		                	$rows = str_replace("{_CODIGO_}", 'Titular', $rows);
		                }else{
		                	$rows = str_replace("{_CODIGO_}", 'Familiar', $rows);
	                	}
	                	       	
	                }else{
	                	$rows = str_replace("{_CONTEO_STYLE_}", 'display:none', $rows);
	                	$rows = str_replace("{_CONTEO_}", '0', $rows);
	                	$rows = str_replace("{_CODIGO_}", $datas['codigo'], $rows);

	                }	                               

	                //$horas= criterioSobreTiempo($value->cantidad);
	                //$rows = str_replace("{_CRITERIO_}", $horas, $rows);

	                $filas .= $rows;
	            }
	        }
	    }
    }

    $dato = ($filas);

    return $dato;
    
}

function construirListaHuesped($data) {
    //echo "<pre>";print_r($data);echo "</pre>";

    $filas='';
    if ($data == '') {
        $rows = '<td>No existen datos de Huesped cargados</td>';
        $filas .= $rows;
    }
    else{
            //echo "<pre>";print_r($filas);echo "</pre>";
    	
    	$count=pg_num_rows($data);
    	if ($count > 0) {
    		
	        while ($datas = pg_fetch_array($data))  {

	        	//echo "<pre>";print_r($data);echo "</pre>";

	            if ($data <> "") {

	                $rows = file_get_contents("planti/tablaHuesped.html");
	                $rows = str_replace("{_NOMBRE_}", $datas['nombres'], $rows);
	                $rows = str_replace("{_APELLIDO_}", $datas['apellidos'], $rows);
	                $rows = str_replace("{_CEDULA_}", $datas['cedula'], $rows);
	                $rows = str_replace("{_EDAD_}", $datas['edad'], $rows);
	                $rows = str_replace("{_TITULAR_}", $datas['titular'], $rows);
	                $rows = str_replace("{_CODIGO_}", $datas['codigo'], $rows);
	                               

	                //$horas= criterioSobreTiempo($value->cantidad);
	                //$rows = str_replace("{_CRITERIO_}", $horas, $rows);

	                $filas .= $rows;
	            }
	        }
	    }
    }

    $dato = ($filas);

    return $dato;
    
}

function construirListaHuespedCacmeca($data) {
    //echo "<pre>";print_r($data);echo "</pre>";

    $filas='';
    if ($data == '') {
        $rows = '<td>No existen datos de Huesped cargados</td>';
        $filas .= $rows;
    }
    else{
            //echo "<pre>";print_r($filas);echo "</pre>";
    	
    	$count=pg_num_rows($data);
    	if ($count > 0) {
    		
	        while ($datas = pg_fetch_array($data))  {

	        	//echo "<pre>";print_r($data);echo "</pre>";

	            if ($data <> "") {

	                $rows = file_get_contents("planti/tablaHuesped.html");
	                $rows = str_replace("{_NOMBRE_}", $datas['nombres'], $rows);
	                $rows = str_replace("{_APELLIDO_}", $datas['apellidos'], $rows);
	                $rows = str_replace("{_CEDULA_}", $datas['cedula'], $rows);
	                $rows = str_replace("{_EDAD_}", $datas['edad'], $rows);
	                $rows = str_replace("{_TITULAR_}", $datas['titular'], $rows);
	                $rows = str_replace("{_CODIGO_}", $datas['codigo'], $rows);
	                               

	                //$horas= criterioSobreTiempo($value->cantidad);
	                //$rows = str_replace("{_CRITERIO_}", $horas, $rows);

	                $filas .= $rows;
	            }
	        }
	    }
    }

    $dato = ($filas);

    return $dato;
    
}



function construirListaHuespedInver($data) {
    //echo "<pre>";print_r($data);echo "</pre>";

    $filas='';
    if ($data == '') {
        $rows = '<td>No existen datos de Huesped cargados</td>';
        $filas .= $rows;
    }
    else{
            //echo "<pre>";print_r($filas);echo "</pre>";
    	
    	$count=pg_num_rows($data);
    	if ($count > 0) {
    		
	        while ($datas = pg_fetch_array($data))  {

	        	//echo "<pre>";print_r($data);echo "</pre>";

	            if ($data <> "") {

	                $rows = file_get_contents("planti/tablaHuesped.html");
	                $rows = str_replace("{_NOMBRE_}", $datas['nombres'], $rows);
	                $rows = str_replace("{_APELLIDO_}", $datas['apellidos'], $rows);
	                $rows = str_replace("{_CEDULA_}", $datas['cedula'], $rows);
	                $rows = str_replace("{_EDAD_}", $datas['edad'], $rows);
	                $rows = str_replace("{_TITULAR_}", $datas['titular'], $rows);
	                $rows = str_replace("{_CODIGO_}", $datas['codigo'], $rows);
	                               

	                //$horas= criterioSobreTiempo($value->cantidad);
	                //$rows = str_replace("{_CRITERIO_}", $horas, $rows);

	                $filas .= $rows;
	            }
	        }
	    }
    }

    $dato = ($filas);

    return $dato;
    
}




function construirListaInverCapacidad($data) {
    //echo "<pre>";print_r($data);echo "</pre>";

    $filas='';
    if ($data == '') {
        $rows = '<td>No existen datos de los departamentos</td>';
        $filas .= $rows;
    }
    else{
            //echo "<pre>";print_r($filas);echo "</pre>";
    	
    	$count=pg_num_rows($data);
    	if ($count > 0) {
    		
	        while ($datas = pg_fetch_array($data))  {

	        	//echo "<pre>";print_r($data);echo "</pre>";

	            if ($data <> "") {

	                $rows = file_get_contents("planti/tablaInver.html");

	                $rows = str_replace("{_LINK_}", '<p style="font-size: smaller;">http://190.205.57.110/control_acceso/</p>', $rows);
	                $rows = str_replace("{_USUARIO_}", $datas['usuario'], $rows);
	                $rows = str_replace("{_PASS_}", base64_decode($datas['contra']), $rows);

	                
                	
                	$rows = str_replace("{_APAGADO_}", 'display:none;', $rows);
	                	
	               

	                $rows = str_replace("{_TR_}", $datas['codigo'], $rows);
	                $rows = str_replace("{_NUM_}", $datas['torre'], $rows);
	                $rows = str_replace("{_PRO_}", $datas['propietario'], $rows);
	                $rows = str_replace("{_BOTON_}", $datas['iddepa'], $rows);
	                $rows = str_replace("{_CONTEO1_}", $datas['brz'], $rows);
	                $rows = str_replace("{_CONTEO2_}", $datas['est'], $rows);

	                $filas .= $rows;
	            }
	        }
	    }
    }

    $dato = ($filas);

    return $dato;
    
}


function construirListaInverReserva($data) {
    //echo "<pre>";print_r($data);echo "</pre>";

    $filas='';
    if ($data == '') {
        $rows = '<td>No existen datos de los departamentos</td>';
        $filas .= $rows;
    }
    else{
            //echo "<pre>";print_r($filas);echo "</pre>";
    	
    	$count=pg_num_rows($data);
    	if ($count > 0) {
    		
	        while ($datas = pg_fetch_array($data))  {

	        	//echo "<pre>";print_r($data);echo "</pre>";

	            if ($data <> "") {

	                $rows = file_get_contents("planti/tablaInverReserva.html");

	              

	                if (!empty($datas['reserva'])) {
	                	$rows = str_replace("{_RESERVA_}", $datas['reserva'], $rows);
                		$rows = str_replace("{_STYLEB_}", '', $rows);
	                	$rows = str_replace("{_STYLER_}", 'display:none;', $rows);
	                	
	                	
	                }else{
	                	$rows = str_replace("{_RESERVA_}", '', $rows);
	                	$rows = str_replace("{_STYLER_}", '', $rows);
                		$rows = str_replace("{_STYLEB_}", 'display:none;', $rows);

	                	
	                }


	                $rows = str_replace("{_TR_}", $datas['torre'], $rows);
	                $rows = str_replace("{_NUM_}", $datas['codigo'], $rows);
	                $rows = str_replace("{_PRO_}", $datas['propietario'], $rows);
	                $rows = str_replace("{_BOTON_}", $datas['iddepa'], $rows);
	                $rows = str_replace("{_CONTEO1_}", $datas['brz'], $rows);
	                $rows = str_replace("{_CONTEO2_}", $datas['est'], $rows);

	                $filas .= $rows;
	            }
	        }
	    }
    }

    $dato = ($filas);

    return $dato;
    
}

function construirListaRecepcion($data) {
    //echo "<pre>";print_r($data);echo "</pre>";

    $filas='';
    if ($data == '') {
        $rows = '<td>No existen datos Familiares cargados</td>';
        $filas .= $rows;
    }
    else{
            //echo "<pre>";print_r($filas);echo "</pre>";
    	
    	$count=pg_num_rows($data);
    	if ($count > 0) {
    		
	        while ($datas = pg_fetch_array($data))  {

	        	//echo "<pre>";print_r($datas);echo "</pre>";

	            if ($data <> "") {

	                $rows = file_get_contents("planti/tablaRecepcion.html");
	                $rows = str_replace("{_NOMBRE_}", $datas['nombres'], $rows);
	                $rows = str_replace("{_APELLIDO_}", $datas['apellidos'], $rows);
	                $rows = str_replace("{_CEDULA_}", $datas['cedula'], $rows);
	                $rows = str_replace("{_EDAD_}", $datas['edad'], $rows);
	                $rows = str_replace("{_CODIGO_}", $datas['codigo'], $rows);
	                $rows = str_replace("{_TORRE_}", $datas['torre'], $rows);
	               
	                $rows = str_replace("{_ID_}", $datas['idfami'], $rows);

	                if ($datas['invitado']==3) {
	                	$rows = str_replace("{_CLASE_}", 'Titular', $rows);

	                	$rows = str_replace("{_STYLE_}", 'display:none;', $rows);
	                	$rows = str_replace("{_BRZ_}", '', $rows);

	                }elseif ($datas['invitado']==2) {
	                	$rows = str_replace("{_CLASE_}", 'Familiar', $rows);


	                	$rows = str_replace("{_STYLE_}", 'display:none;', $rows);
	                	$rows = str_replace("{_BRZ_}", '', $rows);
		                
	                }elseif ($datas['invitado']==1) {
	                	$rows = str_replace("{_CLASE_}", 'Invitado', $rows);

	                	 if (!empty($datas['brz'])) {
	                	$rows = str_replace("{_STYLE_}", 'display:none;', $rows);
	                	$rows = str_replace("{_BRZ_}", $datas['brz'], $rows);
	              
		                }else{
		                	$rows = str_replace("{_STYLE_}", '', $rows);
		                	$rows = str_replace("{_BRZ_}", '', $rows);
		                }
	                }else{
	                	$rows = str_replace("{_CLASE_}", 'Invitado', $rows);
	                	if (!empty($datas['brz'])) {
	                	$rows = str_replace("{_STYLE_}", 'display:none;', $rows);
	                	$rows = str_replace("{_BRZ_}", $datas['brz'], $rows);
	              
		                }else{
		                	$rows = str_replace("{_STYLE_}", '', $rows);
		                	$rows = str_replace("{_BRZ_}", '', $rows);
		                }
	                }


	               

	                $filas .= $rows;
	            }
	        }
	    }
    }

    $dato = ($filas);

    return $dato;
    
}

function construirListaSeguridad($data) {
    //echo "<pre>";print_r($data);echo "</pre>";

    $filas='';
    if ($data == '') {
        $rows = '<td>No existen datos Familiares cargados</td>';
        $filas .= $rows;
    }
    else{
            //echo "<pre>";print_r($filas);echo "</pre>";
    	
    	$count=pg_num_rows($data);
    	if ($count > 0) {
    		
	        while ($datas = pg_fetch_array($data))  {

	        	//echo "<pre>";print_r($datas);echo "</pre>";

	        	

	            if ($data <> "") {

	                $rows = file_get_contents("planti/tablaCon.html");
	                
	                if ($datas['chequeo']==1) {
	                	$rows = str_replace("{_CONTE_}", 'Asistente', $rows);
	                	$rows = str_replace("{_STYLEC_}", 'display:none', $rows);
	                	
	                }else{
	                	$rows = str_replace("{_CONTE_}", '', $rows);
	                	$rows = str_replace("{_STYLEC_}", '', $rows);

	                }
	                //$rows = str_replace("{_CONTE_}", $person=$person+1, $rows);
	        		
	                $rows = str_replace("{_NOMBRE_}", $datas['nombres'], $rows);
	                $rows = str_replace("{_APELLIDO_}", $datas['apellidos'], $rows);
	                $rows = str_replace("{_CEDULA_}", $datas['cedula'], $rows);
	                $rows = str_replace("{_CODIGO_}", $datas['codigo'], $rows);
	                $rows = str_replace("{_TORRE_}", $datas['torre'], $rows);
	                $rows = str_replace("{_TITU_}", $datas['titular'], $rows);
	               
	                $rows = str_replace("{_ID_}", $datas['idfami'], $rows);
	                //$rows = str_replace("{_DEPA_}", $datas['depa'], $rows);

	                if (!empty($datas['brz'])) {
	                	//$rows = str_replace("{_STYLE_}", 'display:none', $rows);
	                	$rows = str_replace("{_BRZ_}", $datas['brz'], $rows);
	              
	                }else{
	                	//$rows = str_replace("{_STYLE_}", '', $rows);
	                	$rows = str_replace("{_BRZ_}", '', $rows);
	                }

	                if (substr($datas['he'], 0,5) >='00:00' && substr($datas['he'], 0,5) < '12:00') {
                		$he='am';
	                }else{
	                	$he='pm';
	                }
	                if (substr($datas['hs'], 0,5) >='00:00' && substr($datas['hs'], 0,5) < '12:00') {
                		$hs='am';
	                }else{
	                	$hs='pm';
	                }

	                $rows = str_replace("{_HE_}", substr($datas['he'], 0,5).' '.$he, $rows);
	                $rows = str_replace("{_HS_}",  substr($datas['hs'],0,5).' '.$hs, $rows);
                	$rows = str_replace("{_STYLEE_}", 'display:none', $rows);
                	$rows = str_replace("{_STYLES_}", 'display:none', $rows);


	                
	               

	                /*if (!empty($datas['he'])) {

	                	if (substr($datas['he'], 0,5) >='00:00' && substr($datas['he'], 0,5) < '12:00') {
	                		$he='am';
		                }else{
		                	$he='pm';
		                }

		                if (substr($datas['he'], 0,5) =='00:00') {
		                	$rows = str_replace("{_STYLEE_}", '', $rows);
	                		$rows = str_replace("{_HE_}", '', $rows);
		                }else{
		                	$rows = str_replace("{_STYLEE_}", 'display:none', $rows);
	                		$rows = str_replace("{_HE_}", substr($datas['he'], 0,5).' '.$he, $rows);
		                }


	                	if (empty($datas['hs'])) {
	                		$rows = str_replace("{_HS_}", '', $rows);
	                		$rows = str_replace("{_STYLES_}", '', $rows);
	                	}else{


	                		if (substr($datas['hs'], 0,5) >='00:00' && substr($datas['hs'], 0,5) < '12:00') {
		                		$hs='am';
			                }else{
			                	$hs='pm';
			                }
	                		$rows = str_replace("{_STYLEE_}", '', $rows);
	                		$rows = str_replace("{_STYLES_}", 'display:none', $rows);
	                		$rows = str_replace("{_HE_}", '', $rows);
	                		$rows = str_replace("{_HS_}",  substr($datas['hs'],0,5).' '.$hs, $rows);

	                	}

	                	

	                }else{
	                		if (substr($datas['hs'], 0,5) >='00:00' && substr($datas['hs'], 0,5) < '12:00') {
		                		$hs='am';
			                }else{
			                	$hs='pm';
			                }

	                		$rows = str_replace("{_STYLEE_}", '', $rows);
	                		$rows = str_replace("{_STYLES_}", 'display:none', $rows);
	                		$rows = str_replace("{_HE_}", '', $rows);
	                		$rows = str_replace("{_HS_}",  substr($datas['hs'],0,5).' '.$hs, $rows);

	                }*/

	                
	                

	                $filas .= $rows;
	            }
	        }
	    }
    }

    $dato = ($filas);

    return $dato;
    
}




function construirListaSeguridadHuesped($data) {
    //echo "<pre>";print_r($data);echo "</pre>";

    $filas='';
    if ($data == '') {
        $rows = '<td>No existen datos Familiares cargados</td>';
        $filas .= $rows;
    }
    else{
            //echo "<pre>";print_r($filas);echo "</pre>";
    	
    	$count=pg_num_rows($data);
    	if ($count > 0) {
    		
	        while ($datas = pg_fetch_array($data))  {

	        	//echo "<pre>";print_r($datas);echo "</pre>";

	            if ($data <> "") {

	                $rows = file_get_contents("planti/tablaSeguridad.html");
	                $rows = str_replace("{_NOMBRE_}", $datas['nombres'], $rows);
	                $rows = str_replace("{_APELLIDO_}", $datas['apellidos'], $rows);
	                $rows = str_replace("{_EDAD_}", $datas['cedula'], $rows);
	                $rows = str_replace("{_DEPA_}", $datas['codigo'], $rows);
	                $rows = str_replace("{_TORRE_}", $datas['torre'], $rows);
	                $rows = str_replace("{_BRZ_}", $datas['brz'], $rows);
	                //$rows = str_replace("{_OBSE_}", $datas['observacion'], $rows);
	                /*if ($datas['estatus']==0) {
	                	$rows = str_replace("{_STATUS_}", 'Fuera', $rows);
	                }else{
	                	$rows = str_replace("{_STATUS_}", 'Dentro', $rows);
	                }*/

	                if ($datas['lugar']==1) {
	                	$rows = str_replace("{_STATUS_}", 'Entrada Principal', $rows);


	                }elseif ($datas['lugar']==2) {
	                	
	                    $rows = str_replace("{_STATUS_}", 'Puerta Playa', $rows);


	                }else{
	                	$rows = str_replace("{_STATUS_}", '', $rows);
	                }
	                	

	                if (substr($datas['hs'], 0,5) =='00:00') {

	                	if (substr($datas['he'], 0,5) >='00:00' && substr($datas['he'], 0,5) < '12:00') {
	                		$he='am';
		                }else{
		                	$he='pm';
		                }

	                	$rows = str_replace("{_HORA_}", $datas['he'].' '.$he.' Entrada', $rows);
	                }else{
	                	if (substr($datas['hs'], 0,5) >='00:00' && substr($datas['hs'], 0,5) < '12:00') {
	                		$hs='am';
		                }else{
		                	$hs='pm';
		                }

	                	$rows = str_replace("{_HORA_}", $datas['hs'].' '.$hs.' Salida', $rows);
	                }
	                
	                                        

	                //$horas= criterioSobreTiempo($value->cantidad);
	                //$rows = str_replace("{_CRITERIO_}", $horas, $rows);

	                $filas .= $rows;
	            }
	        }
	    }
    }

    $dato = ($filas);

    return $dato;
    
}

function construirListaVehiculoAdm($data) {
    //echo "<pre>";print_r($data);echo "</pre>";

    $filas='';
    if ($data == '') {
        $rows = '<td>No existen Vehiculos cargados</td>';
        $filas .= $rows;
    }
    else{
            //echo "<pre>";print_r($filas);echo "</pre>";
    	
    	$count=pg_num_rows($data);
    	if ($count > 0) {
    		
	        while ($datas = pg_fetch_array($data))  {

	        	//echo "<pre>";print_r($data);echo "</pre>";

	            if ($data <> "") {

	                $rows = file_get_contents("planti/tablaVehiculo.html");
	                $rows = str_replace("{_PL_}", $datas['placa'], $rows);
	                $rows = str_replace("{_MR_}", $datas['marca'], $rows);
	                $rows = str_replace("{_MD_}", $datas['modelo'], $rows);
	                $rows = str_replace("{_COLOR_}", $datas['color'], $rows);
	                $rows = str_replace("{_BOTON_}", $datas['idcar'], $rows);
	                $rows = str_replace("{_CONTE_}", '', $rows);
	                $rows = str_replace("{_STYLEC_}", 'display:none', $rows);
	                $rows = str_replace("{_STYLEPRO_}", 'display:none', $rows);
	                $rows = str_replace("{_STYLE_}", '', $rows);
	                

	                $filas .= $rows;
	            }
	        }
	    }
    }

    $dato = ($filas);

    return $dato;
    
}


function construirListaVehiculo($data) {
    //echo "<pre>";print_r($data);echo "</pre>";

    $filas='';
    if ($data == '') {
        $rows = '<td>No existen Vehiculos cargados</td>';
        $filas .= $rows;
    }
    else{
            //echo "<pre>";print_r($filas);echo "</pre>";
    	
    	$count=pg_num_rows($data);
    	if ($count > 0) {
    		
	        while ($datas = pg_fetch_array($data))  {

	        	//echo "<pre>";print_r($data);echo "</pre>";

	            if ($data <> "") {

	                $rows = file_get_contents("planti/tablaVehiculo.html");
	                $rows = str_replace("{_PL_}", $datas['placa'], $rows);
	                $rows = str_replace("{_MR_}", $datas['marca'], $rows);
	                $rows = str_replace("{_MD_}", $datas['modelo'], $rows);
	                $rows = str_replace("{_COLOR_}", $datas['color'], $rows);
	                $rows = str_replace("{_BOTON_}", $datas['idcar'], $rows);
	                $rows = str_replace("{_CONTE_}", '', $rows);
	                if ($datas['grupo']==2) {
	                	$rows = str_replace("{_STYLE_}", 'display:none', $rows);
	                }
	                //$rows = str_replace("{_STYLEC_}", 'display:none', $rows);
	                $rows = str_replace("{_STYLEPRO_}", 'display:none', $rows);
	                //$rows = str_replace("{_STYLE_}", 'display:none', $rows);
	                

	                $filas .= $rows;
	            }
	        }
	    }
    }

    $dato = ($filas);

    return $dato;
    
}


function construirListaVehiculoHuesIn($data) {
    //echo "<pre>";print_r($data);echo "</pre>";

    $filas='';
    if ($data == '') {
        $rows = '<td>No existen Vehiculos cargados</td>';
        $filas .= $rows;
    }
    else{
            //echo "<pre>";print_r($filas);echo "</pre>";
    	
    	$count=pg_num_rows($data);
    	if ($count > 0) {
    		
	        while ($datas = pg_fetch_array($data))  {

	        	//echo "<pre>";print_r($data);echo "</pre>";

	            if ($data <> "") {

	                $rows = file_get_contents("planti/tablaVehiculo.html");
	                $rows = str_replace("{_PL_}", $datas['placa'], $rows);
	                $rows = str_replace("{_MR_}", $datas['marca'], $rows);
	                $rows = str_replace("{_MD_}", $datas['modelo'], $rows);
	                $rows = str_replace("{_COLOR_}", $datas['color'], $rows);
	                $rows = str_replace("{_BOTON_}", $datas['idcar'], $rows);
	                $rows = str_replace("{_CONTE_}", '', $rows);
	                $rows = str_replace("{_STYLEC_}", 'display:none', $rows);
	                $rows = str_replace("{_STYLEPRO_}", 'display:none', $rows);
	                $rows = str_replace("{_STYLE_}", 'display:none', $rows);
	                

	                $filas .= $rows;
	            }
	        }
	    }
    }

    $dato = ($filas);

    return $dato;
    
}

function construirListaVehiculoS($data) {
    //echo "<pre>";print_r($data);echo "</pre>";

    $filas='';
    if ($data == '') {
        $rows = '<td>No existen Vehiculos cargados</td>';
        $filas .= $rows;
    }
    else{
            //echo "<pre>";print_r($filas);echo "</pre>";
    	
    	$count=pg_num_rows($data);
    	if ($count > 0) {
    		
	        while ($datas = pg_fetch_array($data))  {

	        	//echo "<pre>";print_r($data);echo "</pre>";

	            if ($data <> "") {

	                $rows = file_get_contents("planti/tablaVehiculo.html");
	                $rows = str_replace("{_PL_}", $datas['placa'], $rows);
	                $rows = str_replace("{_MR_}", $datas['marca'], $rows);
	                $rows = str_replace("{_MD_}", $datas['modelo'], $rows);
	                $rows = str_replace("{_COLOR_}", $datas['color'], $rows);
	                $rows = str_replace("{_BOTON_}", $datas['idcar'], $rows);
	                $rows = str_replace("{_STYLE_}", 'display:none;', $rows);

	                if ($datas['chequeo']==1) {
	                	$rows = str_replace("{_CONTE_}", 'CHEQUEADO', $rows);
	                	$rows = str_replace("{_STYLEC_}", 'display:none', $rows);
	                	
	                }else{
	                	$rows = str_replace("{_CONTE_}", '', $rows);
	                	$rows = str_replace("{_STYLEC_}", '', $rows);

	                }
	                

	                $filas .= $rows;
	            }
	        }
	    }
    }

    $dato = ($filas);

    return $dato;
    
}

function construirListaVehiculoSe($data) {
    //echo "<pre>";print_r($data);echo "</pre>";

    $filas='';
    if ($data == '') {
        $rows = '<td>No existen Vehiculos cargados</td>';
        $filas .= $rows;
    }
    else{
            //echo "<pre>";print_r($filas);echo "</pre>";
    	
    	$count=pg_num_rows($data);
    	if ($count > 0) {
    		
	        while ($datas = pg_fetch_array($data))  {

	        	//echo "<pre>";print_r($data);echo "</pre>";

	            if ($data <> "") {

	                $rows = file_get_contents("planti/tablaVehiculoSeg.html");
	                $rows = str_replace("{_PL_}", $datas['placa'], $rows);
	                $rows = str_replace("{_MR_}", $datas['marca'], $rows);
	                $rows = str_replace("{_MD_}", $datas['modelo'], $rows);
	                $rows = str_replace("{_COLOR_}", $datas['color'], $rows);
	                $rows = str_replace("{_BOTON_}", $datas['idcar'], $rows);
	                $rows = str_replace("{_LUGAR_}", 'Entrada Principal', $rows);
	                $rows = str_replace("{_DEPA_}", $datas['codigo'], $rows);
	                //se cambio de
	                //$rows = str_replace("{_OBSE_}", 'Entrada Principal', $rows);
	                //a
	                $rows = str_replace("{_OBSE_}", $datas['observacion'], $rows);

	               
	                
	                if (substr($datas['hs'], 0,5) =='00:00') {

	                	if (substr($datas['he'], 0,5) >='00:00' && substr($datas['he'], 0,5) < '12:00') {
	                		$he='am';
		                }else{
		                	$he='pm';
		                }

	                	$rows = str_replace("{_HORA_}", $datas['he'].' '.$he.' Entrada', $rows);
	                }else{
	                	if (substr($datas['hs'], 0,5) >='00:00' && substr($datas['hs'], 0,5) < '12:00') {
	                		$hs='am';
		                }else{
		                	$hs='pm';
		                }

	                	$rows = str_replace("{_HORA_}", $datas['hs'].' '.$hs.' Salida', $rows);
	                }
	                

	                $filas .= $rows;
	            }
	        }
	    }
    }

    $dato = ($filas);

    return $dato;
    
}


function construirListaVehiculoE($data) {
    //echo "<pre>";print_r($data);echo "</pre>";

    $filas='';
    if ($data == '') {
        $rows = '<td>No existen Vehiculos cargados</td>';
        $filas .= $rows;
    }
    else{
            //echo "<pre>";print_r($filas);echo "</pre>";
    	
    	$count=pg_num_rows($data);
    	if ($count > 0) {
    		
	        while ($datas = pg_fetch_array($data))  {

	        	//echo "<pre>";print_r($data);echo "</pre>";

	            if ($data <> "") {

	                $rows = file_get_contents("planti/tablaVehiculo.html");
	                $rows = str_replace("{_PL_}", $datas['placa'], $rows);
	                $rows = str_replace("{_MR_}", $datas['marca'], $rows);
	                $rows = str_replace("{_MD_}", $datas['modelo'], $rows);
	                $rows = str_replace("{_COLOR_}", $datas['color'], $rows);
	                //$rows = str_replace("{_BOTON_}", $datas['idcar'], $rows);
	                $rows = str_replace("{_STYLEPRO_}", 'display:none', $rows);
	                $rows = str_replace("{_STYLE_}", 'display:none', $rows);
	                $rows = str_replace("{_CONTE_}", '', $rows);
	                $rows = str_replace("{_STYLEC_}", 'display:none', $rows);
	                

	                $filas .= $rows;
	            }
	        }
	    }
    }

    $dato = ($filas);

    return $dato;
    
}

function construirListaBrazalete($data) {
    //echo "<pre>";print_r($data);echo "</pre>";

    $filas='';
    if ($data == '') {
        $rows = '<td>No existen Brazaletes cargados</td>';
        $filas .= $rows;
    }
    else{
            //echo "<pre>";print_r($filas);echo "</pre>";
    	
    	$count=pg_num_rows($data);
    	if ($count > 0) {
    		
	        while ($datas = pg_fetch_array($data))  {

	        	//echo "<pre>";print_r($data);echo "</pre>";

	            if ($data <> "") {

	                $rows = file_get_contents("planti/tablaBraza.html");
	                $rows = str_replace("{_CODIGO_}", $datas['codigo'], $rows);
	      

	                $filas .= $rows;
	            }
	        }
	    }
    }

    $dato = ($filas);

    return $dato;
    
}

function construirListaCodigos($data) {
    //echo "<pre>";print_r($data);echo "</pre>";

    $filas='';
    if ($data == '') {
        $rows = '<td>No existen Brazaletes cargados</td>';
        $filas .= $rows;
    }
    else{
            //echo "<pre>";print_r($filas);echo "</pre>";
    	
    	$count=pg_num_rows($data);
    	if ($count > 0) {
    		
	        while ($datas = pg_fetch_array($data))  {

	        	//echo "<pre>";print_r($data);echo "</pre>";

	            if ($data <> "") {

	                $rows = file_get_contents("planti/tablaBrazaCod.html");
	                $rows = str_replace("{_CODIGO_}", $datas['codigo'], $rows);
	                $rows = str_replace("{_FECHA_}", $datas['fecha'], $rows);
	      

	                $filas .= $rows;
	            }
	        }
	    }
    }

    $dato = ($filas);

    return $dato;
    
}

function construirListaTiempoVehiculo($data) {
    //echo "<pre>";print_r($data);echo "</pre>";

    $filas='';
    if ($data == '') {
        $rows = '<td>No existen Vehiculos cargados</td>';
        $filas .= $rows;
    }
    else{
            //echo "<pre>";print_r($filas);echo "</pre>";
    	
    	$count=pg_num_rows($data);
    	if ($count > 0) {
    		
	        while ($datas = pg_fetch_array($data))  {

	        	//echo "<pre>";print_r($data);echo "</pre>";

	            if ($data <> "") {

	                $rows = file_get_contents("planti/tablaVehiculoTiempo.html");
	                $rows = str_replace("{_PL_}", $datas['placa'], $rows);
	                $rows = str_replace("{_DEPA_}", $datas['depa'], $rows);
	                $rows = str_replace("{_LUGAR_}", 'Entrada Principal', $rows);
	               
	                
	                if (substr($datas['he'], 0,5) >='00:00' && substr($datas['he'], 0,5) < '12:00') {
                		$he='am';
	                }else{
	                	$he='pm';
	                }

	                if (empty($datas['he'])) {
                		$rows = str_replace("{_HORAE_}", '', $rows);
	                	
	                }else{
	                	$rows = str_replace("{_HORAE_}", $datas['he'].' '.$he.' Entrada', $rows);
	                }
                	
                

                	if (substr($datas['hs'], 0,5) >='00:00' && substr($datas['hs'], 0,5) < '12:00') {
                		$hs='am';
	                }else{
	                	$hs='pm';
	                }

	                if (empty($datas['hs'])) {
                		$rows = str_replace("{_HORAS_}", '', $rows);
	                	
	                }else{
                		$rows = str_replace("{_HORAS_}", $datas['hs'].' '.$hs.' Salida', $rows);

	                }

	                $filas .= $rows;
	            }
	        }
	    }
    }

    $dato = ($filas);

    return $dato;
    
}

function construirListaTiempoHuesped($data) {
    //echo "<pre>";print_r($data);echo "</pre>";

    $filas='';
    if ($data == '') {
        $rows = '<td>No existen datos Familiares cargados</td>';
        $filas .= $rows;
    }
    else{
            //echo "<pre>";print_r($filas);echo "</pre>";
    	
    	$count=pg_num_rows($data);
    	if ($count > 0) {
    		
	        while ($datas = pg_fetch_array($data))  {

	        	//echo "<pre>";print_r($datas);echo "</pre>";

	            if ($data <> "") {

	                $rows = file_get_contents("planti/tablaTiempoHuesped.html");
	                $rows = str_replace("{_NOMBRE_}", $datas['nombres'], $rows);
	                $rows = str_replace("{_APELLIDO_}", $datas['apellidos'], $rows);
	                $rows = str_replace("{_CEDULA_}", $datas['cedula'], $rows);
	                $rows = str_replace("{_DEPA_}", $datas['depa'], $rows);
	                $rows = str_replace("{_BRZ_}", $datas['brz'], $rows);
	               
	                if ($datas['lugar']==1) {
	                	$rows = str_replace("{_STATUS_}", 'Entrada Principal', $rows);


	                }elseif ($datas['lugar']==2) {
	                	
	                    $rows = str_replace("{_STATUS_}", 'Puerta Playa', $rows);


	                }else{
	                	$rows = str_replace("{_STATUS_}", '', $rows);
	                }
	                	

	                

                	if (substr($datas['he'], 0,5) >='00:00' && substr($datas['he'], 0,5) < '12:00') {
                		$he='am';
	                }else{
	                	$he='pm';
	                }

	                if (substr($datas['he'], 0,5) =='00:00') {
                		$rows = str_replace("{_HORAE_}", '', $rows);
	                	
	                }else{
	                	$rows = str_replace("{_HORAE_}", date("d/m/Y", strtotime($datas['fecha'])).' '.$datas['he'].' '.$he.' Entrada', $rows);
	                }
                	
                

                	if (substr($datas['hs'], 0,5) >='00:00' && substr($datas['hs'], 0,5) < '12:00') {
                		$hs='am';
	                }else{
	                	$hs='pm';
	                }

	                if (substr($datas['hs'], 0,5) =='00:00') {
                		$rows = str_replace("{_HORAS_}", '', $rows);
	                	
	                }else{
                		$rows = str_replace("{_HORAS_}", date("d/m/Y", strtotime($datas['fecha'])).' '.$datas['hs'].' '.$hs.' Salida', $rows);

	                }

	                
	                
	                                        

	                //$horas= criterioSobreTiempo($value->cantidad);
	                //$rows = str_replace("{_CRITERIO_}", $horas, $rows);

	                $filas .= $rows;
	            }
	        }
	    }
    }

    $dato = ($filas);

    return $dato;
    
}


function construirListaTrabajadores($data) {
    //echo "<pre>";print_r($data);echo "</pre>";

    $filas='';
    if ($data == '') {
        $rows = '<td>No existen datos de trabajadores cargados</td>';
        $filas .= $rows;
    }
    else{
            //echo "<pre>";print_r($filas);echo "</pre>";
    	
    	$count=pg_num_rows($data);
    	if ($count > 0) {
    		
	        while ($datas = pg_fetch_array($data))  {

	        	//echo "<pre>";print_r($data);echo "</pre>";

	            if ($data <> "") {

	                $rows = file_get_contents("planti/tablaTrabajadorese.html");

	               
	                $rows = str_replace("{_ID_}", $datas['idtrab'], $rows);
	                $rows = str_replace("{_NOMBRE_}", $datas['nombres'], $rows);
	                $rows = str_replace("{_APELLIDO_}", $datas['apellidos'], $rows);
	                $rows = str_replace("{_CEDULA_}", $datas['cedula'], $rows);
	                $rows = str_replace("{_EDAD_}", $datas['edad'], $rows);
	                $rows = str_replace("{_FI_}", $datas['fi'], $rows);
	                $rows = str_replace("{_FF_}", $datas['ff'], $rows);
	                               

	                //$horas= criterioSobreTiempo($value->cantidad);
	                //$rows = str_replace("{_CRITERIO_}", $horas, $rows);

	                $filas .= $rows;
	            }
	        }
	    }
    }

    $dato = ($filas);

    return $dato;
    
}

function construirListaTrabajadoresE($data) {
    //echo "<pre>";print_r($data);echo "</pre>";

    $filas='';
    if ($data == '') {
        $rows = '<td>No existen datos de trabajadores cargados</td>';
        $filas .= $rows;
    }
    else{
            //echo "<pre>";print_r($filas);echo "</pre>";
    	
    	$count=pg_num_rows($data);
    	if ($count > 0) {
    		
	        while ($datas = pg_fetch_array($data))  {

	        	//echo "<pre>";print_r($data);echo "</pre>";

	            if ($data <> "") {

	                $rows = file_get_contents("planti/tablaTrabajadores.html");

	                if ($datas['chequeo']==1) {
	                	$rows = str_replace("{_STYLE_}", 'display:none', $rows);
	                	$rows = str_replace("{_STYLES_}", '', $rows);
	                	$rows = str_replace("{_TEXTO_}", 'ASISTENTE', $rows);
	                	
	                }else{
	                	$rows = str_replace("{_STYLES_}", 'display:none', $rows);
	                	$rows = str_replace("{_STYLE_}", '', $rows);
	                	$rows = str_replace("{_TEXTO_}", '', $rows);


	                }
	                $rows = str_replace("{_ID_}", $datas['idtrab'], $rows);
	                $rows = str_replace("{_NOMBRE_}", $datas['nombres'], $rows);
	                $rows = str_replace("{_APELLIDO_}", $datas['apellidos'], $rows);
	                $rows = str_replace("{_CEDULA_}", $datas['cedula'], $rows);
	                $rows = str_replace("{_EDAD_}", $datas['edad'], $rows);
	                $rows = str_replace("{_FI_}", $datas['fi'], $rows);
	                $rows = str_replace("{_FF_}", $datas['ff'], $rows);
	                               

	                //$horas= criterioSobreTiempo($value->cantidad);
	                //$rows = str_replace("{_CRITERIO_}", $horas, $rows);

	                $filas .= $rows;
	            }
	        }
	    }
    }

    $dato = ($filas);

    return $dato;
    
}

function construirListaTrabajadoresSe($data) {
    //echo "<pre>";print_r($data);echo "</pre>";

    $filas='';
    if ($data == '') {
        $rows = '<td>No existen datos de trabajadores cargados</td>';
        $filas .= $rows;
    }
    else{
            //echo "<pre>";print_r($filas);echo "</pre>";
    	
    	$count=pg_num_rows($data);
    	if ($count > 0) {
    		
	        while ($datas = pg_fetch_array($data))  {

	        	//echo "<pre>";print_r($data);echo "</pre>";

	            if ($data <> "") {

	                $rows = file_get_contents("planti/tablaTrabajadorSeg.html");

	                
	                $rows = str_replace("{_ID_}", $datas['idtrab'], $rows);
	                $rows = str_replace("{_NOMBRE_}", $datas['nombres'], $rows);
	                $rows = str_replace("{_APELLIDO_}", $datas['apellidos'], $rows);
	                $rows = str_replace("{_CEDULA_}", $datas['cedula'], $rows);
	                $rows = str_replace("{_DEPAR_}", $datas['departamento'], $rows);

	                if ($datas['lugar']==1) {
	                	$rows = str_replace("{_LUGAR_}", 'Entrada Principal', $rows);
	                	
	                }elseif ($datas['lugar']==2) {
	                	# code...
	                
	                	$rows = str_replace("{_LUGAR_}", 'Puerta de Playa', $rows);

	                }else{
	                	$rows = str_replace("{_LUGAR_}",'', $rows);

	                }
	                               

	                if (substr($datas['hs'], 0,5) =='00:00') {

	                	if (substr($datas['he'], 0,5) >='00:00' && substr($datas['he'], 0,5) < '12:00') {
	                		$he='am';
		                }else{
		                	$he='pm';
		                }

	                	$rows = str_replace("{_HORA_}", $datas['he'].' '.$he.' Entrada', $rows);
	                }else{
	                	if (substr($datas['hs'], 0,5) >='00:00' && substr($datas['hs'], 0,5) < '12:00') {
	                		$hs='am';
		                }else{
		                	$hs='pm';
		                }

	                	$rows = str_replace("{_HORA_}", $datas['hs'].' '.$hs.' Salida', $rows);
	                }
	                //$horas= criterioSobreTiempo($value->cantidad);
	                //$rows = str_replace("{_CRITERIO_}", $horas, $rows);

	                $filas .= $rows;
	            }
	        }
	    }
    }

    $dato = ($filas);

    return $dato;
    
}


function construirListaRecepcionDespacho($data) {
    //echo "<pre>";print_r($data);echo "</pre>";

    $filas='';
    if ($data == '') {
        $rows = '<td>No existen datos cargados</td>';
        $filas .= $rows;
    }
    else{
            //echo "<pre>";print_r($filas);echo "</pre>";
    	
    	$count=pg_num_rows($data);
    	if ($count > 0) {
    		
	        while ($datas = pg_fetch_array($data))  {

	        	//echo "<pre>";print_r($data);echo "</pre>";

	            if ($data <> "") {

	                $rows = file_get_contents("planti/tablaFecha.html");

	              
	                $rows = str_replace("{_FI_}", $datas['fi'], $rows);
	                $rows = str_replace("{_FF_}", $datas['ff'], $rows);
	                $rows = str_replace("{_DEPA_}", $datas['depa'], $rows);

	                if ($datas['estatus']==0) {
	                	$rows = str_replace("{_ESTADO_}",'OCUPADO', $rows);
	                	$rows = str_replace("{_STYLE_}",'', $rows);
	                	$rows = str_replace("{_ID_}",$datas['iddepa'], $rows);
	                	$rows = str_replace("{_TEXTO_}",'Dar Salida', $rows);
	                	
	                }else{
	                	
	                	$rows = str_replace("{_STYLE_}",'display:none', $rows);
	                	$rows = str_replace("{_ESTADO_}", 'DISPONIBLE', $rows);

	                }

	                $hoy=date('Y-m-d');
	                if (!empty($datas['ff'])) {

		                if ($hoy > $datas['ff']) {
		            		$rows = str_replace("{_COLOR_}", 'background-color: red;color:white;', $rows);
		                }elseif ($hoy == $datas['ff']) {
		            		$rows = str_replace("{_COLOR_}", 'background-color: yellow;color:black;', $rows);
		                }elseif ($hoy < $datas['ff']) {
		                	$rows = str_replace("{_COLOR_}", '', $rows);
		                }
	                	
	                }else{
		                	$rows = str_replace("{_COLOR_}", '', $rows);

	                }
	                
	                //$horas= criterioSobreTiempo($value->cantidad);
	                //$rows = str_replace("{_CRITERIO_}", $horas, $rows);

	                $filas .= $rows;
	            }
	        }
	    }
    }

    $dato = ($filas);

    return $dato;
    
}
 ?>