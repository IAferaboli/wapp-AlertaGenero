<?php

require_once "conexion.php";

class Usuarie extends Conexion {

    public $id_usuarie, $dni, $hashedni, $nombre, $nombre_autoperc, $apellido, $fecnac, $celContacto, $id_institucion;

    //Hashear el dni (codificar el dni en hexadecimal)
    private function hashing($dni){
        $algo = 'sha256';
        $hashedni = hash($algo, $dni);

        return $hashedni;
    }

    //Create - Cargar
    public function cargar_usuarie()
    {
        
        self::getUsuarie($this->hashing($this->dni));

        //corroborar existencia del usuarie
        if(!$this->hashedni){
            $prepare = mysqli_prepare($this->conect, "INSERT INTO usuaries (dni, hashedni, nombre, nombre_autoperc, apellido, fecnac, celContacto, id_institucion) VALUES (?, ?, ?, ?, ?, ?, ?)");
            $prepare->bind_param("issssssi", $this->dni, $this->hashedni, $this->nombre, $this->nombre_autoperc, $this->apellido, $this->fecnac, $this->celContacto, $this->id_institucion);
            $prepare->execute();
        } else {
            return $this->getUsuarie($this->hashedni);
        }
        
    }
    
    public static function getUsuarie($hashedni){
        $conexion = new Conexion();
        $conexion->conectar();
        $prepare = mysqli_prepare($conexion->conect, "SELECT * FROM usuaries WHERE hashedni = ?");
        $prepare->bind_param("s", $hashedni);
        $prepare->execute();
        $resultado = $prepare->get_result();
        return $resultado->fetch_object(Usuarie::class);
    }
    
    public static function getAll(){
        $conexion = new Conexion();
        $conexion->conectar();
        $prepare = mysqli_prepare($conexion->conect, "SELECT * FROM usuaries");
        $prepare->execute();
        $resposta = $prepare->get_result();

        $usuaries = array();
        while($usuarie = $resposta->fetch_object(Usuarie::class)) {
            array_push($usuaries, $usuarie);
        }

        return $usuaries;
    }

}