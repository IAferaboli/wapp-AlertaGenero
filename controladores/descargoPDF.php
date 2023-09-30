<?php

require_once '../../models/usuaries.php';
require_once '../layout/pdf_mockup.php';

$usuarie = Usuarie::getUsuarie($hashedni);

$pdf = new PDF();
$pdf->AddPage();

$pdf->Ln();

$pdf->SetFont('Times', 'B', 12);

$pdf->Cell(35, 10, utf8_decode('Datos de la Víctima'), 1, 0, 'C', 0);
$pdf->SetDrawColor(80, 9, 74);
$pdf->SetLineWidth(2.0);
$pdf->Line(0, 0, 0, 30);

$pdf->Cell(35, 10, utf8_decode('Nombre:'. $usuarie->nombre), 0, 0, 'C', 0);
$pdf->Cell(35, 10, utf8_decode('Apellido:'. $usuarie->apellido), 0, 0, 'C', 0);
$pdf->Cell(85, 10, utf8_decode('Celular:'. $usuarie->celContacto), 0, 0, 'C', 0);
$pdf->Cell(15, 10, utf8_decode('Activo'), 0, 0, 'C', 0);

$pdf->Ln();

$pdf->SetFont('Times', '', 12);
foreach($clientes as $cliente){
    $pdf->Cell(35, 10, utf8_decode($cliente->nombre), 1, 0, 'C', 0);
    $pdf->Cell(35, 10, utf8_decode($cliente->apellidos), 1, 0, 'C', 0);
    $pdf->Cell(85, 10, utf8_decode($cliente->email), 1, 0, 'C', 0);
    if($cliente->activo == 1){
        $pdf->SetFillColor(0, 143, 57);
        $pdf->Cell(15, 10, utf8_decode('Sí'), 1, 0, 'C', 1);} else {
            $pdf->SetFillColor(248, 0, 0);
            $pdf->Cell(15, 10, utf8_decode('No'), 1, 0, 'C', 1);
        }
    $pdf->Ln();
}

$pdf->Output('D', date('dmY'). '_ListaClientes'.'.pdf');