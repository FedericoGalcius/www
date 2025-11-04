<?php
require "UsuarioModelo.php";
$modelo = new UsuarioModelo();

if ($resultado == "admin") {
    $r = $modelo->listarNoSocios();
    echo json_encode($r);
}