<?php

require_once "conexion.php";

class Usuarie extends Conexion {

    public $nombre, $apellido, $dni, $fecnac, $celContacto, $id_usuarie, $hashedni, $alfanum;

    //Hashear el dni (codificar el dni en hexadecimal)
    function hashing($dni){
        $algo = 'sha256';
        $hashedni = hash($algo, $dni);

        return $hashedni;
    }

    //Create - Cargar
    public function create()
    {
        $this->conectar();
        $prepare = mysqli_prepare($this->conect, "INSERT INTO usuaries (nombre, apellido, dni, fecnac, celContacto, hashedni, alfanum) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $prepare->bind_param("sssssss", $this->nombre, $this->apellido, $this->dni, $this->fecnac, $this->celContacto, $this->hashedni, $this->alfanum);
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


    public static function getUsuarieHashed($id_agresor){
        $conexion = new Conexion();
        $conexion->conectar();
        $prepare = mysqli_prepare($conexion->conect, "SELECT * FROM agresores WHERE id_agresores = ?");
        $prepare->bind_param("i", $id_agresor);
        $prepare->execute();
        $resultado = $prepare->get_result();
        return $resultado->fetch_object(Agresor::class);
    }
}