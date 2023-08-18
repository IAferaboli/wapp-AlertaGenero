<?php


include_once "../models/usuarie.php";
include_once "../models/instituciones.php";

$instituciones = Institucion::getAll();

//CARGAR uSUARIE/VÍCTIMA

if(isset($_POST['dni']) || isset($_POST['nombre']) || isset($_POST['nombre_autoperc']) || isset($_POST['apellido']) || isset($_POST['fecnac']) || isset($_POST['direccion']) || isset($_POST['telefono']) || isset($_POST['fecha_nacimiento']) || isset($_POST['sexo']) || isset($_POST['id_departamento'])){
    $usuarie = new Usuarie;
    $usuarie->dni = $_POST['dni'];
    $usuarie->nombre = $_POST['nombre'];
    $usuarie->nombre_autoperc = $_POST['nombre_autoperc'];
    $usuarie->apellido = $_POST['apellido'];
    $usuarie->fecnac = $_POST['fecnac'];
    $usuarie->celContacto = $_POST['celContacto'];
    $usuarie->id_institucion = $_POST['id_institucion'];
    $usuarie->cargar_usuarie();  

}

require_once "../Views/createUsuarie.view.php";