<?php

require('../vendor/fpdf186/fpdf.php');

class PDF extends FPDF {

    //cabecera personalizada
    function Header(){
        //Logo
        $this->Image('../src/alertagenero_logo.png', 10, 8, 20);
        //Set fuente
        $this->SetFont('Times', 'BU', 14);
        $this->SetX(25);
        $this->Cell(0, 10, utf8_decode('Descargo de Violencia de Género'), 0, 1, 'C');
    }

    function Footer(){
        //Posición 25mm por encima del final
        $this->SetY(-25);
        //Set fuente
        $this->SetFont('Times', 'I', 10);
        $this->MultiCell(190, 8, utf8_decode('Descargo de Violencia realizado a través de Alerta Género. | Información Privada a la que Ud. y sólo Ud. tiene acceso.'), 0, 'C', 0);
        //Numeración de pag
        $this->Cell(0, 10, utf8_decode('Pág.'). $this->PageNo().'/{nb}', 0,0, 'C');
    }
}