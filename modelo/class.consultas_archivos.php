<?php
    require_once ('class.conexion.php');
    class ConsultasArchivos{

        public function cargarArchivos($id_user, $id_curso, $tipo_archivo){
            $rows = null;
            $con = new Conexion();
            $conexion = $con->get_conexion();
            $sql="select * from archivo where id_usser = :id_user and id_curso = :id_curso and tipo_archivo= :tipo_archivo";
            $statement = $conexion->prepare($sql);
            $statement->bindParam(":id_user", $id_user);
            $statement->bindParam(":id_curso", $id_curso);
            $statement->bindParam(":tipo_archivo", $tipo_archivo);
            $statement->execute();
            while($result = $statement->fetch()){
                $rows[] = $result;
            }
            // $con->close_conexion();
            return $rows;
        }

        public function InsertarArchivo($titulo, $descripcion, $tipo_archivo, $id_curso, $id_user){
            $modelo2 = new Conexion();
            $conexion = $modelo2->get_conexion();
            $sql="insert into archivo values ( null, :titulo, :descripcion, :tipo_archivo, :id_curso, :id_user )";
            $statement = $conexion->prepare($sql);
            $statement->bindParam(":titulo", $titulo);
            $statement->bindParam(":descripcion", $descripcion);
            $statement->bindParam(":tipo_archivo", $tipo_archivo);
            $statement->bindParam(":id_curso", $id_curso);
            $statement->bindParam(":id_user", $id_user);
            if(!$statement){
                return false;
            }else{
                $statement->execute();
            }
            return true;
        }

        public function deleteArchivo($id_archivo){
            $modelo2 = new Conexion();
            $conexion = $modelo2->get_conexion();
            $sql="delete from archivo where id = :id_archivo";
            $statement = $conexion->prepare($sql);
            $statement->bindParam(":id_archivo", $id_archivo);
            if(!$statement){
                return false;
            }else{
                $statement->execute();
            }
            return true;
        }
    }

?>