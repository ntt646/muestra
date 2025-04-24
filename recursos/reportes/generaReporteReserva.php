<?php

	//print_r($_REQUEST);
	//exit;
	//echo base64_encode('2');
	//exit;
	session_start();
	if(empty($_SESSION['nombre']))
	{
		header('location: ../');
	}

	include ("../../modelo/mod_conexion.php");
	require('../fpdf/fpdf.php');
	
	class PDF extends FPDF
{
	// Cabecera de página
	function Header()
	{
	    // Logo
	    //$this->Image('logo.png',10,8,33);
	    // Arial bold 15
	    $this->SetFont('Arial','B',11);
	    // Movernos a la derecha
	    $this->Cell(80);
	    // Título
	    $this->Cell(30,10,'Reporte por Reserva',0,0,'C');

	    //$this->SetDrawColor(0,80,180);
	    //$this->SetFillColor(0,0,255);
	    $this->SetTextColor(50,50,250);
	    // Salto de línea
	    $this->Ln(20);
		
	}

	// Pie de página
	function Footer()
	{
	    // Posición: a 1,5 cm del final
	    $this->SetY(-15);
	    // Arial italic 8
	    $this->SetFont('Arial','I',8);
	    // Número de página
	    $this->Cell(0,10,'Pagina '.$this->PageNo().'/{nb}',0,0,'C');
	}
}


	$fi=$_GET['fi'];
	$ff=$_GET['ff'];

		$fecha=pg_query("SELECT fc.fecha_inicio as fi, fc.fecha_fin as ff , dp.reserva, fc.observacion
						from fechas fc
						inner join departamentos dp on dp.iddepa=fc.departamento
						where fc.fecha_inicio between '$fi' and '$ff'
						and fc.fecha_fin between '$fi' and '$ff'
						and dp.clasificacion=1
						");

		//$respuesta=pg_fetch_array($fecha);

		/*$rptPropietarios = pg_query("SELECT rc.reserva, rc.nombre, rc.apellido, rc.cedula, 
									dp.codigo as depa, rc.brazalete as brz,rc.observacion,
									fc.fecha_inicio as fi, fc.fecha_fin as ff
									from reserva_cliente rc
									inner join departamentos dp on dp.iddepa=rc.iddepa
									inner join fechas fc on fc.reserva=rc.reserva
									where fc.fecha_inicio between '$fi' and '$ff'
									and fc.fecha_fin between '$fi' and '$ff'
									
									;");

		$conteo = pg_query("SELECT   count(rc.nombre) as fm
									from reserva_cliente rc
									inner join departamentos dp on dp.iddepa=rc.iddepa
									inner join fechas fc on fc.reserva=rc.reserva
									where fc.fecha_inicio between '$fi' and '$ff'
									and fc.fecha_fin between '$fi' and '$ff'
									group by  dp.iddepa, rc.reserva
									;");


		$consulVehi= pg_query("SELECT rs.reserva,vh.placa,vh.marca, vh.modelo, vh.color
							,fc.fecha_inicio as fi,fc.fecha_fin as ff, dp.codigo,vh.observacion
					    	from vehiculo vh
							inner join reserva rs on rs.reserva=vh.reserva
							inner join departamentos dp on dp.iddepa=vh.iddepa
							left join fechas fc on fc.reserva=rs.reserva
							where fc.fecha_inicio between '$fi' and '$ff'
							and fc.fecha_fin between '$fi' and '$ff'
							");*/


		$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','',12);

$pdf->cell(42,10,'Fecha', 1, 0, 'C',0);
$pdf->cell(20,10,'Reserva', 1, 0, 'C',0);
$pdf->cell(42,10,'Observacion', 1, 1, 'C',0);

while ($date= pg_fetch_assoc($fecha)) {

	
	$pdf->cell(42,10,$date['fi'].'/'.$date['ff'], 1, 0, 'C',0);
	$pdf->cell(20,10,$date['reserva'], 1, 0, 'C',0);
	$pdf->cell(42,10,$date['observacion'], 1, 1, 'C',0);



	$pdf->cell(30,10,'Nombres', 1, 0, 'C',0);
	$pdf->cell(30,10,'Apellidos', 1, 0, 'C',0);
	$pdf->cell(20,10,'Cedula', 1, 0, 'C',0);
	$pdf->cell(20,10,'Depa', 1, 0, 'C',0);

	$pdf->cell(25,10,'Brazalete', 1, 0, 'C',0);

	$pdf->cell(30,10,'Observ.', 1, 1, 'C',0);
	//$pdf->cell(30,10,'Salida', 1, 1, 'C',0);

	$fid=$date['fi'];
	$ffd=$date['ff'];

	$rptPropietarios = pg_query("SELECT rc.reserva, rc.nombre, rc.apellido, rc.cedula, 
									dp.codigo as depa, rc.brazalete as brz,rc.observacion--,
									--fc.fecha_inicio as fi, fc.fecha_fin as ff
									from reserva_cliente rc
									inner join departamentos dp on dp.iddepa=rc.iddepa
									inner join fechas fc on fc.reserva=rc.reserva
									where fc.fecha_inicio between '$fid' and '$ffd'
									and fc.fecha_fin between '$fid' and '$ffd'
									and dp.clasificacion=1");

	while ($row = pg_fetch_assoc($rptPropietarios)) {
		$pdf->cell(30,10,$row['nombre'], 1, 0, 'C',0);
		$pdf->cell(30,10,$row['apellido'], 1, 0, 'C',0);
		$pdf->cell(20,10,$row['cedula'], 1, 0, 'C',0);
		$pdf->cell(20,10,$row['depa'], 1, 0, 'C',0);
		$pdf->cell(25,10,$row['brz'], 1, 0, 'C',0);
		//$pdf->cell(42,10,$row['fi'].'/'.$row['ff'], 1, 0, 'C',0);
		$pdf->multicell(30,10,$row['observacion'], 1,  'C');
		//$pdf->cell(30,10,, 1, 1, 'C',0);
	}

	$pdf->Ln(20);
	$pdf->cell(20,10,'Placa', 1, 0, 'C',0);
	$pdf->cell(30,10,'Marca', 1, 0, 'C',0);
	$pdf->cell(30,10,'Modelo', 1, 0, 'C',0);
	$pdf->cell(20,10,'Color', 1, 0, 'C',0);
	$pdf->cell(20,10,'Depa', 1, 0, 'C',0);
	//$pdf->cell(42,10,'Fecha', 1, 0, 'C',0);
	$pdf->cell(30,10,'Obsev.', 1, 1, 'C',0);

	$consulVehi= pg_query("SELECT rs.reserva,vh.placa,vh.marca, vh.modelo, vh.color
							,--fc.fecha_inicio as fi,fc.fecha_fin as ff,
							dp.codigo,
							vh.observacion
					    	from vehiculo vh
							inner join reserva rs on rs.reserva=vh.reserva
							inner join departamentos dp on dp.iddepa=vh.iddepa
							left join fechas fc on fc.reserva=rs.reserva
							where fc.fecha_inicio between '$fid' and '$ffd'
							and fc.fecha_fin between '$fid' and '$ffd'
							and dp.clasificacion=1
							");

	while ($rows = pg_fetch_assoc($consulVehi)) {
		$pdf->cell(20,10,$rows['placa'], 1, 0, 'C',0);
		$pdf->cell(30,10,$rows['marca'], 1, 0, 'C',0);
		$pdf->cell(30,10,$rows['modelo'], 1, 0, 'C',0);
		$pdf->cell(20,10,$rows['color'], 1, 0, 'C',0);
		$pdf->cell(20,10,$rows['depa'], 1, 0, 'C',0);
		//$pdf->cell(42,10,$rows['fi'].'/'.$rows['ff'], 1, 0, 'C',0);
		$pdf->cell(30,10,$rows['observacion'], 1, 1, 'C',0);
	}

	$pdf->Ln(20);
}


$pdf->Output();
	

?> 