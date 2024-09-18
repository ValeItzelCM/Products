<?php

class Conexion{
    private $host = "localhost";
    private $usuario = "root";
    private $contraseña = "";
    private $bd = "products";

    public $url = "http://127.0.0.1/Products";

    public function conectar(){
        $conexion = mysqli_connect(
            $this->host, 
            $this->usuario, 
            $this->contraseña
        );
    
        $estado = mysqli_select_db($conexion, $this->bd);
    
        if (!$estado) {
            die("Ocurrio un error en la conexión de la base de datos");
        }
        
        return $conexion;   
    } 
}
