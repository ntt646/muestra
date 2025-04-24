<?php
/*$cnmysql = new mysqli("localhost","root","","dbbiblioteca");*/

			date_default_timezone_set("America/caracas");


$con=pg_connect("host='localhost' port='5432' dbname='control_acceso' user ='postgres' password='123456'") or die ('Error de conexión. Póngase en contacto con el administrador');


/*try{
$usuario = 'postgres';
$password = '12345678';
En este caso el tipo es pgsql, además le indicamos el puerto $conn = new PDO('pgsql:host=localhost;port=5432;dbname=inventario', $usuario, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch(PDOException $e){
echo "ERROR: " . $e->getMessage();
}*/



?>