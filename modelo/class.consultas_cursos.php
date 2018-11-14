<?php
    class ConsultasCursos{

        public function cargarCursos($user, $pass){
            $rows = null;
            $modelo = new Conexion();
            $conexion = $modelo->get_conexion();
            $sql="select * from usuario where usuario = :user and contrasena = :pass";
            $statement = $conexion->prepare($sql);
            $statement->bindParam(":user", $user);
            $statement->bindParam(":pass", $pass);
            $statement->execute();
            while($result = $statement->fetch()){
                $rows[] = $result;
            }
            // $modelo->close_conexion();
            return $rows;
        }

        public function cargarCursosByusuario($idUser){
            $rows = null;
            $modelo2 = new Conexion();
            $conexion = $modelo2->get_conexion();
            $sql="select * from view_curso_detalle_usuario where id_user = :idUser";
            $statement = $conexion->prepare($sql);
            $statement->bindParam(":idUser", $idUser);
            $statement->execute();
            while($result = $statement->fetch()){
                $rows[] = $result;
            }
            // $modelo2->close_conexion();
            return $rows;
        }
    }

?>