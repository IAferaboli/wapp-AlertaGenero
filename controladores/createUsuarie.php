<?php


require_once "../models/usuarie.php";
require_once "../models/instituciones.php";

$instituciones = Institucion::getAll();

//CARGAR USUARIE/VÍCTIMA
if(isset($_POST['dni']) || isset($_POST['nombre']) || isset($_POST['nombre_autoperc']) || isset($_POST['apellido']) || isset($_POST['fecnac']) || isset($_POST['celContacto']) || isset($_POST['id_instituciones'])){
    $usuarie = new Usuarie;
    // $usuarie->hashedni = $hashedni;
    // $usuarie->dni = $_POST['dni'];
    // $usuarie->nombre = $_POST['nombre'];
    // $usuarie->nombre_autoperc = $_POST['nombre_autoperc'];
    // $usuarie->apellido = $_POST['apellido'];
    $usuarie->fecnac = $_POST['fecnac'];
    $usuarie->celContacto = $_POST['celContacto'];
    $usuarie->id_institucion = $_POST['id_institucion'];
    $usuarie->atencionMed = $_POST['atencionMed'];
    $usuarie->cargar_usuarie();
}

require_once "../Views/createUsuarie.view.php";


