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
$pdf->SetX(-45);
$pdf->Cell(35, 10, date('dmY H:i'), 0, 0, 'R', 0);

$pdf->Ln();
//Datos de la víctima
$pdf->SetFont('Times', 'B', 12);
$pdf->SetX(5);
$pdf->Cell(35, 10, utf8_decode('Datos de la víctima'),0, 0, 'L', 0);

$pdf->SetDrawColor(80, 9, 74);
$pdf->SetLineWidth(0.8);
$pdf->Line(5, 48, 65, 48);

$pdf->Ln();

$pdf->Cell(35, 10, utf8_decode('Nombre: Alejandra'), 0, 0, 'L', 0);
$pdf->Ln();
$pdf->Cell(35, 10, utf8_decode('Apellido: Pérez'), 0, 0, 'L', 0);
$pdf->Ln();
$pdf->Cell(35, 10, utf8_decode('Celular: 3364578967'), 0, 0, 'L', 0);
$pdf->Ln();
$pdf->Cell(35, 10, utf8_decode('Nombre autopercibido: '), 0, 0, 'L', 0);

$pdf->Ln();
//Datos del agresor
$pdf->SetFont('Times', 'B', 12);
$pdf->SetX(5);
$pdf->Cell(35, 10, utf8_decode('Datos del agresor'), 0, 0, 'L', 0);
$pdf->SetDrawColor(80, 9, 74);
$pdf->SetLineWidth(0.8);
$pdf->Line(5, 98, 65, 98);

$pdf->Ln();

$pdf->Cell(35, 10, utf8_decode('Nombre: '), 0, 0, 'L', 0);
$pdf->Ln();
$pdf->Cell(35, 10, utf8_decode('Apellido: '), 0, 0, 'L', 0);
$pdf->Ln();
$pdf->Cell(35, 10, utf8_decode('Altura: Alto'), 0, 0, 'L', 0);
$pdf->Ln();
$pdf->Cell(35, 10, utf8_decode('Color de pelo: Rubio'), 0, 0, 'L', 0);
$pdf->Ln();
$pdf->Cell(35, 10, utf8_decode('Tatuaje: Unicornio en la espalda'), 0, 0, 'L', 0);
$pdf->Ln();
$pdf->Cell(190, 10, utf8_decode('Cicatriz: orem ipsum dolor sit amet consectetur, adipisicing elit. Blanditiis, reprehenderit xxxxxxxxxx'), 0, 0, 'L', 0);

$pdf->Ln();
//Modalidad de violencia
$pdf->SetFont('Times', 'B', 12);
$pdf->SetX(5);
$pdf->Cell(35, 10, utf8_decode('Modalidad de Violencia'), 0, 0, 'L', 0);
$pdf->SetDrawColor(80, 9, 74);
$pdf->SetLineWidth(0.8);
$pdf->Line(5, 168, 65, 168);

$pdf->Ln();

$pdf->Cell(35, 10, utf8_decode('Modalidad de Violencia sufrida: Domestica'), 0, 0, 'L', 0);

$pdf->Ln();
//Tipo de violencia
$pdf->SetFont('Times', 'B', 12);
$pdf->SetX(5);
$pdf->Cell(35, 10, utf8_decode('Tipo de Violencia'), 0, 0, 'L', 0);
$pdf->SetDrawColor(80, 9, 74);
$pdf->SetLineWidth(0.8);
$pdf->Line(5, 188, 65, 188);

$pdf->Ln();

$pdf->Cell(35, 10, utf8_decode('Tipo de Violencia sufrida: Física'), 0, 0, 'L', 0);

$pdf->Ln();
//Relato de lo ocurrido
$pdf->SetFont('Times', 'B', 12);
$pdf->SetX(5);
$pdf->Cell(35, 10, utf8_decode('Descargo de la situación'), 0, 0, 'L', 0);
$pdf->SetDrawColor(80, 9, 74);
$pdf->SetLineWidth(0.8);
$pdf->Line(5, 208, 65, 208);

$pdf->Ln();

$pdf->MultiCell(190, 8, utf8_decode('Desarollo de lo ocurrido: : Lorem ipsum dolor sit amet consectetur, adipisicing elit. Blanditiis, reprehenderit sequi doloribus velit earum alias temporibus ab reiciendis natus vel architecto dolorem amet commodi esse nam corrupti inventore vero explicabo.'), 0, 'L', 0);

$pdf->Output('D', date('dmY'). '_Descargo'.$descargo->id_descargo.'.pdf');