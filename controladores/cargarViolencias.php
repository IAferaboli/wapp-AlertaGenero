<?php

require_once "../models/descargos.php";
require_once "../models/modalidades.php";
require_once "../models/tipos_violencias.php";

$modalidades = Modalidades::getModalidades();
$tipos = Tipos_violencia::getTipos();


//CARGAR VIOLENCIAS

if(isset($_POST['modalidadSeleccionada']) || isset($_POST['tipo_violenciaSeleccionada']) || isset($_POST['descargo'])){
    $descargo = new Descargo;
    // $descargo->id_usuarie = $_SESSION['id_usuarie'];
    $descargo->id_modalidad = $_POST['modalidadSeleccionada'];
    $descargo->id_tipo = $_POST['tipo_violenciaSeleccionada'];
    // $descargo->id_agresor = $_SESSION['id_agresor'];
    $descargo->descargo = $_POST['descargo'];
    // $descargo->fecha = date('Y-m-d');
    
    $descargo->create();

    //traer ultimo descargo creado e invocar método createPDF

}


require_once "../views/createDescargo.view.php";