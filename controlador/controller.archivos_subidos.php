<?php
// // $nameFile = $_POST['txtFile'];

class Archivos{
    
    function getFileSyllabus($id_user, $id_curso, $tipo){
        $consultas = new ConsultasArchivos();
        $registro_archivos = $consultas->cargarArchivos($id_user , $id_curso, $tipo);
        return $registro_archivos;
    }

    function getFileActividad($id_user, $id_curso, $tipo){
        $consultas = new ConsultasArchivos();
        $registro_archivos = $consultas->cargarArchivos($id_user , $id_curso, $tipo);
        return $registro_archivos;
    }

    function c_insertarArchivo($titulo, $descripcion, $tipo_archivo, $id_curso, $id_user){
        $consultas = new ConsultasArchivos();
        $exito = $consultas->InsertarArchivo($titulo, $descripcion, $tipo_archivo, $id_curso, $id_user);
        return $exito;
    }

    function c_deleteArchivo($id_archivo){
        $consultas = new ConsultasArchivos();
        $exito = $consultas->deleteArchivo($id_archivo);
        return $exito;
    }

}

?>