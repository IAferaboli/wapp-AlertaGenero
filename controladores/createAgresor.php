<?php

require_once "../models/agresores.php";
require_once "../models/altura.php";
require_once "../models/pelos.php";
$alturas = Altura::getAlturas();
$pelos = Colorpelo::getPelos();
session_start();

//CARGAR AGRESOR

if(isset($_POST['nombre-agresor']) || isset($_POST['apellido-agresor']) || isset($_POST['altura']) || isset($_POST['pelo']) || isset($_POST['tatuaje']) || isset($_POST['cicatriz'])){
    $agresor = new Agresor;
    $agresor->nombre = $_POST['nombre-agresor'];
    $agresor->apellido = $_POST['apellido-agresor'];
    $agresor->id_altura = $_POST['altura'];
    $agresor->id_color = $_POST['pelo'];
    $agresor->tatuaje = $_POST['tatuaje'];
    $agresor->cicatriz = $_POST['cicatriz'];
    
    $agresor->create();

    header("Location: ../controladores/cargarViolencias.php");
}



require_once "../Views/createAgresores.view.php";