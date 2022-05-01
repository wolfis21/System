<?php   

class Conexion{
    private $con;

    public function __construct()
    {
        $this->con= new mysqli('localhost', 'root', '', 's_system' );
    }

    public function getUsers(){
        $query =  $this->con->query('SELECT * FROM usuario');
        $return = [];

        $i=0;
        while($fila = $query->fetch_assoc()){
            $return[$i] = $fila;
            $i++;
        }
        
        return $return;
    }
}


?>