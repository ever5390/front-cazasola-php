<?php
   session_start();
//    require 'modelo/class.consultas_archivos.php';
   require 'controller.archivos_subidos.php';
   $archivo = new Archivos();

    // $titulo =$_POST['txtTitulo'];
    // $descripcion = $_POT['txtDescripcion'];
    // $tipo_archivo = $_POST['txtArchivo'];
    // $id_curso = $_POST['txtCurso'];
    // $id_user = $_POST['txtUser'];

    $titulo ="titulo archivo subido";
    $descripcion = "descripcion del archivo subido";
    $tipo_archivo = 2;
    $id_curso = $_GET['id_curso'];
    $id_user = $_SESSION["usuario_registrado"]['codigo'];

    $archivo->c_insertarArchivo( $titulo, $descripcion, $tipo_archivo, $id_curso, $id_user);

    if($archivo){
        echo "archivo subido exitosamente";
    }

?>