<?php

require_once "conexion.php";


class Agresor extends Conexion {

    public $id_agresor, $nombre, $apellido, $id_altura, $id_color, $id_tatoo, $id_cicatriz;

    
    public function codearagresor($nombre, $apellido){
        $name = substr($nombre, 0, 3);
        $apell = substr($apellido, -3, 3);

        $alfanum = $name . $apell;

        return $alfanum;
    }

    public function getPelo(){
        $conexion = new Conexion();
        $conexion->conectar();
        $prepare = mysqli_prepare($conexion->conect, "SELECT * FROM pelos WHERE id_color = ?");
        $prepare->bind_param("i", $this->id_color);
        $prepare->execute();
        $resultado = $prepare->get_result();
        return $resultado->fetch_object(Colorpelo::class);
    }

    public function getAltura(){
        $conexion = new Conexion();
        $conexion->conectar();
        $prepare = mysqli_prepare($conexion->conect, "SELECT * FROM altura WHERE id_altura = ?");
        $prepare->bind_param("i", $this->id_altura);
        $prepare->execute();
        $resultado = $prepare->get_result();
        return $resultado->fetch_object(Altura::class);
    }
    
    //Create - Cargar
    public function create()
    {
        $this->conectar();
        $prepare = mysqli_prepare($this->conect, "INSERT INTO agresores (nombre, apellido, id_altura, id_color, id_tatoo, id_cicatriz) VALUES (?, ?, ?, ?, ?, ?)");
        $prepare->bind_param("ssiiii", $this->nombre, $this->apellido, $this->id_altura, $this->id_color, $this->id_tatoo, $this->id_cicatriz);
        $prepare->execute();
    }

}