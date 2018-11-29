<?php
    require_once '../controller/controller_files.php';
    require_once '../controller/controller_users.php';
    require_once '../controller/controller_courses.php';

    // session_start();
    // $nivel_usu = $_SESSION["usuario_registrado"]['nivel'];
    // $id_usu = $_SESSION["usuario_registrado"]['id_usuario'];
    $archivo = new Archivos();
    $consultas = new Usuarios();
    $cursos = new Cursos();
    $lista_archivos = array();
    $archivos = array();
    $curso = null;
    $nombre = null;

    if(isset($_GET['nombre'])){
        $nombre = $_GET['nombre'];
    }

    if(isset($_GET['id_detalle'])){
        $id_detalle = $_GET['id_detalle'];
        $totalArchivos = $archivo->c_numeroArchivosPorIdDetalle($id_detalle);

        if($totalArchivos[0]['cantidad'] != 1){
            $texto_archivo_total = "archivos";
        }else{
            $texto_archivo_total = "archivo";
        }

        $lista_archivos = $cursos->getDetalleViewBDetalleId($id_detalle);
        $archivos = $archivo->c_getFilesByIdDetalle($id_detalle);
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

        .cabecera{
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
        
        .datos_docente{
            margin: 0 0 4px 0;
            margin-left: 20px;
        }

    </style>
</head>
<body>
<div class="cabecera">
    <h3>Universidad Nacional del Callao</h3>
    <h4 id="subtitulo">Facultad de Ingenieria Industrial y de Sistemas</h4>
    <p id="subtitulo2"><strong>Escuela Profesional de Ingenierìa de Sistenas</strong></p>
</div>
<p class='datos_docente'><strong>Docente:</strong>  <?php echo $nombre ?></p>
<p class='datos_docente'><strong>Curso:</strong>  <?php echo "CUR_".$lista_archivos[0]['id_curso']." ". $lista_archivos[0]['nombre_curso']."" ?></p>
<p class='datos_docente'><strong>Total Archivos:</strong>  <?php echo $totalArchivos[0]['cantidad']." ".$texto_archivo_total.""  ?></p>

<?php
    if($lista_archivos){
        ?>
            <div class='box-lista-alumnos'>
        <?php 

        if($archivos){
            foreach($archivos as $archivo_reg){
                    $totaldescargasByArchivo = $archivo->c_conteoDescargaByIdArchivo($archivo_reg['id']);
                    
                    if($totaldescargasByArchivo[0]['cantidad'] != 1){
                        $texto_descarga_total = "descargas";
                    }else{
                        $texto_descarga_total = "descarga";
                    }
        
        echo    "<span> * ".$archivo_reg['titulo']." 
                        <label> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; "
                            .$totaldescargasByArchivo[0]['cantidad']." ".$texto_descarga_total."
                        </label>
                </span>";

        echo    "<table>
                        <tr>
                            <td class='head-small'>Nro</td>
                            <td class='head-small'>Código</td>
                            <td class='head'>Nombres y Apellidos</td>
                            <td class='head'>Correo</td>
                            <td class='head'>Fecha Descarga</td>
                        </tr>";
                $indice=1;
                $lista_alumnos = $archivo->c_getDescargasByIdArchivo($archivo_reg['id']);
                if($lista_alumnos){
                    foreach($lista_alumnos as $alumno){
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
                }else{
                    echo "<tr>";
                    echo "   <td rowspan ='5'> Ningún registro </td>";
                    echo "</tr>";
                }
        echo    "</table>";
            }   
        }
        echo "</div>";
    }
?>
</body>
</html>