<?php
    require_once 'modelo/class.conexion.php';
    require_once 'modelo/class.consultas_cursos.php';
class Cursos{
    
    function getCursos($idUser){
        $consultas = new ConsultasCursos();
        $registro_cursos = $consultas->cargarCursosByusuario($idUser);
        return $registro_cursos;
    }

    function c_getCursosById($idCurso){
        $consultas = new ConsultasCursos();
        $registro_cursos = $consultas->cursoById($idCurso);
        return $registro_cursos;
    }

    function c_verDetalleCursoProf($idUser, $activado){
        $consultas = new ConsultasCursos();
        $registro_cursos = $consultas->detalleCursoProfe($idUser, $activado);
        return $registro_cursos;
    }

    function c_verDetalleCursoByProfe($userId){
        $consultas = new ConsultasCursos();
        $registro_cursos = $consultas->detalleCursoByProfe($userId);
        return $registro_cursos;
    }

    function c_horarioByIdCurso($idCurso){
        $consultas = new ConsultasCursos();
        $registro_cursos = $consultas->horarioByIdCurso($idCurso);
        return $registro_cursos;
    }

    /*actualizar */ 
    function c_updateCurso($idCurso, $valor_activate){
        $consultas = new ConsultasCursos();
        $exito = $consultas->updateCurso($idCurso, $valor_activate);
        return $exito;
    }

}

?>