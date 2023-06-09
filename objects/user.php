<php?

class usuario {

    public $nombre, $apellido, $dni, $celContacto;

    //Create
    public function create()
    {
        $this->conectar();
        $pre = mysqli_prepare($this->con, "INSERT INTO user (nombre, apellido, dni, celContacto) VALUES (?, ?, ?, ?)");
        $pre->bind_param("ssss", $this->nombre, $this->apellido, $this->dni, $this->celContacto);
        $pre->execute();
    }
    
    //Read
    public static function all()
    {
        $conexion = new Conexion();
        $conexion->conectar();
        $prepare = mysqli_prepare($conexion->con, "SELECT * FROM user");
        $prepare->execute();
        $res = $pre->get_result();

        $users = array();
        while ($users = $res->fetch_object(usuario::class)) {
            array_push($users, $user);
        }

        return $users;
    }

}