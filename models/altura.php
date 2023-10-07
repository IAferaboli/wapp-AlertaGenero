<?php

require_once "conexion.php";

class Altura extends Conexion {

    public $altura, $id_altura;

    public function getAltura($id_altura){
        $conexion = new Conexion();
        $conexion->conectar();
        $prepare = mysqli_prepare($conexion->conect, "SELECT * FROM alturas WHERE id_altura = ?");
        $prepare->bind_param("i", $id_altura);
        $prepare->execute();
        $resultado = $prepare->get_result();
        return $resultado->fetch_object(Altura::class);
    }

    public static function getAlturas(){
        $conexion = new Conexion();
        $conexion->conectar();
        $prepare = mysqli_prepare($conexion->conect, "SELECT altura, id_altura FROM alturas");
        $prepare->execute();
        $resposta = $prepare->get_result();

        $alturas = array();
        while($altura = $resposta->fetch_object(Altura::class)) {
            array_push($alturas, $altura);
        }

        return $alturas;
    }

}