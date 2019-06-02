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

	$statement = ADOPedidos::getPedidosReporte();
	
	$pdf = new PDF();
    $pdf->AliasNbPages();
    $pdf->AddPage();

    $pdf->SetFillColor(255,255,255);
    $pdf->SetFont('Arial','B',12);
    $pdf->Cell(20,8,'Imagen',1,0,'C',1);
    $pdf->Cell(60,8,'Usuario',1,0,'C',1);
    $pdf->Cell(30,8,'Fecha',1,0,'C',1);
    $pdf->Cell(30,8,'Pedidos',1,0,'C',1);
    $pdf->Cell(30,8,'Total',1,1,'C',1);
    $pdf->SetFont('Arial','',10);

    $total = 0;
    while($row = $statement->fetch(PDO::FETCH_ASSOC))
    {
        $fecha = date("d M Y ", strtotime($row['fecha_pedido']));
        $subtotal = number_format($row['total'], 2, '.', ',');
        $urlimg = "../img/".$row['imagen'];

        $pdf->Cell( 20, 10, $pdf->Image($urlimg, $pdf->GetX(), $pdf->GetY(), 20), 0, 0, 'L', false );
        $pdf->Cell(60,20,utf8_decode($row['usr_name']),1,0,'C');
        $pdf->Cell(30,20,utf8_decode($fecha),1,0,'C');
        $pdf->Cell(30,20,utf8_decode($row['items']),1,0,'C');
        $pdf->Cell(30,20,utf8_decode('$'.$subtotal),1,1,'C');

        $total += $row['total'];
    }

    $pdf->SetFont('Arial','B',15);
    $pdf->Cell(85);
    $pdf->Cell(120,10, 'Total = $'.number_format($total, 2, '.', ','),0,0,'C');
    $pdf->Ln(20);

    $pdf->close();
    $pdf->Output();
?>