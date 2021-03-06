<?php
    require_once ('DAO_connection.php');
    class ConsultasArchivos{

        public function getFileByIdFile($idFile){
            $rows = null;
            $con = new Conexion();
            $conexion = $con->get_conexion();
            $sql="select * from archivo where id = :idFile";
            $statement = $conexion->prepare($sql);
            $statement->bindParam(":idFile", $idFile);
            $statement->execute();
            while($result = $statement->fetch()){
                $rows[] = $result;
            }
            // $con->close_conexion();
            return $rows;
        }


        public function numeroArchivosPorIdDetalle($id_detalle){
            $rows = null;
            $con = new Conexion();
            $conexion = $con->get_conexion();
            $sql="select count(*) as cantidad from archivo where id_detallecp = :id_detalle";
            $statement = $conexion->prepare($sql);
            $statement->bindParam(":id_detalle", $id_detalle);
            $statement->execute();
            while($result = $statement->fetch()){
                $rows[] = $result;
            }
            
            // $con->close_conexion();
            return $rows;
        }

        public function getFilesByIdDetalle($id_detalle){
            $rows = null;
            $con = new Conexion();
            $conexion = $con->get_conexion();
            $sql="select * from archivo where id_detallecp = :id_detalle order by fecha_subida desc";
            $statement = $conexion->prepare($sql);
            $statement->bindParam(":id_detalle", $id_detalle);
            $statement->execute();
            while($result = $statement->fetch()){
                $rows[] = $result;
            }
            // $con->close_conexion();
            return $rows;
        }

        public function cargarArchivosByParamas($id_detalle, $tipo_archivo){
            $rows = null;
            $con = new Conexion();
            $conexion = $con->get_conexion();
            $sql="select * from archivo where id_detallecp = :id_detalle and tipo_archivo= :tipo_archivo order by fecha_subida desc";
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

        public function insertarArchivoDescarga($id_archivo, $id_usuario, $id_detallecp, $fecha_descarga){
            $con = new Conexion();
            $conexion = $con->get_conexion();
            $sql="insert into descargas_archivos_alumnos values (null, :id_archivo, :id_usuario, :id_detallecp, :fecha_descarga)";
            $statement = $conexion->prepare($sql);
            $statement->bindParam(":id_archivo", $id_archivo);
            $statement->bindParam(":id_usuario", $id_usuario);
            $statement->bindParam(":id_detallecp", $id_detallecp);
            $statement->bindParam(":fecha_descarga", $fecha_descarga);
            if(!$statement){
                return false;
            }else{
                $statement->execute();
            }
            return true;
        }

        public function BuscarArchivoPorIdFileIdAlumno($id_archivo, $id_usuario, $id_detallecp){
            $rows = null;
            $con = new Conexion();
            $conexion = $con->get_conexion();
            $sql="select * from descargas_archivos_alumnos where id_archivo = :id_archivo and id_usuario= :id_usuario and id_detallecp= :id_detallecp";
            $statement = $conexion->prepare($sql);
            $statement->bindParam(":id_archivo", $id_archivo);
            $statement->bindParam(":id_usuario", $id_usuario);
            $statement->bindParam(":id_detallecp", $id_detallecp);
            $statement->execute();
            while($result = $statement->fetch()){
                $rows[] = $result;
            }
            // $con->close_conexion();
            return $rows;
        }

        public function getDescargasByIdArchivo($id_archivo){
            $rows = null;
            $con = new Conexion();
            $conexion = $con->get_conexion();
            $sql="select * from descargas_archivos_alumnos where id_archivo = :id_archivo";
            $statement = $conexion->prepare($sql);
            $statement->bindParam(":id_archivo", $id_archivo);
            $statement->execute();
            while($result = $statement->fetch()){
                $rows[] = $result;
            }
            // $con->close_conexion();
            return $rows;
        }

        public function getDescargasByIdArchivoUserAlumno($id_archivo, $id_user){
            $rows = null;
            $con = new Conexion();
            $conexion = $con->get_conexion();
            $sql="select * from descargas_archivos_alumnos where id_archivo = :id_archivo and id_usuario = :id_user";
            $statement = $conexion->prepare($sql);
            $statement->bindParam(":id_archivo", $id_archivo);
            $statement->bindParam(":id_user", $id_user);
            $statement->execute();
            while($result = $statement->fetch()){
                $rows[] = $result;
            }
            // $con->close_conexion();
            return $rows;
        }

        public function deleteArchivoDescargaById($id_archivo){
            $con = new Conexion();
            $conexion = $con->get_conexion();
            $sql="delete from descargas_archivos_alumnos where id_archivo = :id_archivo";
            $statement = $conexion->prepare($sql);
            $statement->bindParam(":id_archivo", $id_archivo);
            if(!$statement){
                return false;
            }else{
                $statement->execute();
            }
            return true;
        }

        /* Resta archivos y obtener los que faltan */
        public function conteoArchivosDescarga($idDetalle, $id_userAlumno){
            $numRows = null;
            $con = new Conexion();
            $conexion = $con->get_conexion();
            $sql="select count(*) as cantidad from descargas_archivos_alumnos where id_detallecp = :idDetallecp and id_usuario = :id_userAlumno";
            $statement = $conexion->prepare($sql);
            $statement->bindParam(":idDetallecp", $idDetalle);
            $statement->bindParam(":id_userAlumno", $id_userAlumno);
            $statement->execute();
            $result = $statement->fetch();
            $numRows = $result;
            // while($result = $statement->fetch()){
            //     $rows[] = $result;
            // }
            return $numRows;
        }

        /*   */
        public function conteoArchivos($idDetalle){
            $numRows = null;
            $con = new Conexion();
            $conexion = $con->get_conexion();
            $sql="select count(*) as cantidad from archivo where id_detallecp = :idDetalle";
            $statement = $conexion->prepare($sql);
            $statement->bindParam(":idDetalle", $idDetalle);
            $statement->execute();
            $result = $statement->fetch();
            $numRows = $result;
            // while($result = $statement->fetch()){
            //     $rows[] = $result;
            // }
            return $numRows;
        }
    /** Obtiene el nunero de alumnos que descargaron el archivo poara el profesor */

        public function conteoDescargaByIdArchivo($idArchivo){
            $rows = null;
            $con = new Conexion();
            $conexion = $con->get_conexion();
            $sql="select count(*) as cantidad from descargas_archivos_alumnos where id_archivo = :idArchivo";
            $statement = $conexion->prepare($sql);
            $statement->bindParam(":idArchivo", $idArchivo);
            $statement->execute();
            while($result = $statement->fetch()){
                $rows[] = $result;
            }
            return $rows;
        }

        public function filtrarArchivosByNombreDescripcion($idDetalle, $filtro){
            $con = new Conexion();
            $rows = null;
            $conexion = $con->get_conexion();
            $sql = "select * from archivo where id_detallecp = :idDetalle and (titulo like '%".$filtro."%' or descripcion like '%".$filtro."%')";
            $statement = $conexion->prepare($sql);
            $statement->bindParam(":idDetalle", $idDetalle);
            $statement->execute();
            while($result = $statement->fetch()){
                $rows[] = $result;
            }
            // $con->close_conexion();
            return $rows;
        }
    }

    // select * from archivo where (name_archivo like "%or%" or descripcion like "%or%");

?>