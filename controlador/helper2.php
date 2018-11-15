<?php
    require_once '../modelo/class.conexion.php';
    require_once '../modelo/class.consultas_cursos.php';
    require_once 'controller.cursos.php';

    if (isset($_GET['idcurso'])){
        $id_curso = $_GET['idcurso']; 
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
    $result = $cursoById->c_updateCurso($id_curso, $activado);
    header('Location: ../registro-curso.php');    
?>