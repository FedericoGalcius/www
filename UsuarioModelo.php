<?php

class UsuarioModelo{
    public $conexion;


function __construct  (){
    $this->conexion=new mysqli("localhost","root","myReallyStrongPwd","mvc");

}

public function inserta($email, $nombre, $cedula, $password ){
    $sql="insert into usuarios(email, nombre, cedula, passwords)
    values('$email', '$nombre', '$cedula', '$password')";

;
   $this->conexion->query($sql);
}

public function login ($email, $password){

    $sql="select admin from usuarios where email='$email' and passwords='$password' and socio=1 and admin=1;";
   
     //$this->conexion->query($sql);

     
         if ($this->conexion->query($sql)->num_rows >0){
            return "admin";
         }
         else {
            $sql="select * from usuarios where email='$email' and passwords='$password' and socio =1";
            if ($this->conexion->query($sql)-num_rows >0){
                return "socio";
            }
            else {
                return "denegado";
            }
            
         }
             

     return 1;
}

public function listarNoSocios() {
    $sql = "SELECT * FROM usuarios WHERE socio = 0;";
    $result = $this->conexion->query($sql);
    return $result;
}

}

?>