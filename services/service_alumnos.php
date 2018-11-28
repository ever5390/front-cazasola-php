<?php
    session_start();
    if(!$_SESSION["usuario_registrado"]){
        header('Location: ../index.html');    
    }
    require_once '../controller/controller_files.php';
    require_once '../controller/controller_users.php';
    require_once '../controller/controller_courses.php';

    $nivel_usu = $_SESSION["usuario_registrado"]['nivel'];
    $id_usu = $_SESSION["usuario_registrado"]['id_usuario'];
    $archivo = new Archivos();
    $consultas = new Usuarios();
    $cursos = new Cursos();
    $lista_archivos = array();
    $archivos = array();
    $curso = null;

    //Obtener Lista de Alumnos que descargaron dichos archivos. Buscando por IdArchivo en tabla Descargas.

    if(isset($_GET['val'])) {
        $id_detalle = $_GET['val'];
        $totalArchivos = $archivo->c_numeroArchivosPorIdDetalle($id_detalle);
        $lista_archivos = $cursos->getDetalleViewBDetalleId($id_detalle);
        $archivos = $archivo->c_getFilesByIdDetalle($id_detalle);
    }

?>
<?php
    if($lista_archivos){
        
        echo "<div class='box-lista-alumnos'>";
        echo "<h4>
                    <a href='plataforma.php?ruta=gestionArchivos&idDetalleProf=".$id_detalle."'>CUR_".$lista_archivos[0]['id_curso']." ". $lista_archivos[0]['nombre_curso']."</a>
                    <label>".$totalArchivos[0]['cantidad']." archivos</label>
              </h4><br>";
      if($archivos){
        foreach($archivos as $archivo_reg){
            $cantidad = 10;
            $totaldescargasByArchivo = $archivo->c_conteoDescargaByIdArchivo($archivo_reg['id']);

            echo "<span>".$archivo_reg['titulo']." 
            <label>".$totaldescargasByArchivo[0]['cantidad']." descargas</label>
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
                    $indice=1;
                    $lista_alumnos = $archivo->c_getDescargasByIdArchivo($archivo_reg['id']);
                    if($lista_alumnos){
                        foreach($lista_alumnos as $alumno){
                            $registroAlumno = $consultas->c_cargarUsuariosByUserId($alumno['id_usuario']);
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
                    }else{
                        echo "<tr>";
                        echo "   <td colspan = '5'> Ningún alumno actualmente ha descargado este archivo </td>";
                        echo "</tr>";
                    }
        ?>
                </tbody>
            </table>
<?php
        }
      }else{
          echo "Sin archivos subidos por el momento, click en el nombre del curso para retornar";
      }
        echo  "</div>";
    }
?>