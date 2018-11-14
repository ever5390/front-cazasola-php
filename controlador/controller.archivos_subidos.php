<?php
// // $nameFile = $_POST['txtFile'];

class Archivos{
    
    function getArchivos($id_user, $id_curso){
        $consultas = new ConsultasArchivos();
        $registro_archivos = $consultas->cargarArchivos($id_user , $id_curso);
        return $registro_archivos;
    }

}

?>