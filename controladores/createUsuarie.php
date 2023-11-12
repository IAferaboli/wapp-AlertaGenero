<?php


require_once "../models/usuarie.php";
require_once "../models/instituciones.php";
session_start();

$instituciones = Institucion::getAll();

//CARGAR USUARIE/VÍCTIMA
if(isset($_POST['dni']) || isset($_POST['nombre']) || isset($_POST['nombre_autoperc']) || isset($_POST['apellido']) || isset($_POST['fecnac']) || isset($_POST['celContacto']) || isset($_POST['id_instituciones'])){

 
    $usuarie = new Usuarie;
    $usuarie->dni = $_POST['dni'];
    $usuarie->fecnac = $_POST['fecnac'];
    $usuarie->id_institucion = $_POST['id_institucion'];
    if (isset($_POST['atencionMed'])) {
        $usuarie->atencionMed = $_POST['atencionMed'];
    }else {
        $usuarie->atencionMed =0;
    }
    
    $usuarie->cargar_usuarie();
    
    

    $_SESSION['nombre'] = $_POST['nombre'];
    $_SESSION['nombre_autoperc'] = $_POST['nombre_autoperc'];
    $_SESSION['apellido'] = $_POST['apellido'];
    $_SESSION['celContacto'] = $_POST['celContacto'];

    header("Location: ../controladores/createAgresor.php"); 
}

require_once "../Views/createUsuarie.view.php";


