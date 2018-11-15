<?php
// // $nameFile = $_POST['txtFile'];

class Archivos{
    
    function getArchivos($id_user, $id_curso){
        $consultas = new ConsultasArchivos();
        $registro_archivos = $consultas->cargarArchivos($id_user , $id_curso);
        return $registro_archivos;
    }

    function c_insertarArchivo($titulo, $descripcion, $tipo_archivo, $id_curso, $id_user){
        $consultas = new ConsultasArchivos();
        $exito = $consultas->InsertarArchivo($titulo, $descripcion, $tipo_archivo, $id_curso, $id_user);
        return $exito;
    }

}

?>