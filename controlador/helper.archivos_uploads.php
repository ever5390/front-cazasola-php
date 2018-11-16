<?php
   session_start();
//    require 'modelo/class.consultas_archivos.php';
    require_once '../modelo/class.conexion.php';
    require_once '../modelo/class.consultas_archivos.php';
    require_once 'controller.archivos_subidos.php';
   $archivo = new Archivos();

    // $titulo =$_POST['txtTitulo'];
    // $descripcion = $_POT['txtDescripcion'];
    // $tipo_archivo = $_POST['txtArchivo'];

    //ELIMINAR E INSERTAR HACERLO PASANDO OTRO PARAMTRO DONDE CHAPES LA ORDEN Y SEGUN ESO ENVIAR A
    //METODO CORRSOPNDIENTE PARA USAR ESTE MISMO ARHICVO PARA EL CRUD.()
    $id_curso = $_GET['id_curso'];

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
            $titulo ="titulo archivo subido";
            $descripcion = "descripcion del archivo subido";
            $tipo_archivo = 2;
            $id_user = $_SESSION["usuario_registrado"]['codigo'];
            $archivo->c_insertarArchivo( $titulo, $descripcion, $tipo_archivo, $id_curso, $id_user);
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

    header ("Location: ../plataforma.php?id_curso=".$id_curso."&mensaje=".$mensaje);

?>