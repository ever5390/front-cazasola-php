<?php

class Cursos{
    
    function getCursos($idUser){
        $consultas = new ConsultasCursos();
        $registro_cursos = $consultas->cargarCursosByusuario($idUser);
        return $registro_cursos;
    }
}

?>