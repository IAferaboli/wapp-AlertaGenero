<?php

require_once "../models/descargos.php";
require_once "../models/modalidades.php";
require_once "../models/tipos_violencias.php";


$modalidades = Modalidades::getModalidades();
$tipos = Tipos_violencia::getTipos();


//CARGAR VIOLENCIAS

if(isset($_POST['modalidadSeleccionada']) || isset($_POST['tipo_violenciaSeleccionada']) || isset($_POST['descargo'])){
    $descargo = new Descargo;
    $descargo->id_modalidad = $_POST['modalidadSeleccionada'];
    $descargo->id_tipo = $_POST['tipo_violenciaSeleccionada'];
    $descargo->descargo = $_POST['descargo'];

    
    $descargoCreado = $descargo->create();

    $descargoCreado->generatePDF();
    session_destroy();

    $descargoCreado->sendMail();
    
}


require_once "../views/createDescargo.view.php";