<?php 

$usuario=$_POST['usuario'];
$passwords=base64_encode($_POST['password']);
//$passwords=$_POST['password'];


if( isset($usuario) && !empty($usuario) &&
    isset($passwords) && !empty($passwords))
    {

    	include_once("../modelo/mod_conexion.php");
    	include_once("../modelo/consultas.php");

		
		$result = pg_num_rows($user);

		if ($result != 1) {

			?>
			<script type="text/javascript">
			alert('Usuario o contraseña incorrecta');
			window.location="../index.php";
			</script>

			<?php 
		}else{

			$sesion=pg_fetch_array($user);

		 	//echo "<pre>";print_r($sesion);echo "</pre>"; exit;
			if($sesion['0'] == $usuario && $sesion['1'] == $passwords && $sesion['2'] == 1){

				session_start();
				$_SESSION['active']=true;
			    $_SESSION['nombre'] = $sesion['3'];
			    $_SESSION['user'] = $usuario;
			    $_SESSION['rol'] = $sesion['4'];
			    $_SESSION['contra'] = $sesion['1'];

			    if($sesion['4'] == 1 || $sesion['4'] == 2 ){

			    	?>
	      			<script> 
				
					window.location.replace('../vista/inicioAdmin.php'); 
				
					</script>

					<?php 
			    }elseif ($sesion['4'] == 3) {
			    	header('Location: ../vista/inicioInvermarin.php');
			    }elseif ($sesion['4'] == 4) {
			    	header('Location: ../vista/inicioCatmeca.php');
			    }elseif ($sesion['4'] == 5) {
			    	header('Location: ../vista/inicioPropietario.php');
			    }elseif ($sesion['4'] == 6) {
			    	header('Location: ../vista/inicioRecepcion.php');
			    }elseif ($sesion['4'] == 7) {
			    	header('Location: ../vista/inicioConsul.php');
			    }elseif ($sesion['4'] == 8) {
			    	header('Location: ../vista/inicioHuespedInver.php');
			    }
			}

		}
    }
 ?>