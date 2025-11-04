<?php 

require "UsuarioModelo.php";

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


$input = file_get_contents("php://input");
$data = json_decode($input, true);


$modelo = new UsuarioModelo();

if ($data['accion']=="login"){

$resultado = $modelo -> login($data['email'],$data['password']);

if ($resultado=="admin") {
    $r = $modelo->listarNoSocios();
    header('Content-Type: application/json');
    echo json_encode($r);
    exit;
} 
else {
    if ($resultado="socio"){
        header('Location: coop.html');
    }
    else{
        header('Location: denegado.html');
    }
    exit;
}
}
if ($data['accion']=="registrar"){
$modelo -> inserta($data['email'],$data['nombre'],$data['cedula'],$data['password']);
}




?>

