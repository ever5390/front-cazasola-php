<?php
   session_start();
//    require 'modelo/class.consultas_archivos.php';
    require_once '../modelo/class.conexion.php';
    require_once '../modelo/class.consultas_archivos.php';
    require_once 'controller.archivos_subidos.php';
   $archivo = new Archivos();

    $titulo =$_POST['nameArchivoOculto'];

    $dir_subida = 'c:/wamp/www/front-cazasola-php/img/';
    $fichero_subido = $dir_subida.basename($_FILES['fichero_usuario']['name']);
    echo $_FILES['fichero_usuario']['name'];
    // $descripcion = $_POT['txtDescripcion'];

    // $id_curso = $_GET['id_curso'];
    // // if (isset($_POST['submit'])) {
    // if(isset($_POST['radio']))
    // {
    //     $tipo_archivo = $_POST['radio'];
    // }

    // if(isset($_GET['orden'])){
    //     $orden = $_GET['orden'];
    //     // echo "orden".$orden;
    // }
    // if(isset($_GET['id_archivo'])){
    //     $id_archivo = $_GET['id_archivo'];
    //     // echo "<br>archivo".$id_archivo;
    // }
    // $mensaje = null; //mensaje de respuesta [RESPONSE]
    // switch($orden){
    //     case 1:
    //         $titulo =$titulo;
    //         $descripcion = "descripcion del archivo subido";
    //         $tipo_archivo = $tipo_archivo;
    //         $id_user = $_SESSION["usuario_registrado"]['codigo'];
    //         if (move_uploaded_file($_FILES['fichero_usuario']['tmp_name'], $fichero_subido)) {
    //             $archivo->c_insertarArchivo( $titulo, $descripcion, $tipo_archivo, $id_curso, $id_user);
    //         }
    //         if($archivo){
    //             $mensaje = "Archivo insertado con exito";
    //         }
    //         break;
    //     case 2:
    //         $archivo->c_deleteArchivo($id_archivo);
    //         if($archivo){
    //             $mensaje = "Archivo eliminado con exito";
    //         }
    //         break;
    //     case 3:
    //         echo "actualizar";
    //         break;
    //     default;
    //         echo "default";  
    //         break;
    // }

    // header ("Location: ../plataforma.php?id_curso=".$id_curso."&mensaje=".$mensaje);

?>