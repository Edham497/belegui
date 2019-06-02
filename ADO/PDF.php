<?php 
require '../fpdf/fpdf.php';
require_once '../ADO/ADOPedidos.php';
require_once '../ADO/Conexion.php';

	class PDF extends FPDF
	{
		function Header()
		{
			$this->SetFont('Arial','B',15);
			$this->Cell(30);
			$this->Cell(120,10, 'Registro de pedidos',0,0,'C');
			$this->Ln(20);
		}
		
		function Footer()
		{
			$this->SetY(-15);
			$this->SetFont('Arial','I', 8);
			$this->Cell(0,10, 'Pagina '.$this->PageNo().'/{nb}',0,0,'C' );
		}		
	}

	$statement = ADOPedidos::getUsersPedidos();
	
	$pdf = new PDF();
    $pdf->AliasNbPages();
    $pdf->AddPage();

    $pdf->SetFillColor(232,232,232);
    $pdf->SetFont('Arial','B',12);
    $pdf->Cell(20,8,'#',1,0,'C',1);
    $pdf->Cell(20,8,'Usuario',1,0,'C',1);
    $pdf->Cell(60,8,'Fecha del pedido',1,0,'C',1);
    $pdf->Cell(50,8,'Items',1,0,'C',1);
    $pdf->Cell(30,8,'Precio $',1,1,'C',1);
    $pdf->SetFont('Arial','',10);

    $count = 1;
    while($row = $statement->fetch(PDO::FETCH_ASSOC))
    {
        $pdf->Cell(20,8,$count,1,0,'C');
        $pdf->Cell(20,8,utf8_decode($row['nombre']),1,0,'C');
        $pdf->Cell(60,8,utf8_decode($row['fecha_pedido']),1,0,'C');
        $pdf->Cell(50,8,utf8_decode($row['items']),1,0,'C');
        $pdf->Cell(30,8,utf8_decode($row['total']),1,1,'C');
        $count = $count + 1;
    }
    $pdf->close();
    $pdf->Output();
?>