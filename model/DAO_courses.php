<?php
    class ConsultasCursos{
        //para mostrar la lista de cursos habikitados mas horario y llenar el combo
        public function cargarCursosByusuario($idUser){
            $rows = null;
            $modelo = new Conexion();
            $conexion = $modelo->get_conexion();
            $sql="select * from detalle_curso_prof where id_user = :idUser";
            $statement = $conexion->prepare($sql);
            $statement->bindParam(":idUser", $idUser);
            $statement->execute();
            while($result = $statement->fetch()){
                $rows[] = $result;
            }
            return $rows;
        }

        public function cursoById($idCurso){
            $rows = null;
            $modelo = new Conexion();
            $conexion = $modelo->get_conexion();
            $sql="select * from curso where id_curso = :idCurso";
            $statement = $conexion->prepare($sql);
            $statement->bindParam(":idCurso", $idCurso);
            $statement->execute();
            while($result = $statement->fetch()){
                $rows[] = $result;
            }
            return $rows;
        }

        public function getDetalleByDetalleId($idDcp){
            $rows = null;
            $modelo = new Conexion();
            $conexion = $modelo->get_conexion();
            $sql="select * from detalle_curso_prof where id_detallecp = :idDcp";
            $statement = $conexion->prepare($sql);
            $statement->bindParam(":idDcp", $idDcp);
            $statement->execute();
            while($result = $statement->fetch()){
                $rows[] = $result;
            }
            return $rows;
        }

        public function horarioByIdCurso($idDetalle){
            $rows = null;
            $modelo = new Conexion();
            $conexion = $modelo->get_conexion();
            $sql="select * from horario where id_detallecp = :idDetalle";
            $statement = $conexion->prepare($sql);
            $statement->bindParam(":idDetalle", $idDetalle);
            $statement->execute();
            while($result = $statement->fetch()){
                $rows[] = $result;
            }
            return $rows;
        }

        public function getDetalleViewByUser($idUser){
            $rows = null;
            $modelo = new Conexion();
            $conexion = $modelo->get_conexion();
            $sql="select * from view_curso_detalle where id_user = :idUser";
            $statement = $conexion->prepare($sql);
            $statement->bindParam(":idUser", $idUser);
            $statement->execute();
            while($result = $statement->fetch()){
                $rows[] = $result;
            }
            return $rows;
        }

        
        public function getDetalleViewBDetalleId($idDetalle){
            $rows = null;
            $modelo = new Conexion();
            $conexion = $modelo->get_conexion();
            $sql="select * from view_curso_detalle where id_detallecp = :idDetalle";
            $statement = $conexion->prepare($sql);
            $statement->bindParam(":idDetalle", $idDetalle);
            $statement->execute();
            while($result = $statement->fetch()){
                $rows[] = $result;
            }
            return $rows;
        }

                //Activa o descativa el curso para GESTIONAR EN PLATAFORMA.
        public function updateCurso($idDetalle, $valor_activate){
            $modelo = new Conexion();
            $conexion = $modelo->get_conexion();
            $sql="update detalle_curso_prof set habilitado = :valor_activate where id_detallecp = :idDetalle";
            $statement = $conexion->prepare($sql);
            $statement->bindParam(":idDetalle", $idDetalle);
            $statement->bindParam(":valor_activate", $valor_activate);
            if(!$statement){
                return false;
            }else{
                $statement->execute();
            }
            return true;
        }


        /* Matricula solo Alumno */
        public function getMatriculaAlumno($idUser_alumno){
            $rows = null;
            $modelo = new Conexion();
            $conexion = $modelo->get_conexion();
            $sql="select * from matricula_alumno where id_usuario = :idUser_alumno";
            $statement = $conexion->prepare($sql);
            $statement->bindParam(":idUser_alumno", $idUser_alumno);
            $statement->execute();
            while($result = $statement->fetch()){
                $rows[] = $result;
            }
            return $rows;
        }

        public function getViewMatriculaAlumno($idUser_alumno){
            $rows = null;
            $modelo = new Conexion();
            $conexion = $modelo->get_conexion();
            $sql="select * from view_detalle_matricula where id_usuario = :idUser_alumno";
            $statement = $conexion->prepare($sql);
            $statement->bindParam(":idUser_alumno", $idUser_alumno);
            $statement->execute();
            while($result = $statement->fetch()){
                $rows[] = $result;
            }
            return $rows;
        }
        
    }

?>
