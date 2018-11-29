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
        .box-lista-alumnos{
            width: 100%;
            /* box-sizing: border-box;
            border: 1px solid gray; */
            padding: 20px 15px;
            /* border-radius: 10px; */
        }
        
        .box-lista-alumnos a{
            text-decoration: none;
            color: #111;
        }

        span{
            width: 100%;
            border-radius: 5px;
            margin-bottom: 5px;
            font-size: 14px;
            color: #3F4959;
            padding: 10px;
            font-weight:bold;
        }
        
        table{
            text-align: center;
            border: 1px solid #ccc;
            border-radius: 10px;
            margin-top: 10px;
            margin-bottom: 25px;
        }

        table tr{
            border-bottom: 1px solid #ccc;
            background: #ccc;
        }

        table td{
            padding: 5px 15px;
        }

        table .celda{
            background: #fff;
        }

        table .headstart{
            border-radius: 8px 0 0 0;
        }

        table .headfinal{
            border-radius: 0 8px 0 0;
        }
        
        table .headcero{
            border-radius: 0 0 0 8px;
        }
        
        h4{
            text-align: center;
            margin-bottom: 40px;
        }

    </style>
</head>
<body>

<?php
    if($lista_archivos){
        echo "<div class='box-lista-alumnos'>";
        echo "  <h4>
                    <a href='#'>CUR_".$lista_archivos[0]['id_curso']." ". $lista_archivos[0]['nombre_curso']."</a>
                    <label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ".$totalArchivos[0]['cantidad']." ".$texto_archivo_total." </label>
                </h4>";

        if($archivos){
            foreach($archivos as $archivo_reg){
                $totaldescargasByArchivo = $archivo->c_conteoDescargaByIdArchivo($archivo_reg['id']);
                
                if($totaldescargasByArchivo[0]['cantidad'] != 1){
                    $texto_descarga_total = "descargas";
                }else{
                    $texto_descarga_total = "descarga";
                }
        
        echo    "<span class='titulo'> * ".$archivo_reg['titulo']." 
                        <label> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; "
                            .$totaldescargasByArchivo[0]['cantidad']." ".$texto_descarga_total."
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
                    echo "   <td rowspan ='5' class='headcero'> Ningún registro </td>";
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