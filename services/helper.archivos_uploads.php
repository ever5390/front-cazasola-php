<?php
    require_once '../controller/controller_files.php';

    session_start();
    $id_user = $_SESSION["usuario_registrado"]['id_usuario'];
    $nivel_usu = $_SESSION["usuario_registrado"]['nivel'];
    $id_archivo = null;
    $extensiones_validas= array("doc", "docx", "xls", "xlsx","png", "jpg", "jpeg", "pptx", "ppt", "pdf");
    $permitido = null;
    $archivo = new Archivos();
    $titulo = null;
    $nameFile = null;
    $fecha_entrega = null;
    if(isset($_GET['nombreArchivo'])) $nombre_archivo = $_GET['nombreArchivo'];
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

    switch($orden){
        case 1:
            //Subida e Inserción en tabla 'Archivo'.
            // $dir_subida = 'c:/wamp64/www/front-cazasola-php/uploads/files';
            $dir_subida = '../uploads/files/';
            $fecha_subida = date("Y-m-d H:i:s");
            $fichero_subido = $dir_subida.basename($_FILES['fichero_usuario']['name']);

            /* Validación de extensión a almacenar */
            $partes_ruta = pathinfo($fichero_subido);
            $extension = $partes_ruta['extension'];
            foreach($extensiones_validas as $extens){
                if($extension == $extens){
                    $permitido = 1;
                }
            }

            if($permitido != null){
                if (move_uploaded_file($_FILES['fichero_usuario']['tmp_name'], $fichero_subido)){
                    $archivo->c_insertarArchivo($titulo, $nameFile, $descripcion, $tipo_archivo, $id_detalle, $fecha_subida, $fecha_entrega);
                    if($archivo){
                        $mensaje = "Información almacenada con con exito";
                    }else{
                        $mensaje = "Se encontró un error al intentar almacenar los datos";
                    }
                }else{
                    $mensaje = "Se encontró un error al intentar subir el archivo al servidor";
                }
            }else{
                $mensaje = "Se encontró que el archivo no tiene la extensión permitida, solo .pdf, .ppt, .ppts, .doc, .docs, xls, xlsx por favor";
            }
            
            break;
        case 2:
            //Eliminación de archivos.
            $archivo->c_deleteArchivo($id_archivo);
            if($archivo) {
                
                $archivoDescarga = $archivo->c_deleteArchivoDescargaById($id_archivo);
                if($archivoDescarga == 0){
                    $mensaje= "eliminado el archivo de tabla archivos pero El archivo no encontrado en descar0as";
                }else{
                // if($archivoDescarga != 0){
                    $mensaje = "Infomación eliminada con exito";
                }
            }else {
                $mensaje = "Se encontró un error al intentar eliminar los datos";
            }
            break;
        case 3:
            //Descarga y almacenamiento en tabla 'Descargas', para próximo conteo y muestra.
            $path = "../uploads/files";
            $enlace = $path."/".$nombre_archivo;
            header ("Content-Disposition: attachment; filename=".$nombre_archivo."");
            header ("Content-Type: application/octet-stream");
            header ("Content-Length: ".filesize($enlace));
            readfile($enlace);
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

    header ("Location: ../view/plataforma.php?ruta=gestionArchivos&idDetalleProf=".$id_detalle."&mensaje=".$mensaje);



    // echo var_dump($titulo);
    // echo var_dump($tipo_archivo);
    // echo var_dump($nameFile);
    // echo var_dump($fecha_entrega);
    // echo var_dump($fecha_subida);
    // echo var_dump($descripcion);
    // echo var_dump($id_detalle);
    // echo var_dump($orden);
?>