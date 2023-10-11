<?php

require_once "conexion.php";
require_once '../layout/pdf_mockup.php';

class Descargo extends Conexion
{

    public $id_descargo, $id_usuarie, $id_modalidad, $id_tipo, $id_agresor, $descargo, $fecha;

    public function create()
    {
        $this->conectar();
        $prepare = mysqli_prepare($this->conect, "INSERT INTO descargos (id_usuarie, id_modalidad, id_tipo, id_agresor, descargo, fecha) VALUES (?, ?, ?, ?, ?, ?)");
        // $this->fecha = date('Y-m-d');
        // $this->id_usuarie = $_SESSION['id_usuarie'];
        $prepare->bind_param("iiiiss", $this->id_usuarie, $this->id_modalidad, $this->id_tipo, $this->id_agresor, $this->descargo, $this->fecha);
        $prepare->execute();
    }



    public function getAgresor()
    {
        $conexion = new Conexion();
        $conexion->conectar();
        $prepare = mysqli_prepare($conexion->conect, "SELECT * FROM agresores WHERE id_agresor = ?");
        $prepare->bind_param("i", $this->id_agresor);
        $prepare->execute();
        $resultado = $prepare->get_result();
        return $resultado->fetch_object(Agresor::class);
    }

    public static function getDescargo($id_descargo)
    {
        $conexion = new Conexion();
        $conexion->conectar();
        $prepare = mysqli_prepare($conexion->conect, "SELECT * FROM descargos WHERE id_descargo = ?");
        $prepare->bind_param("i", $id_descargo);
        $prepare->execute();
        $resultado = $prepare->get_result();
        return $resultado->fetch_object(Descargo::class);
    }

    public static function generatePDF($id_descargo)
    {

        //Obtener descargo
        $descargo = Descargo::getDescargo($id_descargo);
        
        //Guardo resultado de getAgresor
        $agresor= $descargo->getAgresor();

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
        $pdf->Cell(35, 10, utf8_decode('Datos de la víctima'), 0, 0, 'L', 0);

        $pdf->SetDrawColor(80, 9, 74);
        $pdf->SetLineWidth(0.8);
        $pdf->Line(5, 48, 65, 48);

        $pdf->Ln();

        $pdf->Cell(35, 10, utf8_decode('Nombre: '. $_SESSION['nombre']), 0, 0, 'L', 0);
        $pdf->Ln();
        $pdf->Cell(35, 10, utf8_decode('Nombre autopercibido: '. $_SESSION['nombre_autoperc']), 0, 0, 'L', 0);
        $pdf->Ln();
        $pdf->Cell(35, 10, utf8_decode('Apellido:'. $_SESSION['apellido']), 0, 0, 'L', 0);
        $pdf->Ln();
        $pdf->Cell(35, 10, utf8_decode('Celular: '. $_SESSION['celContacto']), 0, 0, 'L', 0);

        $pdf->Ln();
        //Datos del agresor
        $pdf->SetFont('Times', 'B', 12);
        $pdf->SetX(5);
        $pdf->Cell(35, 10, utf8_decode('Datos del agresor'), 0, 0, 'L', 0);
        $pdf->SetDrawColor(80, 9, 74);
        $pdf->SetLineWidth(0.8);
        $pdf->Line(5, 98, 65, 98);

        $pdf->Ln();

        $pdf->Cell(35, 10, utf8_decode('Nombre: '. $agresor->nombre), 0, 0, 'L', 0);
        $pdf->Ln();
        $pdf->Cell(35, 10, utf8_decode('Apellido: '. $agresor->apellido), 0, 0, 'L', 0);
        $pdf->Ln();
        $pdf->Cell(35, 10, utf8_decode('Altura: '. $agresor->getAltura()->altura), 0, 0, 'L', 0);
        $pdf->Ln();
        $pdf->Cell(35, 10, utf8_decode('Color de pelo: '.$agresor->getPelo()->detalle), 0, 0, 'L', 0);
        $pdf->Ln();
        $pdf->Cell(35, 10, utf8_decode('Tatuaje: '), 0, 0, 'L', 0);
        $pdf->Ln();
        $pdf->Cell(190, 10, utf8_decode('Cicatriz: '), 0, 0, 'L', 0);

        $pdf->Ln();
        //Modalidad de violencia
        $pdf->SetFont('Times', 'B', 12);
        $pdf->SetX(5);
        $pdf->Cell(35, 10, utf8_decode('Modalidad de Violencia'), 0, 0, 'L', 0);
        $pdf->SetDrawColor(80, 9, 74);
        $pdf->SetLineWidth(0.8);
        $pdf->Line(5, 168, 65, 168);

        $pdf->Ln();

        $pdf->Cell(35, 10, utf8_decode('Modalidad de Violencia sufrida: '), 0, 0, 'L', 0);

        $pdf->Ln();
        //Tipo de violencia
        $pdf->SetFont('Times', 'B', 12);
        $pdf->SetX(5);
        $pdf->Cell(35, 10, utf8_decode('Tipo de Violencia'), 0, 0, 'L', 0);
        $pdf->SetDrawColor(80, 9, 74);
        $pdf->SetLineWidth(0.8);
        $pdf->Line(5, 188, 65, 188);

        $pdf->Ln();

        $pdf->Cell(35, 10, utf8_decode('Tipo de Violencia sufrida: '), 0, 0, 'L', 0);

        $pdf->Ln();
        //Relato de lo ocurrido
        $pdf->SetFont('Times', 'B', 12);
        $pdf->SetX(5);
        $pdf->Cell(35, 10, utf8_decode('Descargo de la situación'), 0, 0, 'L', 0);
        $pdf->SetDrawColor(80, 9, 74);
        $pdf->SetLineWidth(0.8);
        $pdf->Line(5, 208, 65, 208);

        $pdf->Ln();

        $pdf->MultiCell(190, 8, utf8_decode('Desarollo de lo ocurrido: '), 0, 'L', 0);

        $pdf->Output('I', date('dmY') . '_Descargo' . $descargo->id_descargo . '.pdf');
    }
}
