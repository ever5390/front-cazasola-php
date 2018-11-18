<?php
   session_start();
//    require 'modelo/class.consultas_archivos.php';
    require_once '../model/DAO_connection.php';
    require_once '../model/DAO_files.php';
    require_once '../controller/controller_files.php';
    
   $archivo = new Archivos();
   if(isset($_POST['nameArchivoOculto']))
   {
    $titulo =$_POST['nameArchivoOculto'];
   }

    $dir_subida = 'c:/wamp/www/front-cazasola-php/uploads/files';
    $fichero_subido = $dir_subida.basename($_FILES['fichero_usuario']['name']);
    echo $_FILES['fichero_usuario']['name'];
    // $descripcion = $_POT['txtDescripcion'];

    $id_detalle = $_GET['idDetalleProf'];
    // if (isset($_POST['submit'])) {
    if(isset($_POST['radio']))
    {
        $tipo_archivo = $_POST['radio'];
    }

    if(isset($_GET['orden'])){
        $orden = $_GET['orden'];
        // echo "orden".$orden;
    }
    if(isset($_GET['id_archivo'])){
        $id_archivo = $_GET['id_archivo'];
        // echo "<br>archivo".$id_archivo;
    }
    $mensaje = null; //mensaje de respuesta [RESPONSE]
    switch($orden){
        case 1:
            $titulo =$titulo;
            $descripcion = "descripcion del archivo subido";
            $tipo_archivo = $tipo_archivo;
            $id_user = $_SESSION["usuario_registrado"]['id_usuario'];
            if (move_uploaded_file($_FILES['fichero_usuario']['tmp_name'], $fichero_subido)) {
                $archivo->c_insertarArchivo( $titulo, $descripcion, $tipo_archivo, $id_detalle);
            }
            if($archivo){
                $mensaje = "Archivo insertado con exito";
            }
            break;
        case 2:
            $archivo->c_deleteArchivo($id_archivo);
            if($archivo){
                $mensaje = "Archivo eliminado con exito";
            }
            break;
        case 3:
            echo "actualizar";
            break;
        default;
            echo "default";  
            break;
    }

    header ("Location: ../view/plataforma.php?idDetalleProf=".$id_detalle."&mensaje=".$mensaje);

?>