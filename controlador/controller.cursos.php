<?php

class Cursos{
    
    function getCursos($idUser){
        $consultas = new ConsultasCursos();
        $registro_cursos = $consultas->cargarCursosByusuario($idUser);
        return $registro_cursos;
    }

    function getCursosById($idCurso){
        $consultas = new ConsultasCursos();
        $registro_cursos = $consultas->cargarCursosByIdCurso($idCurso);
        return $registro_cursos;
    }
}

?>