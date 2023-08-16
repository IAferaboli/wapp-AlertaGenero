<?php

require_once "conexion.php";

class Usuarie extends Conexion {

    public $nombre, $apellido, $dni, $fecnac, $celContacto, $id_usuarie, $hashedni;

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
            $prepare = mysqli_prepare($this->conect, "INSERT INTO usuaries (nombre, apellido, dni, fecnac, celContacto, hashedni) VALUES (?, ?, ?, ?, ?, ?)");
            $prepare->bind_param("ssisss", $this->nombre, $this->apellido, $this->dni, $this->fecnac, $this->celContacto, $this->hashedni);
            $prepare->execute();
        } else {
            return $this->getUsuarie($this->hashedni);
        }
        
    }
    
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

    public static function getUsuarie($hashedni){
        $conexion = new Conexion();
        $conexion->conectar();
        $prepare = mysqli_prepare($conexion->conect, "SELECT * FROM usuaries WHERE hashedni = ?");
        $prepare->bind_param("s", $hashedni);
        $prepare->execute();
        $resultado = $prepare->get_result();
        return $resultado->fetch_object(Usuarie::class);
    }
    

}