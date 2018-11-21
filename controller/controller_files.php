<?php

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

    function c_conteoDescarga($id_archivo){
        $consultas = new ConsultasArchivos();
        $cantidadCoincidencias = $consultas->conteoDescarga($id_archivo);
        return $cantidadCoincidencias;
    }

    function c_getDescargasByIdArchivo($id_archivo){
        $consultas = new ConsultasArchivos();
        $exito = $consultas->getDescargasByIdArchivo($id_archivo);
        return $exito;
    }

}

?>