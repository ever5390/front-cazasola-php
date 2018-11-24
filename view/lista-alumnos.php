<h2>LISTA DE ALUMNOS CON DESCARGAS ACTIVAS</h2>
<p><strong>Prof: </strong><?php echo $_SESSION["usuario_registrado"]['nombres']; ?></p> 
<?php   if(!$alumnos){
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
<?php   }
        else{
            echo "<div class='box-lista-alumnos'>";
            echo "<h4><a href='plataforma.php?ruta=gestionArchivos&idDetalleProf=".$id_detalle."'>CUR_".$curso[0]['id_curso']." ". $curso[0]['nombre_curso']."</a></h4><br>";
            $filename = $c_archivos->c_getFileByIdFile($id_archivo);
            echo "<span>".$filename[0]['titulo']."</span>";
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