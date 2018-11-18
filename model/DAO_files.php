<?php
    require_once ('DAO_connection.php');
    class ConsultasArchivos{

        public function cargarArchivosByParamas($id_detalle, $tipo_archivo){
            $rows = null;
            $con = new Conexion();
            $conexion = $con->get_conexion();
            $sql="select * from archivo where id_detallecp = :id_detalle and tipo_archivo= :tipo_archivo";
            $statement = $conexion->prepare($sql);
            $statement->bindParam(":id_detalle", $id_detalle);
            $statement->bindParam(":tipo_archivo", $tipo_archivo);
            $statement->execute();
            while($result = $statement->fetch()){
                $rows[] = $result;
            }
            // $con->close_conexion();
            return $rows;
        }

        public function InsertarArchivo($titulo, $descripcion, $tipo_archivo, $id_detalle){
            $con = new Conexion();
            $conexion = $con->get_conexion();
            $sql="insert into archivo values ( null, :titulo, :descripcion, :tipo_archivo, :id_detalle )";
            $statement = $conexion->prepare($sql);
            $statement->bindParam(":titulo", $titulo);
            $statement->bindParam(":descripcion", $descripcion);
            $statement->bindParam(":tipo_archivo", $tipo_archivo);
            $statement->bindParam(":id_detalle", $id_detalle);
            if(!$statement){
                return false;
            }else{
                $statement->execute();
            }
            return true;
        }

        public function deleteArchivo($id_archivo){
            $con = new Conexion();
            $conexion = $con->get_conexion();
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