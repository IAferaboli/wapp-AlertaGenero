<?php

require_once "conexion.php";
require_once '../layout/pdf_mockup.php';
require_once 'agresores.php';
require_once 'modalidades.php';
require_once 'tipos_violencias.php';
require_once 'altura.php';
require_once 'pelos.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require '../PHPMailer-master/src/Exception.php';
require '../PHPMailer-master/src/PHPMailer.php';
require '../PHPMailer-master/src/SMTP.php';



session_start();
date_default_timezone_set('America/Argentina/Buenos_Aires');

class Descargo extends Conexion
{

    public $id_descargo, $id_usuarie, $id_modalidad, $id_tipo, $id_agresor, $descargo, $fecha;

    public function create()
    {
        $this->conectar();
        $prepare = mysqli_prepare($this->conect, "INSERT INTO descargos (id_usuarie, id_modalidad, id_tipo, id_agresor, descargo, fecha) VALUES (?, ?, ?, ?, ?, ?)");
        $this->fecha = date('Y-m-d');
        $this->id_usuarie = $_SESSION['id_usuarie'];
        $this->id_agresor = $_SESSION['id_agresor'];
        $prepare->bind_param("iiiiss", $this->id_usuarie, $this->id_modalidad, $this->id_tipo, $this->id_agresor, $this->descargo, $this->fecha);
        $prepare->execute();

        return Descargo::getDescargo($prepare->insert_id);
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

    public function getModalidad()
    {
        $conexion = new Conexion();
        $conexion->conectar();
        $prepare = mysqli_prepare($conexion->conect, "SELECT * FROM modalidades WHERE id_modalidad = ?");
        $prepare->bind_param("i", $this->id_modalidad);
        $prepare->execute();
        $resultado = $prepare->get_result();
        return $resultado->fetch_object(Modalidades::class);
    }

    public function getTipo()
    {
        $conexion = new Conexion();
        $conexion->conectar();
        $prepare = mysqli_prepare($conexion->conect, "SELECT * FROM tipos_violencias WHERE id_tipo = ?");
        $prepare->bind_param("i", $this->id_tipo);
        $prepare->execute();
        $resultado = $prepare->get_result();
        return $resultado->fetch_object(Tipos_violencia::class);
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

    public function generatePDF()
    {

        //Guardo resultado de getAgresor
        $agresor = $this->getAgresor();

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

        $pdf->Cell(35, 10, utf8_decode('Nombre: ' . $_SESSION['nombre']), 0, 0, 'L', 0);
        $pdf->Ln();
        $pdf->Cell(35, 10, utf8_decode('Nombre autopercibido: ' . $_SESSION['nombre_autoperc']), 0, 0, 'L', 0);
        $pdf->Ln();
        $pdf->Cell(35, 10, utf8_decode('Apellido:' . $_SESSION['apellido']), 0, 0, 'L', 0);
        $pdf->Ln();
        $pdf->Cell(35, 10, utf8_decode('Celular: ' . $_SESSION['celContacto']), 0, 0, 'L', 0);

        $pdf->Ln();
        //Datos del agresor
        $pdf->SetFont('Times', 'B', 12);
        $pdf->SetX(5);
        $pdf->Cell(35, 10, utf8_decode('Datos del agresor'), 0, 0, 'L', 0);
        $pdf->SetDrawColor(80, 9, 74);
        $pdf->SetLineWidth(0.8);
        $pdf->Line(5, 98, 65, 98);

        $pdf->Ln();

        $pdf->Cell(35, 10, utf8_decode('Nombre: ' . $agresor->nombre), 0, 0, 'L', 0);
        $pdf->Ln();
        $pdf->Cell(35, 10, utf8_decode('Apellido: ' . $agresor->apellido), 0, 0, 'L', 0);
        $pdf->Ln();
        $pdf->Cell(35, 10, utf8_decode('Altura: ' . $agresor->getAltura()->altura), 0, 0, 'L', 0);
        $pdf->Ln();
        $pdf->Cell(35, 10, utf8_decode('Color de pelo: ' . $agresor->getPelo()->detalle), 0, 0, 'L', 0);
        $pdf->Ln();
        $pdf->Cell(35, 10, utf8_decode('Tatuaje: ' . $agresor->tatuaje), 0, 0, 'L', 0);
        $pdf->Ln();
        $pdf->Cell(190, 10, utf8_decode('Cicatriz: ' . $agresor->cicatriz), 0, 0, 'L', 0);

        $pdf->Ln();
        //Modalidad de violencia
        $pdf->SetFont('Times', 'B', 12);
        $pdf->SetX(5);
        $pdf->Cell(35, 10, utf8_decode('Modalidad de Violencia'), 0, 0, 'L', 0);
        $pdf->SetDrawColor(80, 9, 74);
        $pdf->SetLineWidth(0.8);
        $pdf->Line(5, 168, 65, 168);

        $pdf->Ln();

        $pdf->Cell(35, 10, utf8_decode('Modalidad de Violencia sufrida: ' . $this->getModalidad()->nombre), 0, 0, 'L', 0);

        $pdf->Ln();
        //Tipo de violencia
        $pdf->SetFont('Times', 'B', 12);
        $pdf->SetX(5);
        $pdf->Cell(35, 10, utf8_decode('Tipo de Violencia'), 0, 0, 'L', 0);
        $pdf->SetDrawColor(80, 9, 74);
        $pdf->SetLineWidth(0.8);
        $pdf->Line(5, 188, 65, 188);

        $pdf->Ln();

        $pdf->Cell(35, 10, utf8_decode('Tipo de Violencia sufrida: ' . $this->getTipo()->nombre), 0, 0, 'L', 0);

        $pdf->Ln();
        //Relato de lo ocurrido
        $pdf->SetFont('Times', 'B', 12);
        $pdf->SetX(5);
        $pdf->Cell(35, 10, utf8_decode('Descargo de la situación'), 0, 0, 'L', 0);
        $pdf->SetDrawColor(80, 9, 74);
        $pdf->SetLineWidth(0.8);
        $pdf->Line(5, 208, 65, 208);

        $pdf->Ln();

        $pdf->MultiCell(190, 8, utf8_decode('Desarollo de lo ocurrido: ' . $this->descargo), 0, 'L', 0);

        $filename = date('dmY') . '_Descargo_' . $this->id_descargo . '.pdf';
        $ruta_archivo = "../temp/$filename";

        $pdf->Output('F', $ruta_archivo, true);
    }

    public function sendMail()
    {
        $mail = new PHPMailer(true);

        try {
            //Server settings
            $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
            $mail->isSMTP();
            $mail->Host = 'sandbox.smtp.mailtrap.io';
            $mail->SMTPAuth = true;
            $mail->Port = 2525;
            $mail->Username = 'ee18f3d61763a8';
            $mail->Password = '612870c3b36420';                        //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

            //Recipients
            $mail->setFrom('asd@alertagenero.ar', 'AlertaGenero');
            $mail->addAddress('rotilinicolas@gmail.com', 'Muni');     //Add a recipient
            // $mail->addAddress('ellen@example.com');               //Name is optional
            // $mail->addReplyTo('info@example.com', 'Information');
            // $mail->addCC('cc@example.com');
            // $mail->addBCC('bcc@example.com');

            //Attachments
            $filename = date('dmY') . '_Descargo_' . $this->id_descargo . '.pdf';
            $ruta_archivo = "../temp/$filename";
            $contenido = file_get_contents($ruta_archivo);
            $mail->addStringAttachment($contenido, $filename);
            if (file_exists($ruta_archivo)) {
                unlink($ruta_archivo);
            }

            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = utf8_decode('Nuevo Descargo de Violencia de Género');
            $mail->Body    = utf8_decode('Estimada/o, adjunto va un nuevo descargo por violencia de género sufrido en su Institución. <b>No dude en contactarnos para más información</b>');
            //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

            $mail->send();
            echo 'Tu descargo ha sido enviado';
        } catch (Exception $e) {
            echo "El descargo no pudo ser enviado. Error: {$mail->ErrorInfo}";
        }
    }
}
