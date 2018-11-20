<?php
    require_once '../model/DAO_connection.php';
    require_once '../model/DAO_files.php';
    require_once '../controller/controller_files.php';

    session_start();
    $id_user = $_SESSION["usuario_registrado"]['id_usuario'];
    $nivel_usu = $_SESSION["usuario_registrado"]['nivel'];
    $id_archivo = null;

    $archivo = new Archivos();
    $titulo = null;
    $nameFile = null;
    $fecha_entrega = null;
    if(isset($_GET['idFile'])) $id_archivo = $_GET['idFile'];
    if(isset($_GET['orden']))  $orden = $_GET['orden'];
    if(isset($_POST['txtDescripcion'])) $descripcion = $_POST['txtDescripcion'];
    if(isset($_POST['txtFecha'])) $fecha_entrega = $_POST['txtFecha'];
    if(isset($_POST['txtTitulo'])) $titulo = $_POST['txtTitulo'];
    if(isset($_POST['radio'])) $tipo_archivo = $_POST['radio'];
    if(isset($_POST['nameFile'])) $nameFile = $_POST['nameFile'];
    if(isset($_GET['idDetalleProf'])) $id_detalle = $_GET['idDetalleProf'];
    if($titulo == ''){
        $titulo = $nameFile;
    }
    $mensaje = null; //mensaje de respuesta [RESPONSE]

    
    // echo var_dump($titulo);
    // echo var_dump($tipo_archivo);
    // echo var_dump($nameFile);
    // echo var_dump($fecha_entrega);
    // echo var_dump($fecha_subida);
    // echo var_dump($descripcion);
    // echo var_dump($id_detalle);
    // echo var_dump($orden);
    switch($orden){
        case 1:
            //Subida e Inserción en tabla 'Archivo'.
            // $dir_subida = 'c:/wamp64/www/front-cazasola-php/uploads/files';
            $dir_subida = '../uploads/files/';
            $fecha_subida = date("Y-m-d H:i:s");
            $fichero_subido = $dir_subida.basename($_FILES['fichero_usuario']['name']);    
            if (move_uploaded_file($_FILES['fichero_usuario']['tmp_name'], $fichero_subido)){
                $archivo->c_insertarArchivo($titulo, $nameFile, $descripcion, $tipo_archivo, $id_detalle, $fecha_subida, $fecha_entrega);
                if($archivo){
                    $mensaje = "Archivo insertado con exito";
                }
            }
            break;
        case 2:
            //Eliminación de archivos.
            $archivo->c_deleteArchivo($id_archivo);
            if($archivo) $mensaje = "Archivo eliminado con exito";
            break;
        case 3:
            //Descarga y almacenamiento en tabla 'Descargas', para próximo conteo y muestra.
            if($nivel_usu == 2){
                $fecha_descarga = date("Y-m-d H:i:s");
                $existe = $archivo->c_BuscarArchivoPorIdFileIdAlumno($id_archivo, $id_user, $id_detalle);
                if(!$existe){
                    $archivo->c_insertarArchivoDescarga($id_archivo, $id_user, $id_detalle, $fecha_descarga);
                }
            }
            break;
        case 4:
            break;
        default;
            echo "default";  
            break;
    }

    header ("Location: ../view/plataforma.php?idDetalleProf=".$id_detalle."&mensaje=".$mensaje);

?>