<?php

require_once "conexion.php";


class Descargo extends Conexion {

    public $id_descargo, $id_altura, $id_pelo, $id_tatoo, $id_cicatriz, $id_tipo, $id_modalidad, $descargo, $modalidadSeleccionada, $tipo_violenciaSeleccionada;


    public static function getUsuarie($hashedni){
        $conexion = new Conexion();
        $conexion->conectar();
        $prepare = mysqli_prepare($conexion->conect, "SELECT * FROM usuaries WHERE hashedni = ?");
        $prepare->bind_param("s", $hashedni);
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