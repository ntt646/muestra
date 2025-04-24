<?php

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
	    $this->SetFont('Arial','B',15);
	    // Movernos a la derecha
	    $this->Cell(80);
	    // Título
	    $this->Cell(30,10,'Reporte por departamentos',0,0,'C');

	    //$this->SetDrawColor(0,80,180);
	    //$this->SetFillColor(0,0,255);
	    $this->SetTextColor(50,50,250);
	    // Salto de línea
	    $this->Ln(20);

	    $this->cell(20,10,'Codigo', 1, 0, 'C',0);
		$this->cell(70,10,'Departamento', 1, 0, 'C',0);
		$this->cell(45,10,'Torre', 1, 0, 'C',0);
		$this->cell(30,10,'Brazaletes', 1, 0, 'C',0);
		$this->cell(30,10,'Personas', 1, 1, 'C',0);
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

$clasi=$_GET['id'];

	if ($clasi == 1 || $clasi == 2) {
		$rptPropietarios = pg_query("SELECT distinct dp.iddepa, dp.codigo, dp.nombre as propietario, 
						tr.nombre as torre, gr.nombre,
						dp.estatus,
						(SELECT count(ch.codigo) as brz
						from  codigos_huesped ch 
						where ch.iddepa=dp.iddepa) as brz,
						(SELECT  count(fm.chequeo) as est
						from familiares fm 
						where fm.departamento=dp.iddepa) as est 
						from departamentos dp 
						inner join torres tr on tr.idtor = dp.torre
						inner join grupo gr on gr.idgr= dp.clasificacion
						where dp.clasificacion =$clasi
						group by dp.iddepa, tr.nombre, gr.nombre
						order by dp.iddepa asc
						;");
	}else{
		$rptPropietarios = pg_query("SELECT distinct dp.iddepa, dp.codigo, dp.nombre as propietario, 
						tr.nombre as torre, gr.nombre,
						dp.estatus,
						(SELECT count(ch.codigo) as brz
						from  codigos_huesped ch 
						where ch.iddepa=dp.iddepa) as brz,
						(SELECT  count(fm.chequeo) as est
						from familiares fm 
						where fm.departamento=dp.iddepa) as est 
						from departamentos dp 
						inner join torres tr on tr.idtor = dp.torre
						inner join grupo gr on gr.idgr= dp.clasificacion
						
						group by dp.iddepa, tr.nombre, gr.nombre
						order by dp.iddepa asc");
	}


// Creación del objeto de la clase heredada
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','',12);

while ($row = pg_fetch_assoc($rptPropietarios)) {
	$pdf->cell(20,10,$row['codigo'], 1, 0, 'C',0);
	$pdf->cell(70,10,$row['propietario'], 1, 0, 'C',0);
	$pdf->cell(45,10,$row['torre'], 1, 0, 'C',0);
	$pdf->cell(30,10,$row['brz'], 1, 0, 'C',0);
	$pdf->cell(30,10,$row['est'], 1, 1, 'C',0);
}

$pdf->Output();
?>
