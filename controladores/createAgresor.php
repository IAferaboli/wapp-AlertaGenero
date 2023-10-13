<?php

require_once "../models/agresores.php";
require_once "../models/altura.php";
require_once "../models/pelos.php";
$alturas = Altura::getAlturas();
$pelos = Colorpelo::getPelos();
session_start();

//CARGAR AGRESOR

if(isset($_POST['nombre-agresor']) || isset($_POST['apellido-agresor']) || isset($_POST['alturaSeleccionada']) || isset($_POST['peloSeleccionado']) || isset($_POST['tatuaje']) || isset($_POST['cicatriz'])){
    $agresor = new Agresor;
    $agresor->nombre = $_POST['nombre-agresor'];
    $agresor->apellido = $_POST['apellido-agresor'];
    $agresor->id_altura = $_POST['alturaSeleccionada'];
    $agresor->id_color = $_POST['peloSeleccionado'];
    $agresor->tatuaje = $_POST['tatuaje'];
    $agresor->cicatriz = $_POST['cicatriz'];
    
    $agresor->create();

    header("Location: ../controladores/cargarViolencias.php");
}



require_once "../Views/createAgresores.view.php";