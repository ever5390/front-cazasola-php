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

        public function InsertarArchivo($titulo, $nameFile, $descripcion, $tipo_archivo, $id_detalle, $fecha_subida, $fecha_entrega){
            $con = new Conexion();
            $conexion = $con->get_conexion();
            $sql="insert into archivo values ( null, :titulo, :name_archivo, :descripcion, :tipo_archivo, :id_detallecp, :fecha_subida, :fecha_entrega )";
            $statement = $conexion->prepare($sql);
            $statement->bindParam(":titulo", $titulo);
            $statement->bindParam(":name_archivo", $nameFile);
            $statement->bindParam(":descripcion", $descripcion);
            $statement->bindParam(":tipo_archivo", $tipo_archivo);
            $statement->bindParam(":id_detallecp", $id_detalle);
            $statement->bindParam(":fecha_subida", $fecha_subida);
            $statement->bindParam(":fecha_entrega", $fecha_entrega);
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

        /* DESCARGA DE ARCHIVOS GESTIÒN */

        public function insertarArchivoDescarga($id_archivo, $id_usuario){
            $con = new Conexio();
            $conexion = $con->get_conexion();
            $sql="insert into descargas_archivos_alumnos values (null, :id_archivo, :id_usuario)";
            $statement = $conexion->prepare($sql);
            $statement->bindParam(":id_archivo", $id_archivo);
            $statement->bindParam(":id_usuario", $id_usuario);
            if(!$statement){
                return false;
            }else{
                $statement->execute();
            }
            return true;
        }

        public function conteoDescarga($id_archivo){
            $con = new Conexio();
            $conexion = $con->get_conexion();
            $sql="select count(*) as cantidad from descargas_archivos_alumnos where id_archivo = :id_archivo)";
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