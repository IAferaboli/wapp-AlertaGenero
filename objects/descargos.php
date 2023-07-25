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

    public $id_descargo, $nombre, $apellido, $dni, $id_altura, $id_cutis, $id_colorpelo, $relacion, $id_tatoo, $id_cicatriz, $id_discap, $id_tipo, $id_modalidad, $descrip;


    public static function getUsuarie($id_usuarie){
        $conexion = new Conexion();
        $conexion->conectar();
        $prepare = mysqli_prepare($conexion->conect, "SELECT * FROM usuaries WHERE id_usuarie = ?");
        $prepare->bind_param("i", $id_usuarie);
        $prepare->execute();
        $resultado = $prepare->get_result();
        return $resultado->fetch_object(Usuarie::class);
    }
    
    public static function getAgresor($id_agresor){
        $conexion = new Conexion();
        $conexion->conectar();
        $prepare = mysqli_prepare($conexion->conect, "SELECT * FROM agresores WHERE id_agresores = ?");
        $prepare->bind_param("i", $id_agresor);
        $prepare->execute();
        $resultado = $prepare->get_result();
        return $resultado->fetch_object(Agresor::class);
    }
}