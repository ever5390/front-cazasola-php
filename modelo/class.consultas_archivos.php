<?php
    require_once ('class.conexion.php');
    class ConsultasArchivos{

        public function cargarArchivos($id_user){
            $rows = null;
            $con = new Conexion();
            $conexion = $con->get_conexion();
            $sql="select * from archivo where id_usuario = :id_user";
            $statement = $conexion->prepare($sql);
            $statement->bindParam(":id_user", $id_user);
            $statement->execute();
            while($result = $statement->fetch()){
                $rows[] = $result;
            }

            return $rows;
        }
    }

?>