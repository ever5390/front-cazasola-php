<?php
    require_once '../model/DAO_connection.php';
    require_once '../model/DAO_files.php';
    require_once '../controller/controller_files.php';

    $archivo = new Archivos();
    $dir_subida = 'c:/wamp64/www/front-cazasola-php/uploads/files';
    $fichero_subido = $dir_subida.basename($_FILES['fichero_usuario']['name']);
    $titulo = null;
    $nameFile = null;
    $fecha_entrega = null;
    $fecha_subida = date("Y-m-d H:i:s");
    if(isset($_POST['txtDescripcion'])) $descripcion = $_POST['txtDescripcion'];
    if(isset($_POST['txtFecha'])) $fecha_entrega = $_POST['txtFecha'];
    if(isset($_POST['txtTitulo'])) $titulo = $_POST['txtTitulo'];
    if(isset($_POST['radio'])) $tipo_archivo = $_POST['radio'];
    if(isset($_POST['nameFile'])) $nameFile = $_POST['nameFile'];
    if(isset($_GET['idDetalleProf'])) $id_detalle = $_GET['idDetalleProf'];
    if(isset($_GET['id_archivo'])) $id_archivo = $_GET['id_archivo'];
    if(isset($_GET['orden']))  $orden = $_GET['orden'];

    if($titulo === ''){
        $titulo = $nameFile;
    }
    $mensaje = null; //mensaje de respuesta [RESPONSE]

    switch($orden){
        case 1:
            if (move_uploaded_file($_FILES['fichero_usuario']['tmp_name'], $fichero_subido))
                $archivo->c_insertarArchivo( $titulo, $descripcion, $tipo_archivo, $id_detalle, $fecha_subida, $fecha_entrega);
            if($archivo)
                $mensaje = "Archivo insertado con exito";
            break;
        case 2:
            $archivo->c_deleteArchivo($id_archivo);
            if($archivo) $mensaje = "Archivo eliminado con exito";
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