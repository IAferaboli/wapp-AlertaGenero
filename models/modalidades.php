<?php

require_once "conexion.php";

class Modalidades extends Conexion {

    public $nombre, $id_modalidad;

    public static function getModalidad($id_modalidad){
        $conexion = new Conexion();
        $conexion->conectar();
        $prepare = mysqli_prepare($conexion->conect, "SELECT * FROM modalidades WHERE id_modalidad = ?");
        $prepare->bind_param("i", $id_modalidad);
        $prepare->execute();
        $resultado = $prepare->get_result();
        return $resultado->fetch_object(Modalidades::class);
    }

    public static function getModalidades(){
        $conexion = new Conexion();
        $conexion->conectar();
        $prepare = mysqli_prepare($conexion->conect, "SELECT nombre, id_modalidad FROM modalidades");
        $prepare->execute();
        $resposta = $prepare->get_result();

        $modalidades = array();
        while($modalidad = $resposta->fetch_object(Modalidades::class)) {
            array_push($modalidades, $modalidad);
        }

        return $modalidades;
    }


}