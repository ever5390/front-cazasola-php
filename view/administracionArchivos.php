<div>
    <?php
        if(!$result){
            echo '<h1>PLATAFORMA DE GESTION DE ACTIVIDADES</h1>';
            echo '<p>Horario del curso a gestionar</p>';
        }else{
            foreach($result as $detalle_reg){
                $curso = $c_cursos->c_getDetalleByDetalleId($detalle_reg['id_detallecp']);
                $id_curso =  $curso[0]['id_curso']; //rescata id  curso par a enviar a lista_alumnos
                echo "<h1> CUR_".$curso[0]['id_curso']." ".$detalle_reg['nombre_curso']."</h1>";
                if($nivel_usu == 2){
                    $profesor = $c_usuarios->c_cargarUsuariosByUserId($detalle_reg['id_user']);
                    echo "<span> <strong>Prof:  </strong>PROF_".$profesor[0]['id_usuario']." ".$profesor[0]['nombres']."</span><br><br>";
                }
                $horario = $c_cursos->c_horarioByIdCurso($detalle_reg['id_detallecp']);
                echo    "<p class='horario'>";
                foreach($horario as $reg_horario){
                    echo          $reg_horario['dia_asignado'].": ";
                    echo          $reg_horario['horainicio']." - ";
                    echo          $reg_horario['horafin'] ."<br>";
                }
                echo    "</p>";
            }
        }
    ?>
   <div class="select-file">
    <?php
        if($nivel_usu == 1) {
    ?>
            <label for="file" class="input-label" id="file_button" >
                <i class="fas fa-upload"></i> Seleccione archivo
            </label>
            <a class="btn-subir-file" href="javascript:openModal()" >Subir</a>
            <div id="modal">
                
                <form id="form-archivo-details" name="formulario" enctype="multipart/form-data" action="../services/helper.archivos_uploads.php?orden=1&idDetalleProf=<?php echo $id_detalle ?>" method="post" >
                    <div><a class="close-modal" href="javascript:closeModal()">x</a></div><br>
                    <p><input type="radio" name="radio" value="1" required> Syllabus
                    <input type="radio" name="radio" value="2" required> Actividades <p>    
                    <p><input    class="input-form" type="file" name="fichero_usuario" id="file" onchange = "cargarArchivo(this)"></p>
                    <p><input    class="input-form" type="text" name="txtTitulo" placeholder="titulo de actividad"></p>
                    <p><input    class="input-form" type="text" id="nameFile" name="nameFile" placeholder="archivo subido" ></p>
                    <p><input    class="input-form" type="date" name="txtFecha" required></p>
                    <p><textarea class="input-form" cols="2" rows="3" name="txtDescripcion" placeholder=" descripcion de la actividad" value=""></textarea></p>
                    <p><input    class="input-form btn-submit" type="submit" name="btn_submit" value="Upload File"></p>
                </form>
            </div>
    <?php  
        }
    ?>
    <div class="mensaje"><?php echo $mensaje ?></div>
    <!--  INICIO SECCION LISTA DE ARCHIVOS -->
        <div class="file-upload">
            <h4>SYLLABUS</h4>
            <div class="box-syllabus">
                <?php
                    $syllabus = $c_archivos->getFileSyllabus($id_detalle, 1);
                    if(!$syllabus){
                        if($nivel_usu == 1){
                            echo "<br>Ningún archivo subido por el momento, click en el botón de arriba para empezar!!";
                        }else{
                            echo "<br>Ningún archivo subido por el momento, comuníquese con su profesor!!";
                        }
                    }else{
                            
                        foreach($syllabus as $file){
                                /* Verificar la extensión del archivo recibido */
                                $path1 = "../uploads/files/".$file['name_archivo']."";
                                $partes_ruta1 = pathinfo($path1);
                                $extension1 = $partes_ruta1['extension'];
                ?>
                        <div onclick="click_descarga()" class="box-content-file" for="nameFileRegistered">
                            <?php
                                echo "<span class='block-file titulo'>";
                                if($extension1 =="docx" || $extension1 == "doc"){
                                    echo "<img class='icon-file' src='../uploads/icons/word.png' >";
                                }elseif($extension1 =="xls" || $extension1 =="xlsx"){
                                    echo "<img class='icon-file' src='../uploads/icons/excel.png' >";
                                }elseif($extension1 =="ppt" || $extension1 =="ppts" || $extension1 =="pptx"){
                                    echo "<img class='icon-file' src='../uploads/icons/ppt.png' >";
                                }elseif($extension1 =="pdf"){
                                    echo "<img class='icon-file' src='../uploads/icons/pdf3.png' >";
                                }else{
                                    echo "<img class='icon-file' src='../uploads/icons/png.png' >";
                                }
                                echo "<label>".$file['titulo']."</label></span>";
                                if($nivel_usu == 2){
                                    echo "<span class='view_details fecha'>Fecha subida: ".$file['fecha_subida']."</span>";
                                    echo "<span class='view_details download'><a href='../services/helper.archivos_uploads.php?orden=3&idDetalleProf=".$id_detalle."&idFile=".$file['id']."&nombreArchivo=".$file['name_archivo']."' >download</a></span>";
                                } else{
                                    echo "<span class='block-file fecha'>Fecha subida: ".$file['fecha_subida']."</span>";
                                    $archivosDescargados = $c_archivos->c_conteoDescarga($file['id']);
                                    if($archivosDescargados[0]['cantidad'] >= 1){
                                        echo "<span class='view_details download'><a href='../services/helper.archivos_uploads.php?orden=3&idDetalleProf=".$id_detalle."&idFile=".$file['id']."&nombreArchivo=".$file['name_archivo']."' >download</a></span>";
                                        echo "<span class='view_details download'><a href='plataforma.php?ruta=listaAlumnos&idDetalleProf=".$id_detalle."&idFile=".$file['id']."&idcurso=".$id_curso."' >".$archivosDescargados[0]['cantidad']." alumnos </a></span>";
                                    }else{
                                        echo "<span class='view_details download download-cero'><a href='../services/helper.archivos_uploads.php?orden=3&idDetalleProf=".$id_detalle."&idFile=".$file['id']."&nombreArchivo=".$file['name_archivo']."' >download</a></span>";
                                        echo "<span class='view_details download download-cero'><a href='plataforma.php?ruta=listaAlumnos&idDetalleProf=".$id_detalle."&idFile=".$file['id']."&idcurso=".$id_curso."' >".$archivosDescargados[0]['cantidad']." alumnos </a></span>";
                                    }
                                    echo "<a class='enlace_ocultar' href='../services/helper.archivos_uploads.php?orden=2&idDetalleProf=".$id_detalle."&idFile=".$file['id']."'>x</a>";
                                }
                                echo "<span class='block-file descripcion'>".$file['descripcion']."</span>";
                                echo "<span class='block-file fecha'><strong class='fecha_entrega'>Fecha Entrega:</strong> ".$file['fecha_entrega']."</span>";     
                            ?>
                        </div>
                    <?php 
                        }//fin del FOR EACH :::: tipo usuario
                    }
                //fin del If :::: tipo usuario
                ?>
            </div>
        </div>
        <div class="file-upload">
            <h4>ACTIVIDADES</h4>
            <?php
                $actividades = $c_archivos->getFileSyllabus($id_detalle, 2);
            ?>
            <div class="box-syllabus">
                <?php
                    if(!$actividades){
                        if($nivel_usu == 1){
                            echo "<br>Ningún archivo subido por el momento, click en el botón de arriba para empezar!!";
                        }else{
                            echo "<br>Ningún archivo subido por el momento, comuníquese con su profesor!!";
                        }                            }
                    else
                    {
                        foreach($actividades as $file2){
                            /* Verificar la extensión del archivo recibido */
                            $path = "../uploads/files/".$file2['name_archivo']."";
                            $partes_ruta = pathinfo($path);
                            $extension = $partes_ruta['extension'];
                ?>
                        <label class="box-content-file" for="nameFileRegistered">
                            <?php
                                echo "<span class='block-file titulo'>";
                                if($extension =="docx" || $extension == "doc"){
                                    echo "<img class='icon-file' src='../uploads/icons/word.png' >";
                                }elseif($extension =="xls" || $extension =="xlsx"){
                                    echo "<img class='icon-file' src='../uploads/icons/excel.png' >";
                                }elseif($extension =="ppt" || $extension =="ppts" || $extension =="pptx"){
                                    echo "<img class='icon-file' src='../uploads/icons/ppt.png' >";
                                }elseif($extension =="pdf"){
                                    echo "<img class='icon-file' src='../uploads/icons/pdf3.png' >";
                                }else{
                                    echo "<img class='icon-file' src='../uploads/icons/png.png' >";
                                }
                                echo "<label>".$file2['titulo']."</label></span>";                 
                                if($nivel_usu == 2){
                                    echo "<span class='view_details fecha'>Fecha subida: ".$file2['fecha_subida']."</span>";
                                    echo "<span class='view_details download'><a href='../services/helper.archivos_uploads.php?orden=3&idDetalleProf=".$id_detalle."&idFile=".$file2['id']."&nombreArchivo=".$file2['name_archivo']."' >download</a></span>";
                                } else{
                                    echo "<span class='block-file fecha'>Fecha subida: ".$file2['fecha_subida']."</span>";
                                    $archivosDescargados = $c_archivos->c_conteoDescarga($file2['id']);
                                    if($archivosDescargados[0]['cantidad'] >= 1){
                                        echo "<span class='view_details download'><a href='../services/helper.archivos_uploads.php?orden=3&idDetalleProf=".$id_detalle."&idFile=".$file2['id']."&nombreArchivo=".$file2['name_archivo']."'>download</a></span>";
                                        echo "<span class='view_details download'><a href='plataforma.php?ruta=listaAlumnos&idDetalleProf=".$id_detalle."&idFile=".$file2['id']."&idcurso=".$id_curso."' >".$archivosDescargados[0]['cantidad']." alumnos </a></span>";
                                    }else{
                                        echo "<span class='view_details download download-cero'><a href='../services/helper.archivos_uploads.php?orden=3&idDetalleProf=".$id_detalle."&idFile=".$file2['id']."&nombreArchivo=".$file2['name_archivo']."'>download</a></span>";
                                        echo "<span class='view_details download download-cero'><a href='plataforma.php?ruta=listaAlumnos&idDetalleProf=".$id_detalle."&idFile=".$file2['id']."&idcurso=".$id_curso."' >".$archivosDescargados[0]['cantidad']." alumnos </a></span>";
                                    }
                                    echo "<a class='enlace_ocultar' href='../services/helper.archivos_uploads.php?orden=2&idDetalleProf=".$id_detalle."&idFile=".$file2['id']."'>x</a>";
                                }
                                echo "<span class='block-file descripcion'>".$file2['descripcion']."</span>";
                                echo "<span class='block-file fecha'><strong class='fecha_entrega'>Fecha Entrega:</strong> ".$file2['fecha_entrega']."</span>";     
                            ?>
                        </label>
                    <?php
                        }//fin del FOR EACH :::: tipo usuario
                    }
                ?>
            </div>
        </div>
   </div>
</div>