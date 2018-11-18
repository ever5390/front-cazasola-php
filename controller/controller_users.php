<?php

require_once ('../model/DAO_connection.php');
require_once ('../model/DAO_users.php');

session_start();

$usuario = $_POST['txtUser'];
$password = $_POST['txtPass'];

$consultas = new ConsultasUsuarios();
$registro_usuario = $consultas->cargarUsuarios($usuario,$password);

if($registro_usuario){
    foreach($registro_usuario as $user){

        if($user){
            $_SESSION["usuario_registrado"] = $user;
        }
    }
}
header('Location: ../view/cursos.php');

?>