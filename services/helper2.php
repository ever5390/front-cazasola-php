<?php

    require_once '../model/DAO_connection.php';
    require_once '../model/DAO_courses.php';
    require_once '../controller/controller_courses.php';

    if (isset($_GET['idcurso'])){
        $idDetalle = $_GET['idcurso']; 
    }

    if (isset($_GET['activado'])){
        $activado = $_GET['activado']; 
    }

    if($activado == 1){
        $activado = 0;
    } else {
        $activado = 1;
    }
    
    $cursoById = new Cursos();
    $result = $cursoById->c_updateCurso($idDetalle, $activado);
    header('Location: ../view/registro-curso.php');    
?>