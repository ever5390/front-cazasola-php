<?php

    require "../controller/controller_files.php";
    session_start();
    $id_user = $_SESSION["usuario_registrado"]['id_usuario'];
    $nivel_usu = $_SESSION["usuario_registrado"]['nivel'];
    $idFile = null;
    if(isset($_GET['idFile'])) $idFile = $_GET['idFile'];
    $archivoDescarga = new Archivos();
    if($nivel_usu != 1){
        $respuesta = $archivoDescarga->c_insertarArchivoDescarga($idFile, $id_user);
        if($respuesta){
            "Hecho subiò";
        }
    }

    // header('Location: ../view/registro-curso.php'); 
?>