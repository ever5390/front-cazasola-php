<?php
// // $nameFile = $_POST['txtFile'];
class Archivos{
    
    function getArchivos($id_user){
        $consultas = new ConsultasArchivos();
        $registro_archivos = $consultas->cargarArchivos($id_user);
        return $registro_archivos;  
    }
}

?>