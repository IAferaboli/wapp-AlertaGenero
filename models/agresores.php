<?php

require_once "conexion.php";


class Agresor extends Conexion {

    public $id_agresor, $nombre, $apellido, $id_tatoo, $id_cicatriz, $alturaSeleccionada, $peloSeleccionado;

    
    public function codearagresor($nombre, $apellido){
        $name = substr($nombre, 0, 3);
        $apell = substr($apellido, -3, 3);

        $alfanum = $name . $apell;

        return $alfanum;
    }
    
    //Create - Cargar
    public function create()
    {
        $this->conectar();
        $prepare = mysqli_prepare($this->conect, "INSERT INTO agresores (nombre, apellido, id_altura, id_pelo, id_tatoo, id_cicatriz) VALUES (?, ?, ?, ?, ?)");
        $prepare->bind_param("ssiiii", $this->nombre, $this->apellido, $this->alturaSeleccionada, $this->peloSeleccionado, $this->id_tatoo, $this->id_cicatriz);
        $prepare->execute();
    }

}