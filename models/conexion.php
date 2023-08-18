<?php

class Conexion {
    public $conect, $ip, $usuario, $password, $db_name;
    public function conectar() {
        $this->conect= mysqli_connect($this->ip, $this->usuario, $this->password, $this->db_name);
    }

    public function desconectar() {
        mysqli_close($this->conect);
    }
}