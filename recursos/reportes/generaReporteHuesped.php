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

	    $this->cell(30,10,'Nombres', 1, 0, 'C',0);
		$this->cell(30,10,'Apellidos', 1, 0, 'C',0);
		$this->cell(20,10,'Cedula', 1, 0, 'C',0);
		$this->cell(20,10,'Edad', 1, 0, 'C',0);
		$this->cell(30,10,'Departamento', 1, 1, 'C',0);
		
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


	$depa=$_GET['id'];

	
	$consulFami= pg_query("SELECT fm.idfami,fm.nombres, fm.apellidos, fm.cedula, dp.nombre as titular,
						dp.codigo , fm.edad, fm.grupo, fm.invitado,fm.chequeo,fm.asiste
				    	from familiares fm
						inner join departamentos dp on dp.iddepa=fm.departamento
						--inner join usuarios us on us.usuario=dp.codigo
						where dp.iddepa='$depa' and fm.estatus=1");

	$consulVehi= pg_query("SELECT vh.placa,vh.marca, vh.modelo, vh.color, vh.observacion
					    	from vehiculo vh
							inner join departamentos dp on dp.iddepa=vh.iddepa
							--inner join usuarios us on us.usuario=dp.codigo
							where dp.iddepa='$depa' and vh.estatus=1");

	   // Creación del objeto de la clase heredada
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','',12);


while ($row = pg_fetch_assoc($consulFami)) {
	$pdf->cell(30,10,$row['nombres'], 1, 0, 'C',0);
	$pdf->cell(30,10,$row['apellidos'], 1, 0, 'C',0);
	$pdf->cell(20,10,$row['cedula'], 1, 0, 'C',0);
	$pdf->cell(20,10,$row['edad'], 1, 0, 'C',0);
	$pdf->cell(30,10,$row['codigo'], 1, 1, 'C',0);
	
}

$pdf->Ln(20);
$pdf->Cell(30,10,'Vehiculos',0,0,'C');

$pdf->Ln(20);
$pdf->cell(30,10,'Placa', 1, 0, 'C',0);
$pdf->cell(30,10,'Marca', 1, 0, 'C',0);
$pdf->cell(30,10,'Modelo', 1, 0, 'C',0);
$pdf->cell(30,10,'Color', 1, 0, 'C',0);
$pdf->cell(30,10,'Observ.', 1, 1, 'C',0);

while ($rows = pg_fetch_assoc($consulVehi)) {
	$pdf->cell(30,10,$rows['placa'], 1, 0, 'C',0);
	$pdf->cell(30,10,$rows['marca'], 1, 0, 'C',0);
	$pdf->cell(30,10,$rows['modelo'], 1, 0, 'C',0);
	$pdf->cell(30,10,$rows['color'], 1, 0, 'C',0);
	$pdf->cell(30,10,$rows['observacion'], 1, 1, 'C',0);
}


$pdf->Output();
	

?> 