<?php

require_once "conexion.php";

class Tipos_violencia extends Conexion {

    public $nombre, $id_tipo;

   public static function getTipo($id_tipo){
        $conexion = new Conexion();
        $conexion->conectar();
        $prepare = mysqli_prepare($conexion->conect, "SELECT * FROM tipos_violencias WHERE id_tipo = ?");
        $prepare->bind_param("i", $id_tipo);
        $prepare->execute();
        $resultado = $prepare->get_result();
        return $resultado->fetch_object(Tipos_violencia::class);
    }

    public static function getTipos(){
        $conexion = new Conexion();
        $conexion->conectar();
        $prepare = mysqli_prepare($conexion->conect, "SELECT nombre, id_tipo FROM tipos_violencia");
        $prepare->execute();
        $resposta = $prepare->get_result();

        $tipos = array();
        while($tipo = $resposta->fetch_object(Tipos_violencia::class)) {
            array_push($tipos, $tipo);
        }

        return $tipos;
    }

}