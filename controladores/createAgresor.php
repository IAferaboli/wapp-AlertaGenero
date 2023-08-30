<?php

require_once "../models/altura.php";
require_once "../models/cicatrices.php";
require_once "../models/discapacidades.php";
require_once "../models/pelos.php";
require_once "../models/tatuajes.php";

$alturas = Altura::getAlturas();


//CARGAR AGRESOR

if(isset($_POST['nombre-agresor']) || isset($_POST['apellido-agresor']) || isset($_POST['alturaSeleccionada']) || isset($_POST['peloSeleccionado']) || isset($_POST['cicatriz']) || isset($_POST['discapacidad']) || isset($_POST['tatuaje'])){
    $agresor = new Agresor;
    $agresor->nombre = $_POST['nombre-agresor'];
    $agresor->apellido = $_POST['apellido-agresor'];
    $agresor->id_altura = $_POST['alturaSeleccionada'];
    $agresor->id_pelo = $_POST['ciudad'];
    // $agresor->direccion = $_POST['direccion'];
    // $agresor->telefono = $_POST['telefono'];
    // $agresor->fecha_nacimiento = $_POST['fecha_nacimiento'];
    // $agresor->sexo = $_POST['sexo'];
    // $agresor->id_asignaturas = $_POST['alturaSeleccionada'];
    // $agresor->create();

    // a modificar lo que está comentado
}



require_once "../Views/createAgresores.view.php";