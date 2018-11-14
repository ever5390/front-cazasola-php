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


        public function detalleCursoProfe($idUser, $activado){
            $rows = null;
            $modelo2 = new Conexion();
            $conexion = $modelo2->get_conexion();
            $sql="select * from view_curso_detalle where id_user = :idUser and activado = :activado";
            $statement = $conexion->prepare($sql);
            $statement->bindParam(":idUser", $idUser);
            $statement->bindParam(":activado", $activado);
            $statement->execute();
            while($result = $statement->fetch()){
                $rows[] = $result;
            }
            return $rows;
        }

        public function detalleCursoByProfe($idUser){
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
            return $rows;
        }

        public function cursoById($idCurso){
            $rows = null;
            $modelo2 = new Conexion();
            $conexion = $modelo2->get_conexion();
            $sql="select * from curso where id_curso = :idCurso";
            $statement = $conexion->prepare($sql);
            $statement->bindParam(":idCurso", $idCurso);
            $statement->execute();
            while($result = $statement->fetch()){
                $rows[] = $result;
            }
            return $rows;
        }

        public function horarioByIdCurso($idCurso){
            $rows = null;
            $modelo2 = new Conexion();
            $conexion = $modelo2->get_conexion();
            $sql="select * from horario where id_curso = :idCurso";
            $statement = $conexion->prepare($sql);
            $statement->bindParam(":idCurso", $idCurso);
            $statement->execute();
            while($result = $statement->fetch()){
                $rows[] = $result;
            }
            return $rows;
        }

        public function updateCurso($idCurso, $valor_activate){
            $modelo2 = new Conexion();
            $conexion = $modelo2->get_conexion();
            $sql="update curso set activado = :valor_activate where id_curso = :idCurso";
            $statement = $conexion->prepare($sql);
            $statement->bindParam(":idCurso", $idCurso);
            $statement->bindParam(":valor_activate", $valor_activate);
            if(!$statement){
                return false;
            }else{
                $statement->execute();
            }
            return true;
        }

        public function getHorarioByCurso($idCurso){
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
            return $rows;
        }
    }

?>