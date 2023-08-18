<?php

require_once "conexion.php";

class Institucion extends Conexion {

    public $id_institucion, $nombre, $email, $celContacto;

    public static function getAll(){
        $conexion = new Conexion();
        $conexion->conectar();
        $prepare = mysqli_prepare($conexion->conect, "SELECT * FROM instituciones");
        $prepare->execute();
        $resposta = $prepare->get_result();

        $instituciones = array();
        while($institucion = $resposta->fetch_object(Institucion::class)) {
            array_push($instituciones, $institucion);
        }

        return $instituciones;
    }

    public static function getByID($id_institucion){
        $conexion = new Conexion();
        $conexion->conectar();
        $prepare = mysqli_prepare($conexion->conect, "SELECT * FROM instituciones WHERE id_institucion = ?");
        $prepare->bind_param("i", $id_institucion);
        $prepare->execute();
        $resposta = $prepare->get_result();
        return $resposta->fetch_object(Institucion::class);
    }

}