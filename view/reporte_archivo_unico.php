<?php
    require_once '../controller/controller_files.php';
    require_once '../controller/controller_users.php';
    require_once '../controller/controller_courses.php';

    $archivo = new Archivos();
    $consultas = new Usuarios();
    $cursos = new Cursos();
    $lista_archivos = array();
    $archivos = array();
    $curso = null;
    $existe_alumnos = null;
    $nombre = null;

    if(isset($_GET['id_detalle'])){
        $id_detalle = $_GET['id_detalle'];
        $totalArchivos = $archivo->c_numeroArchivosPorIdDetalle($id_detalle);
        $lista_archivos = $cursos->getDetalleViewBDetalleId($id_detalle);
        $archivos = $archivo->c_getFilesByIdDetalle($id_detalle);
    }
    if(isset($_GET['nombre'])){
        $nombre = $_GET['nombre'];
    }

    if(isset($_GET['file_id'])){
        $id_archivo = $_GET['file_id'];
        $filename = $archivo->c_getFileByIdFile($id_archivo);
        $alumnos = $archivo->c_getDescargasByIdArchivo($id_archivo);
        $totaldescargasByArchivo = $archivo->c_conteoDescargaByIdArchivo($id_archivo);

        if($totaldescargasByArchivo[0]['cantidad'] != 1){
            $texto_descarga_total = "descargas";
        }else{
            $texto_descarga_total = "descarga";
        }
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        /* PAGINA LISTA ALUMNOS*/
        body{
        }

        .box-lista-alumnos{
            margin-top: 10px;
            margin-left: 20px;
        }

        span{
            width: 100%;
            border-radius: 5px;
            margin-top: 20px;
            font-size: 14px;
            color: #423F3F;
            padding: 10px;
            font-weight:bold;
        }
        
        table{
            color: #423F3F;
            text-align: center;
            border: 1px solid #ccc;
            border-radius: 10px;
            margin-top: 30px;
        }
        
        table tr{
            background: #F5F5F5;
        }

        table .celda{
            background: #fff;
            padding: 2px 15px;
        }

        .titulo{
            text-align:center;
            color: #524E4E;
            border-top : 3px solid #C7C3C2;
            border-bottom : 3px solid #C7C3C2;
            padding: 10px;
            background: #F9F9F9;
            margin-bottom: 10px;
        }

        #subtitulo, h3{
            margin:0;
            padding:2px;
            font-family: Arial, Helvetica;
        }

        #subtitulo2{
            margin-top: 6px;
        }
        
        p{
            margin: 0 0 4px 0;
            margin-left: 20px;
        }

    </style>
</head>
<body>
<div class="titulo">
    <h3>Universidad Nacional del Callao</h3>
    <h4 id="subtitulo">Facultad de Ingenieria Industrial y de Sistemas</h4>
    <p id="subtitulo2"><strong>Escuela Profesional de Ingenierìa de Sistenas</strong></p>
</div>
<p><strong>Docente:</strong> <?php echo $nombre ?></p>
<p><strong>Curso:</strong>  <?php echo "CUR_".$lista_archivos[0]['id_curso']." ". $lista_archivos[0]['nombre_curso']."" ?></p>
<p><strong>Total Archivos: </strong> 1 archivo</p>

<?php
        echo "<div class='box-lista-alumnos'>";
                $filename = $archivo->c_getFileByIdFile($id_archivo);
        echo    "<span> * ".$filename[0]['titulo']."
                   <label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            ".$totaldescargasByArchivo[0]['cantidad']." ".$texto_descarga_total."
                   </label>
                </span>";

        echo    "<table>
                        <tr>
                            <td class='headstart'>Nro</td>
                            <td>Código</td>
                            <td>Nombres y Apellidos</td>
                            <td>Correo</td>
                            <td class='headfinal'>Fecha Descarga</td>
                        </tr>";
            
                        if($alumnos != null){
                            $indice=1;
                            foreach($alumnos as $alumno){
                                $registroAlumno = $consultas->c_cargarUsuariosByUserId($alumno['id_usuario']);
        echo    "       <tr>
                            <td class='celda'>".$indice."</td> 
                            <td class='celda'>COD_ALU_".$registroAlumno[0]['id_usuario']."</td>
                            <td class='celda'>".$registroAlumno[0]['nombres']."</td>
                            <td class='celda'>".$registroAlumno[0]['correo']."</td>
                            <td class='celda'>".$alumno['fecha_descarga']."</td>
                        </tr>";
                            $indice++;
                            }
                        }


        echo    "</table>";

        echo "</div>";
?>
</body>
</html>