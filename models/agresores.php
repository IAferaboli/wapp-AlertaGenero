<?php
//revisar todos los atributos en relación a la DB
require_once "conexion.php";

class Agresor extends Conexion {

    public $id_agresor, $nombre, $apellido, $id_altura, $id_pelo, $id_tatoo, $id_cicatriz, $alturaSeleccionada, $peloSeleccionado;

    
    // public function codearagresor($nombre, $apellido, $id_agresor){
    //     $name = substr($nombre, 0, 3);
    //     $apell = substr($apellido, -3, 3);
    //     $id = substr($id_agresor, 0, 1);

    //     $alfanum = $name . $apell . $id;

    //     return $alfanum;
    // }
    
    //Create - Cargar
    public function create()
    {
        $this->conectar();
        $prepare = mysqli_prepare($this->conect, "INSERT INTO agresores (nombre, apellido, id_altura, id_pelo, id_tatoo, id_cicatriz, id_discap) VALUES ( ?, ?, ?, ?, ?, ?)");
        $prepare->bind_param("ssiiii", $this->nombre, $this->apellido, $this->id_altura, $this->id_pelo, $this->id_tatoo, $this->id_cicatriz);
        $prepare->execute();
    }

    public function getAltura(){
        $conexion = new Conexion();
        $conexion->conectar();
        $prepare = mysqli_prepare($conexion->conect, "SELECT * FROM altura WHERE id_altura IN (SELECT id_altura FROM agresores WHERE id_altura =?)");
        $prepare->bind_param("i", $this->id_altura);
        $prepare->execute();
        $resposta = $prepare->get_result();
       
        $alturas = array();

        while($altura = $resposta->fetch_object(Altura::class)) {
            array_push($alturas, $altura);
        }

        return $alturas;
    }
}