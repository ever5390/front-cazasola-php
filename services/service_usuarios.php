<?php

session_start();
if(!$_SESSION["usuario_registrado"]){
    header('Location: ../index.html');    
}

require_once '../controller/controller_users.php';

$usuario = $_POST['txtUser'];
$password = $_POST['txtPass'];

$consultas = new Usuarios();
$registro_usuario = $consultas->getUsuarioLogin($usuario,$password);

if($registro_usuario){
    foreach($registro_usuario as $user){
        if($user){
            $_SESSION["usuario_registrado"] = $user;
        }
    }
}
header('Location: ../view/plataforma.php?ruta=cursos');
?>