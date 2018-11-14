<?php
    class ConsultasCursos{

        public function cargarCursosByusuario($idUser){
            $rows = null;
            $modelo2 = new Conexion();
            $conexion = $modelo2->get_conexion();
            $sql="select * from view_curso_detalle where id_user = :idUser";
            $statement = $conexion->prepare($sql);
            $statement->bindParam(":idUser", $idUser);
            $statement->execute();
            while($result = $statement->fetch()){
                $rows[] = $result;
            }
            // $modelo2->close_conexion();
            return $rows;
        }

        public function cargarCursosByIdCurso($idCurso){
            $rows = null;
            $modelo2 = new Conexion();
            $conexion = $modelo2->get_conexion();
            $sql="select * from view_horario_curso where id_curso = :idCurso";
            $statement = $conexion->prepare($sql);
            $statement->bindParam(":idCurso", $idCurso);
            $statement->execute();
            while($result = $statement->fetch()){
                $rows[] = $result;
            }
            // $modelo2->close_conexion();
            return $rows;
        }
    }

?>