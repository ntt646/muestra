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
	    $this->Cell(30,10,'Reporte por Estadia',0,0,'C');

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

		/*$fecha=pg_query("SELECT fc.fecha_inicio as fi, fc.fecha_fin as ff , dp.reserva
						from fechas fc
						inner join departamentos dp on dp.iddepa=fc.departamento
						where dp.reserva='$rese';
						");*/

		$fecha=pg_query("SELECT fc.fecha_inicio as fi, fc.fecha_fin as ff , dp.reserva, fc.observacion
						from fechas fc
						inner join departamentos dp on dp.iddepa=fc.departamento
						where fc.fecha_inicio between '$fi' and '$ff'
						and fc.fecha_fin between '$fi' and '$ff'
						and dp.clasificacion=2
						");

		//$respuesta=pg_fetch_assoc($fecha);

		
		/*
		$consulVehi= pg_query("SELECT vh.placa,vh.marca, vh.modelo, vh.color, fc.fecha_inicio as fi,
							fc.fecha_fin as ff, vh.observacion,dp.codigo as depa
					    	from vehiculo vh
							inner join departamentos dp on dp.iddepa=vh.iddepa
							left join fechas fc on fc.departamento=dp.iddepa
							where fc.fecha_inicio between '$fi' and '$ff'
							and fc.fecha_fin between '$fi' and '$ff'
							and vh.grupo in (2,4) and dp.clasificacion=2
							");*/
			
		   // Creación del objeto de la clase heredada
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','',12);

$pdf->cell(42,10,'Fecha', 1, 0, 'C',0);
$pdf->cell(42,10,'Observacion', 1, 1, 'C',0);

while ($date= pg_fetch_assoc($fecha)) {
	$pdf->cell(42,10,$date['fi'].'/'.$date['ff'], 1, 0, 'C',0);
	$pdf->cell(42,10,$date['observacion'], 1, 0, 'C',0);



	$pdf->cell(30,10,'Nombres', 1, 0, 'C',0);
	$pdf->cell(30,10,'Apellidos', 1, 0, 'C',0);
	$pdf->cell(20,10,'Cedula', 1, 0, 'C',0);
	$pdf->cell(20,10,'Depa', 1, 0, 'C',0);

	$pdf->cell(25,10,'Brazalete', 1, 0, 'C',0);

	$pdf->cell(30,10,'Observ.', 1, 1, 'C',0);
	//$pdf->cell(30,10,'Salida', 1, 1, 'C',0);

	$fid=$date['fi'];
	$ffd=$date['ff'];

	$rptPropietarios = pg_query("SELECT distinct  dp.codigo as depa,  tr.nombre as torre,
									fm.nombres, fm.apellidos,fm.cedula,
									 ch.codigo as brz, ch.observacion--,
									 /*fc.fecha_inicio as fi,
									 fc.fecha_fin as ff*/
									from departamentos dp 
									inner join torres tr on tr.idtor = dp.torre
									inner join grupo gr on gr.idgr= dp.clasificacion
									inner join familiares fm on fm.departamento= dp.iddepa
									--left join codigos_huesped ch on ch.idfam=fm.idfami
									--inner join fechas fc on fc.departamento=dp.iddepa
									inner join fechas_clientes fcc on fcc.idfami=fm.idfami
									and fcc.fecha between fcc.fecha_ingreso and fcc.fecha_egreso
									left join codigos_huesped ch on ch.idfam=fm.idfami and ch.fecha=fcc.fecha_ingreso
									where fcc.fecha_ingreso = '$fid' 
									and fcc.fecha_egreso = '$ffd'
									and fm.grupo=2
									
									;");

	while ($row = pg_fetch_assoc($rptPropietarios)) {
		$pdf->cell(30,10,$row['nombres'], 1, 0, 'C',0);
		$pdf->cell(30,10,$row['apellidos'], 1, 0, 'C',0);
		$pdf->cell(20,10,$row['cedula'], 1, 0, 'C',0);
		$pdf->cell(20,10,$row['depa'], 1, 0, 'C',0);
		$pdf->cell(25,10,$row['brz'], 1, 0, 'C',0);
		//$pdf->cell(42,10,$row['fi'].'/'.$row['ff'], 1, 0, 'C',0);
		$pdf->multicell(30,10,$row['observacion'], 1,  'C');
		//$pdf->cell(30,10,, 1, 1, 'C',0);
	}

	$pdf->Ln(20);
	$pdf->Cell(30,10,'Vehiculos',0,0,'C');

	$pdf->Ln(20);
	$pdf->cell(20,10,'Placa', 1, 0, 'C',0);
	$pdf->cell(30,10,'Marca', 1, 0, 'C',0);
	$pdf->cell(30,10,'Modelo', 1, 0, 'C',0);
	$pdf->cell(20,10,'Color', 1, 0, 'C',0);
	$pdf->cell(20,10,'Depa', 1, 0, 'C',0);
	//$pdf->cell(42,10,'Fecha', 1, 0, 'C',0);
	$pdf->cell(30,10,'Obsev.', 1, 1, 'C',0);

	$consulVehi= pg_query("SELECT vh.placa,vh.marca, vh.modelo, vh.color, fc.fecha_inicio as fi,
							fc.fecha_fin as ff, vh.observacion,dp.codigo as depa
					    	from vehiculo vh
							inner join departamentos dp on dp.iddepa=vh.iddepa
							left join fechas fc on fc.departamento=dp.iddepa
							where fc.fecha_inicio between '$fid' and '$ffd'
							and fc.fecha_fin between '$fid' and '$ffd'
							dp.clasificacion=2
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
/*
$pdf->Ln(20);
$pdf->Cell(30,10,'Vehiculos',0,0,'C');

$pdf->Ln(20);
$pdf->cell(20,10,'Placa', 1, 0, 'C',0);
$pdf->cell(30,10,'Marca', 1, 0, 'C',0);
$pdf->cell(30,10,'Modelo', 1, 0, 'C',0);
$pdf->cell(20,10,'Color', 1, 0, 'C',0);
$pdf->cell(20,10,'Depa', 1, 0, 'C',0);
$pdf->cell(42,10,'Fecha', 1, 0, 'C',0);
$pdf->cell(30,10,'Obsev.', 1, 1, 'C',0);

while ($rows = pg_fetch_assoc($consulVehi)) {
	$pdf->cell(20,10,$rows['placa'], 1, 0, 'C',0);
	$pdf->cell(30,10,$rows['marca'], 1, 0, 'C',0);
	$pdf->cell(30,10,$rows['modelo'], 1, 0, 'C',0);
	$pdf->cell(20,10,$rows['color'], 1, 0, 'C',0);
	$pdf->cell(20,10,$rows['depa'], 1, 0, 'C',0);
	$pdf->cell(42,10,$rows['fi'].'/'.$rows['ff'], 1, 0, 'C',0);
	$pdf->cell(30,10,$rows['observacion'], 1, 1, 'C',0);
}
*/

$pdf->Output();
	

?> 