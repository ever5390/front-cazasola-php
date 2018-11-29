<?php if(!$_SESSION["usuario_registrado"]){
        header('Location: ../index.html');    
    }

    $nombre_usuario = $_SESSION["usuario_registrado"]['nombres'];
?>
<h2>REPORTES ESTADO DE DESCARGA DE ARCHIVOS</h2>
<p><strong>Prof: </strong><?php echo $_SESSION["usuario_registrado"]['nombres']; ?></p> 
<?php   
    $totalArchivos = $c_archivos->c_numeroArchivosPorIdDetalle($id_detalle);
    if($id_archivo!=null){
        $totaldescargasByArchivo = $c_archivos->c_conteoDescargaByIdArchivo($id_archivo);

        if($totaldescargasByArchivo[0]['cantidad'] != 1){
            $texto_descarga_total = "descargas";
        }else{
            $texto_descarga_total = "descarga";
        }
        
    }

    $existe_alumnos = null;

    if(!$alumnos){
    echo "<div class='box-lista-cursos'>";
            $cursosByProfesor = $c_cursos->c_getDetalleViewByUser($id_user);
            echo " <select class='combo-box-cursos' onchange='valor2(this)' id='miSelect2'>";
            echo "    <option value = '0'>---- Seleccione curso ----</option>";
            if($cursosByProfesor){
                    foreach($cursosByProfesor as $cursos){
                        echo "<option value='".$cursos['id_detallecp']."'>".$cursos['nombre_curso']."</option>";
                    }
    }
            echo " </select>";
    echo "</div>";
?>

<div id='divData2'></div>

<?php }
    else
    {
        $existe_alumnos = 1;
    //totales de archivos por curso y el sgte es descargas por archiv

echo "<div class='box-lista-alumnos'>";
    echo "<h4>
                <a href='plataforma.php?ruta=gestionArchivos&idDetalleProf=".$id_detalle."'>CUR_".$curso[0]['id_curso']." ". $curso[0]['nombre_curso']."</a>
                <a class='label' href='reporte_pdf.php?nombre=$nombre_usuario&file_id=$id_archivo&id_detalle=$id_detalle&existe_alumnos=$existe_alumnos' target='_blank' ><i class='fas fa-cloud-download-alt fa-1x'></i>  1 archivo</a>
          </h4><br>";
    $filename = $c_archivos->c_getFileByIdFile($id_archivo);
    echo "<span>".$filename[0]['titulo']."
            <label>".$totaldescargasByArchivo[0]['cantidad']." ".$texto_descarga_total."</label>
          </span>";
?>

        <table>
            <thead>
                <th>Nro</th>
                <th>Código</th>
                <th>Nombres y Apellidos</th>
                <th>Correo</th>
                <th>Fecha Descarga</th>
            </thead>

            <tbody>
            <?php
            if($alumnos != null){
                $indice=1;
                foreach($alumnos as $alumno){
                    $registroAlumno = $c_usuarios->c_cargarUsuariosByUserId($alumno['id_usuario']);
            ?>
                <tr>
                    <td><?php echo $indice ?></td> 
                    <td>COD_ALU_<?php echo $registroAlumno[0]['id_usuario'] ?></td>
                    <td class="td-nombres"><?php echo $registroAlumno[0]['nombres'] ?></td>
                    <td><?php echo $registroAlumno[0]['correo'] ?></td>
                    <td><?php echo $alumno['fecha_descarga']?></td>
                </tr>
            <?php
                $indice++;
                }
            }
            ?>
            </tbody>
        </table>

    <?php
echo  "</div>";
}
?>