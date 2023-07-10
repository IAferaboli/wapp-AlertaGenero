<?php

require_once "conexion.php";

class Usuarie extends Conexion {

    public $nombre, $apellido, $dni, $fecnac, $celContacto, $id_usuarie;

    //Create - Cargar
    public function create()
    {
        $this->conectar();
        $prepare = mysqli_prepare($this->conect, "INSERT INTO usuaries (nombre, apellido, dni, fecnac, celContacto) VALUES (?, ?, ?, ?, ?)");
        $prepare->bind_param("sssss", $this->nombre, $this->apellido, $this->dni, $this->fecnac, $this->celContacto);
        $prepare->execute();
    }
    
    // //Read - Leer
    // public static function readAll()
    // {
    //     $conexion = new Conexion();
    //     $conexion->conectar();
    //     $prepare = mysqli_prepare($conexion->conect, "SELECT * FROM usuaries");
    //     $prepare->execute();
    //     $resultado = $prepare->get_result();

    //     $usuaries = array();
    //     while ($usuaries = $resultado->fetch_object(usuarie::class)) {
    //         array_push($usuaries, $usuarie);
    //     }

    //     return $usuaries;
    // }

    // //Obtener xxxx por id
    // public static function getByID($id_usuarie){
    //     $conexion = new Conexion();
    //     $conexion->conectar();
    //     $prepare = mysqli_prepare($conexion->conect, "SELECT * FROM usuaries WHERE id_usuarie = ?");
    //     $prepare->bind_param("i", $id_usuarie);
    //     $prepare->execute();
    //     $resultado = $prepare->get_result();
    //     return $resultado->fetch_object(Usuarie::class);
    // }

    // //Update - Actualizar
    // public function update() {
    //     $this->conectar();
    //     $prepare = mysqli_prepare($this->conect, "UPDATE usuaries SET nombre = ?, apellido = ?, dni = ?, fecnac = ?, celContacto = ? WHERE id_usuarie = ?");
    //     $prepare->bind_param("sssssi", $this->nombre, $this->apellido, $this->dni, $this->fecnac, $this->celContacto, $this->id_usuarie);
    //     $prepare->execute();
    // }

    // //Delete - Eliminar registro -> averiguar cómo "hide" el registro
    // public function delete(){
    //     $this->conectar();
    //     $prepare = mysqli_prepare($this->conect, "DELETE FROM usuaries WHERE id_usuarie = ?");
    //     $prepare->bind_param("i", $this->id_usuarie);
    //     $prepare->execute();
    // }

}