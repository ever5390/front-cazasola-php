<?php
    require_once ('class.conexion.php');
    class ConsultasArchivos{

        public function cargarArchivos($id_user, $id_curso){
            $rows = null;
            $con = new Conexion();
            $conexion = $con->get_conexion();
            $sql="select * from archivo where id_usser = :id_user and id_curso = :id_curso";
            $statement = $conexion->prepare($sql);
            $statement->bindParam(":id_user", $id_user);
            $statement->bindParam(":id_curso", $id_curso);
            $statement->execute();
            while($result = $statement->fetch()){
                $rows[] = $result;
            }
            // $con->close_conexion();
            return $rows;
        }
    }

?>