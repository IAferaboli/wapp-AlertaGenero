<?php

require_once '../models/usuarie.php';
require_once '../models/agresores.php';
require_once '../models/descargos.php';
require_once '../layout/pdf_mockup.php';

$usuarie = Usuarie::getUsuarie($hashedni);

$pdf = new PDF();
$pdf->AddPage();

$pdf->Ln();

$pdf->SetFont('Times', 'B', 12);
$pdf->SetX(-10);
$pdf->Cell(35, 10, date('dmY H:i'), 0, 0, 'L', 0);

$pdf->Ln();
//Datos de la víctima
$pdf->SetFont('Times', 'B', 12);
$pdf->Cell(35, 10, utf8_decode('Datos de la víctima'), 1, 0, 'R', 0);
$pdf->SetDrawColor(80, 9, 74);
$pdf->SetLineWidth(2.0);
$pdf->Line(0, 0, 0, 30);

$pdf->Ln();

$pdf->Cell(35, 10, utf8_decode('Nombre: '. $usuarie->nombre), 0, 0, 'R', 0);
$pdf->Cell(35, 10, utf8_decode('Apellido: '. $usuarie->apellido), 0, 0, 'R', 0);
$pdf->Cell(35, 10, utf8_decode('Celular: '. $usuarie->celContacto), 0, 0, 'R', 0);
$pdf->Cell(35, 10, utf8_decode('Nombre autopercibido: '. $usuarie->nombre_autoperc), 0, 0, 'R', 0);

$pdf->Ln();
//Datos del agresor
$pdf->SetFont('Times', 'B', 12);

$pdf->Cell(35, 10, utf8_decode('Datos del agresor'), 1, 0, 'R', 0);
$pdf->SetDrawColor(80, 9, 74);
$pdf->SetLineWidth(2.0);
$pdf->Line(0, 0, 0, 30);

$pdf->Ln();

$pdf->Cell(35, 10, utf8_decode('Nombre: '. $agresor->nombre), 0, 0, 'R', 0);
$pdf->Cell(35, 10, utf8_decode('Apellido: '. $agresor->apellido), 0, 0, 'R', 0);
$pdf->Cell(35, 10, utf8_decode('Altura: '. $agresor->alturaSeleccionada), 0, 0, 'R', 0);
$pdf->Cell(35, 10, utf8_decode('Color de pelo: '. $agresor->peloSeleccionado), 0, 0, 'R', 0);
$pdf->Cell(35, 10, utf8_decode('Tatuaje: '. $agresor->id_tatoo), 0, 0, 'R', 0);
$pdf->Cell(35, 10, utf8_decode('Cicatriz: '. $agresor->id_cicatriz), 0, 0, 'R', 0);

$pdf->Ln();
//Modalidad de violencia
$pdf->SetFont('Times', 'B', 12);

$pdf->Cell(35, 10, utf8_decode('Modalidad de Violencia'), 1, 0, 'R', 0);
$pdf->SetDrawColor(80, 9, 74);
$pdf->SetLineWidth(2.0);
$pdf->Line(0, 0, 0, 30);

$pdf->Ln();

$pdf->Cell(35, 10, utf8_decode('Modalidad de Violencia sufrida: '. $descargo->modalidadSeleccionada), 0, 0, 'R', 0);

$pdf->Ln();
//Tipo de violencia
$pdf->SetFont('Times', 'BU', 12);

$pdf->Cell(35, 10, utf8_decode('Tipo de Violencia'), 1, 0, 'R', 0);
$pdf->SetDrawColor(80, 9, 74);
$pdf->SetLineWidth(2.0);
$pdf->Line(0, 0, 0, 30);

$pdf->Ln();

$pdf->Cell(35, 10, utf8_decode('Tipo de Violencia sufrida: '. $descargo->tipo_violenciaSeleccionada), 0, 0, 'R', 0);

$pdf->Ln();
//Relato de lo ocurrido
$pdf->SetFont('Times', 'B', 12);

$pdf->Cell(35, 10, utf8_decode('Descargo de la situación'), 1, 0, 'C', 0);
$pdf->SetDrawColor(80, 9, 74);
$pdf->SetLineWidth(2.0);
$pdf->Line(0, 0, 0, 30);

$pdf->Ln();

$pdf->Cell(35, 50, utf8_decode('Desarollo de lo ocurrido: '. $descargo->descargo), 0, 0, 'R', 0);

$pdf->Output('D', date('dmY'). '_Descargo'.$descargo->id_descargo.'.pdf');