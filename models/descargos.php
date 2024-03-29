<?php

require_once "conexion.php";
require_once "agresores.php";
require_once "usuarie.php";
require_once "altura.php";
require_once "cicatrices.php";
require_once "discapacidades.php";
require_once "instituciones.php";
require_once "modalidades.php";
require_once "pelos.php";
require_once "tatuajes.php";
require_once "tipos_violencias.php";
require_once "usuarie.php";

class Descargo extends Conexion {

    public $id_descargo, $nombre, $apellido, $dni, $id_altura, $id_colorpelo,$id_tatoo, $id_cicatriz, $id_discap, $id_tipo, $id_modalidad, $descrip;


    public static function getUsuarie($dni){
        $conexion = new Conexion();
        $conexion->conectar();
        $prepare = mysqli_prepare($conexion->conect, "SELECT * FROM usuaries WHERE dni = ?");
        $prepare->bind_param("i", $dni);
        $prepare->execute();
        $resultado = $prepare->get_result();
        return $resultado->fetch_object(Usuarie::class);
    }
    
    public static function getAgresor($id_agresor){
        $conexion = new Conexion();
        $conexion->conectar();
        $prepare = mysqli_prepare($conexion->conect, "SELECT * FROM agresores WHERE id_agresor = ?");
        $prepare->bind_param("i", $id_agresor);
        $prepare->execute();
        $resultado = $prepare->get_result();
        return $resultado->fetch_object(Agresor::class);
    }
}