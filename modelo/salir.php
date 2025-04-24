<?php 

include ("mod_conexion.php");


session_start();

//$user=$_SESSION['nombre'];

//$act=pg_query($con,"UPDATE  usuarios set actividad=0 where nombre='$user'");


session_destroy();

header('location: ../');


 ?>