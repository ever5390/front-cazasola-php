<?php
    // require_once 'C:/wamp64/www/front-cazasola-php/modelo/class.conexion.php';
    // require_once 'C:/wamp64/www/front-cazasola-php/modelo/class.consultas_cursos.php'; 

    require_once '../model/DAO_connection.php';
    require_once '../model/DAO_courses.php'; 

Class Cursos{
    
    function getCursosByIdProf($idUser){
        $consultas = new ConsultasCursos();
        $registro_cursos = $consultas->cargarCursosByusuario($idUser);
        return $registro_cursos;
    }

    function c_getDetalleViewByUser($idUser){
        $consultas = new ConsultasCursos();
        $registro_cursos = $consultas->getDetalleViewByUser($idUser);
        return $registro_cursos;
    }

    function getDetalleViewBDetalleId($idDetalle){
        $consultas = new ConsultasCursos();
        $registro_cursos = $consultas->getDetalleViewBDetalleId($idDetalle);
        return $registro_cursos;
    }

    function c_getCursosById($idCurso){
        $consultas = new ConsultasCursos();
        $registro_cursos = $consultas->cursoById($idCurso);
        return $registro_cursos;
    }
        //busca en la tabla detalle por detalle mismo.
    function c_getDetalleByDetalleId($detalleId){
        $consultas = new ConsultasCursos();
        $registro_cursos = $consultas->getDetalleByDetalleId($detalleId);
        return $registro_cursos;
    }

    function c_horarioByIdCurso($idDetalle){
        $consultas = new ConsultasCursos();
        $registro_cursos = $consultas->horarioByIdCurso($idDetalle);
        return $registro_cursos;
    }

    function c_verDetalleCursoByIdProfe($userId){
        $consultas = new ConsultasCursos();
        $registro_cursos = $consultas->cargarCursosByusuario($userId);
        return $registro_cursos;
    }



    /*actualizar */ 
    function c_updateCurso($idDetalle, $valor_activate){
        $consultas = new ConsultasCursos();
        $exito = $consultas->updateCurso($idDetalle, $valor_activate);
        return $exito;
    }

}

?>