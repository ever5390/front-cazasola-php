<?php
    require_once '../model/DAO_files.php';

class Archivos{
    
    function c_getFileByIdFile($idFile){
        $consultas = new ConsultasArchivos();
        $registro_archivos = $consultas->getFileByIdFile($idFile);
        return $registro_archivos;
    }

    function getFileSyllabus($id_detalle, $tipo){
        $consultas = new ConsultasArchivos();
        $registro_archivos = $consultas->cargarArchivosByParamas($id_detalle, $tipo);
        return $registro_archivos;
    }

    function getFileActividad($id_detalle, $tipo){
        $consultas = new ConsultasArchivos();
        $registro_archivos = $consultas->cargarArchivosByParamas($id_detalle, $tipo);
        return $registro_archivos;
    }

    /* para view LISTA ALUMNOS :: devuelve array de archivos */
    function c_getFilesByIdDetalle($id_detalle){
        $consultas = new ConsultasArchivos();
        $registro_archivos = $consultas->getFilesByIdDetalle($id_detalle);
        return $registro_archivos;
    }

    function c_numeroArchivosPorIdDetalle($id_detalle){
        $consultas = new ConsultasArchivos();
        $registro_archivos = $consultas->numeroArchivosPorIdDetalle($id_detalle);
        return $registro_archivos;
    }

    function c_insertarArchivo($titulo, $nameFile, $descripcion, $tipo_archivo, $id_detalle, $fecha_subida, $fecha_entrega){
        $consultas = new ConsultasArchivos();
        $exito = $consultas->InsertarArchivo($titulo, $nameFile,  $descripcion, $tipo_archivo, $id_detalle, $fecha_subida, $fecha_entrega);
        return $exito;
    }

    function c_deleteArchivo($id_archivo){
        $consultas = new ConsultasArchivos();
        $exito = $consultas->deleteArchivo($id_archivo);
        return $exito;
    }

    /* DESCARGARS DE ARCHIVOS GESTIÒN  */

    function c_insertarArchivoDescarga($id_archivo, $id_usuario, $id_detalle, $fecha_descarga){
        $consultas = new ConsultasArchivos();
        $exito = $consultas->insertarArchivoDescarga($id_archivo, $id_usuario, $id_detalle, $fecha_descarga);
        return $exito;
    }

    function c_BuscarArchivoPorIdFileIdAlumno($id_archivo, $id_usuario, $id_detalle){
        $consultas = new ConsultasArchivos();
        $exito = $consultas->BuscarArchivoPorIdFileIdAlumno($id_archivo, $id_usuario, $id_detalle);
        return $exito;
    }

    function c_getDescargasByIdArchivo($id_archivo){
        $consultas = new ConsultasArchivos();
        $exito = $consultas->getDescargasByIdArchivo($id_archivo);
        return $exito;
    }

    function c_getDescargasByIdArchivoUserAlumno($id_archivo, $id_user){
        $consultas = new ConsultasArchivos();
        $exito = $consultas->getDescargasByIdArchivoUserAlumno($id_archivo, $id_user);
        return $exito;
    }

    function c_deleteArchivoDescargaById($id_archivo){
        $consultas = new ConsultasArchivos();
        $exito = $consultas->deleteArchivoDescargaById($id_archivo);
        if(!$exito){
            return 0;
        }
        return $exito;
    }

    public function c_conteoArchivosDescarga($idDetalle, $id_userAlumno){
        $consultas = new ConsultasArchivos();
        $cantidadCoincidencias = $consultas->conteoArchivosDescarga($idDetalle, $id_userAlumno);
        return $cantidadCoincidencias;
    }

    public function c_conteoArchivos($idDetalle){
        $consultas = new ConsultasArchivos();
        $cantidadCoincidencias = $consultas->conteoArchivos($idDetalle);
        return $cantidadCoincidencias;
    }
    /** Obtiene el nunero de alumnos que descargaron el archivo poara el profesor */
    function c_conteoDescarga($id_archivo){
        $consultas = new ConsultasArchivos();
        $cantidadCoincidencias = $consultas->conteoDescarga($id_archivo);
        return $cantidadCoincidencias;
    }

    // filtrarArchivosByNombreDescripcion
    function c_filtrarArchivosByNombreDescripcion($filtro){
        $consultas = new ConsultasArchivos();
        $exito = $consultas->filtrarArchivosByNombreDescripcion($filtro);
        return $exito;
    }

}

?>