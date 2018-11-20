<?php

require_once ('../model/DAO_connection.php');
require_once ('../model/DAO_users.php');

Class Usuarios{
    
    function getUsuarioLogin($user, $pass){
        $usuario = new ConsultasUsuarios();
        $registro_usuario = $usuario->cargarUsuarios($user, $pass);
        return $registro_usuario;
    }

    function c_cargarUsuariosByUserId($idUser){
        $usuario = new ConsultasUsuarios();
        $registro_usuario = $usuario->cargarUsuariosByUserId($idUser);
        return $registro_usuario;
    }
}
?>