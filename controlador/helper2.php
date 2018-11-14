<?php
    require_once '../modelo/class.conexion.php';
    require_once '../modelo/class.consultas_cursos.php';
    require_once 'controller.cursos.php';
    if(isset($_GET['idcurso'])){
        $id_curso = $_GET['idcurso']; 
        echo $id_curso;
    }
    $cursoById = new Cursos();
    $result = $cursoById->c_updateCurso($id_curso, 1);
    header('Location: ../registro-curso.php');    
?>