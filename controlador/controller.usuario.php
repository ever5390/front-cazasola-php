<?php

require_once ('../modelo/class.conexion.php');
require_once ('../modelo/class.consultas_usuarios.php');

$mensaje = null;

session_start();

$usuario = $_POST['txtUser'];
$password = $_POST['txtPass'];
$consultas = new ConsultasUsuarios();
$registro_usuario = $consultas->cargarUsuarios($usuario,$password);

if($registro_usuario){
    // $_SESSION["usuario_registrado"] = $registro_usuario;
    foreach($registro_usuario as $user){

        if($user){
            $_SESSION["usuario_registrado"] = $user;
        }
    }
}
header('Location: ../plataforma.php');

?>