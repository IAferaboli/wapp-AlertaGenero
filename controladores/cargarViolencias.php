<?php

require_once "../models/descargos.php";
require_once "../models/modalidades.php";
require_once "../models/tipos_violencias.php";
session_start();

$modalidades = Modalidades::getModalidades();
$tipos = Tipos_violencia::getTipos();


//CARGAR VIOLENCIAS

if(isset($_POST['modalidad']) || isset($_POST['tipo_violencia']) || isset($_POST['descargo'])){
    $descargo = new Descargo;
    $descargo->id_modalidad = $_POST['modalidad'];
    $descargo->id_tipo = $_POST['tipo_violencia'];
    $descargo->descargo = $_POST['descargo'];
    
    $descargoCreado = $descargo->create();

    $descargoCreado->generatePDF();
    
    $descargoCreado->sendMail();
    
    
    header("Location: ../controladores/createUsuarie.php");
}


require_once "../views/createDescargo.view.php";