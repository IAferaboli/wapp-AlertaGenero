<?php

require_once "conexion.php";

class Agresor extends Conexion {

    public $id_agresor, $nombre, $apellido, $id_altura, $id_cutis, $id_colorpelo, $relacion, $id_tatoo, $id_cicatriz, $id_discap;

    
    public function codearagresor($nombre, $apellido, $id_agresor){
        $name = substr($nombre, 0, 3);
        $apell = substr($apellido, -3, 3);
        $id = substr($dni, 0, 1);

        $alfanum = $name . $apell . $id;

        return $alfanum;
    }
    
    //Create - Cargar
    public function create()
    {
        $this->conectar();
        $prepare = mysqli_prepare($this->conect, "INSERT INTO agresores (nombre, apellido, id_altura, id_cutis, id_colorpelo, relacion, id_tatoo, id_cicatriz, id_discap) VALUES ( ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $prepare->bind_param("ssiiisiii", $this->nombre, $this->apellido, $this->id_altura, $this->id_cutis, $this->id_colorpelo, $this->relacion, $this->id_tatoo, $this->id_cicatriz, $this->id_discap);
        $prepare->execute();
    }
}