<?php
// // $nameFile = $_POST['txtFile'];

class Archivos{
    
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

    function c_insertarArchivo($titulo, $descripcion, $tipo_archivo, $id_detalle){
        $consultas = new ConsultasArchivos();
        $exito = $consultas->InsertarArchivo($titulo, $descripcion, $tipo_archivo, $id_detalle);
        return $exito;
    }

    function c_deleteArchivo($id_archivo){
        $consultas = new ConsultasArchivos();
        $exito = $consultas->deleteArchivo($id_archivo);
        return $exito;
    }

}

?>