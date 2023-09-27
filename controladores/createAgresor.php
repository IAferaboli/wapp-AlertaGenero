<?php

require_once "../models/agresores.php";
require_once "../models/altura.php";
require_once "../models/cicatrices.php";
require_once "../models/pelos.php";
require_once "../models/tatuajes.php";
require_once "../models/agresores.php";
$alturas = Altura::getAlturas();
$pelos = Colorpelo::getPelos();


//CARGAR AGRESOR

if(isset($_POST['nombre-agresor']) || isset($_POST['apellido-agresor']) || isset($_POST['alturaSeleccionada']) || isset($_POST['peloSeleccionado']) || isset($_POST['cicatriz']) || isset($_POST['tatuaje'])){
    $agresor = new Agresor;
    $agresor->nombre = $_POST['nombre-agresor'];
    $agresor->apellido = $_POST['apellido-agresor'];
    $agresor->id_altura = $_POST['alturaSeleccionada'];
    $agresor->id_color = $_POST['peloSeleccionado'];
    $agresor->id_cicatriz = $_POST['cicatriz'];
    $agresor->id_tatoo = $_POST['tatuaje'];

    $agresor->create();

}



require_once "../Views/createAgresores.view.php";