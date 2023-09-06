<?php

require_once "conexion.php";

class Colorpelo extends Conexion {

    public $id_color, $detalle;

    public static function getPelo($id_color){
        $conexion = new Conexion();
        $conexion->conectar();
        $prepare = mysqli_prepare($conexion->conect, "SELECT * FROM pelos WHERE id_color = ?");
        $prepare->bind_param("i", $id_color);
        $prepare->execute();
        $resultado = $prepare->get_result();
        return $resultado->fetch_object(Colorpelo::class);
    }

    public static function getPelos(){
        $conexion = new Conexion();
        $conexion->conectar();
        $prepare = mysqli_prepare($conexion->conect, "SELECT color, id_color FROM pelos");
        $prepare->execute();
        $resposta = $prepare->get_result();

        $pelos = array();
        while($pelo = $resposta->fetch_object(Colorpelo::class)) {
            array_push($pelos, $pelo);
        }

        return $pelos;
    }

}