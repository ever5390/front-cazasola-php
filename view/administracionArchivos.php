<div>

    <?php

    foreach($result as $detalle_reg){
        $curso = $c_cursos->c_getDetalleByDetalleId($detalle_reg['id_detallecp']);
        $id_curso =  $curso[0]['id_curso']; //rescata id  curso par a enviar a lista_alumnos
        echo "
        <h1> CUR_".$curso[0]['id_curso']." ".$detalle_reg['nombre_curso']."</h1>";
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
    ?>
   <div class="select-file">
    <?php
        if($nivel_usu == 1) {
    ?>
            <div class="posicion-btn-plus" id="posicion-btn-plus">
                <a class="boton-ver-formulario" href="javascript:openModal()" ><i class="fas fa-plus"></i></a>
            </div>
            <div id="modal">
                <form id="form-archivo-details" name="formulario" enctype="multipart/form-data" action="../services/helper.archivos_uploads.php?orden=1&idDetalleProf=<?php echo $id_detalle ?>" method="post" >
                    <div><a class="close-modal" href="javascript:closeModal()">x</a></div><br>
                    <p><input type="radio" name="radio" value="1" required> Syllabus
                    <input type="radio" name="radio" value="2" required> Actividades <p>
                    <label for="file" class="boton-examinar-archivo" >
                        <i class="fas fa-upload"></i> Seleccione archivo
                    </label>
                    <p><input    class="input-form" type="file" name="fichero_usuario" id="file" onchange = "cargarArchivo(this)"></p>
                    <p><input    class="input-form" type="text" name="txtTitulo" maxlength="80" placeholder="titulo de actividad"></p>
                    <p><input    class="input-form" type="text" id="nameFile" maxlength="80" name="nameFile" placeholder="archivo subido" ></p>
                    <p><input    class="input-form" type="date" name="txtFecha" required></p>
                    <p><textarea class="input-form" cols="2" rows="3" maxlenght="900" name="txtDescripcion" placeholder=" descripcion de la actividad" value=""></textarea></p>
                    <p><input    class="input-form btn-submit" type="submit" name="btn_submit" value="Upload File"></p>
                </form>
            </div>
    <?php
        }
    ?>
    <!-- <div class="mensaje"><?php echo $mensaje ?></div> -->
    <!--  INICIO SECCION LISTA DE ARCHIVOS -->
        <div class="contenedor-principal-archivo">
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
                                $extension = $partes_ruta1['extension'];
                ?>
                            <div class="cuadro-archivo" id='cuadro-archivo' >
                            <?php
                                    echo "<div class='header'>";
                                    echo "  <div class='izquierda'>";
                                    echo "    <span class='titulo'>";
                                    echo "      <label>";
                                    if($extension =="docx" || $extension == "doc"){
                                    echo "          <i class='fas fa-file-word icon-tipo-archivo'></i>";
                                    }elseif($extension =="xls" || $extension =="xlsx"){
                                    echo "          <i class='fas fa-file-excel icon-tipo-archivo'></i>";
                                    }elseif($extension =="ppt" || $extension =="ppts" || $extension =="pptx"){
                                    echo "          <i class='fas fa-file-powerpoint icon-tipo-archivo'></i>";
                                    }elseif($extension =="pdf"){
                                    echo "          <i class='fas fa-file-pdf icon-tipo-archivo'></i>";
                                    }else{
                                    echo "          <i class='fas fa-file-image icon-tipo-archivo'></i>";
                                    }
                                    echo ""         .$file['titulo']."";
                                    echo "      </label>";
                                    echo "    </span>";
                                    echo "    <div class='fecha'>
                                                Fecha subida: ".$file['fecha_subida'].
                                         "    </div>";
                                    echo "  </div>";
                                    echo "  <div class='derecha'>";
                                    $archivoDescargado = $c_archivos->c_getDescargasByIdArchivoUserAlumno($file['id'], $id_user);
                                    if(!$archivoDescargado && $nivel_usu == 2){
                                    echo "     <span class='recuadro-bordeado-iconos masdeuno'>";
                                    echo "        <a class='masdeuno-enlace' href='../services/helper.archivos_uploads.php?orden=3&idDetalleProf=".$id_detalle."&idFile=".$file['id']."&nombreArchivo=".$file['name_archivo']."'>";

                                    }else{
                                    echo "     <span class='recuadro-bordeado-iconos'>";
                                    echo "        <a class='masdeuno-enlace' href='../services/helper.archivos_uploads.php?orden=3&idDetalleProf=".$id_detalle."&idFile=".$file['id']."&nombreArchivo=".$file['name_archivo']."'>";

                                    }
                                    echo "           <i class='fas fa-download'></i>";
                                    echo "        </a>";
                                    echo "     </span>";

                                            if($nivel_usu == 1){
                                    $archivosDescargados = $c_archivos->c_conteoDescarga($file['id']);                                    
                                    if($archivosDescargados[0]['cantidad'] >= 1){
                                    echo "    <span class='recuadro-bordeado-iconos masdeuno'>";
                                    echo "      <a class='masdeuno-enlace' href='plataforma.php?ruta=listaAlumnos&idDetalleProf=".$id_detalle."&idFile=".$file['id']."&idcurso=".$id_curso."' >";
                                    }else {
                                    echo "    <span class='recuadro-bordeado-iconos'>";
                                    echo "      <a href='plataforma.php?ruta=listaAlumnos&idDetalleProf=".$id_detalle."&idFile=".$file['id']."&idcurso=".$id_curso."' >";
                                    }
                                    echo "          <i class='fas fa-users'></i> ".$archivosDescargados[0]['cantidad']. "
                                                </a>
                                              </span>";
                                    echo "    <span class='recuadro-bordeado-iconos'>
                                                <a href='../services/helper.archivos_uploads.php?orden=2&idDetalleProf=".$id_detalle."&idFile=".$file['id']."' >".
                                                    "<i class='fas fa-trash-alt'></i> 
                                                </a>
                                              </span>";
                                            }
                                    echo "  </div>";
                                    echo "</div>";
                                    echo "<div class='detalles'>";
                                    echo "  <div class='descripcion'>".$file['descripcion']."</div>";
                                    echo "  <div class='fecha'><strong>Fecha Entrega:</strong> ".$file['fecha_entrega']."</div>";
                                    echo "</div>"; 
                             ?>
                             </div>
                     <?php
                        }//fin del FOR EACH :::: tipo usuario
                    }
                //fin del If :::: tipo usuario
                ?>
            </div>
        </div>
        <div class="contenedor-principal-archivo">
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
                            $partes_ruta2 = pathinfo($path);
                            $extension = $partes_ruta2['extension'];
                ?>
                        <div onclick='myFunction()' class="cuadro-archivo">
                            <?php
                                    echo "<div class='header' onclick='myFunction()'>";
                                    echo "  <div class='izquierda'>";
                                    echo "    <span class='titulo'>";
                                    echo "      <label>";
                                    if($extension =="docx" || $extension == "doc"){
                                    echo "          <i class='fas fa-file-word icon-tipo-archivo'></i>";
                                    }elseif($extension =="xls" || $extension =="xlsx"){
                                    echo "          <i class='fas fa-file-excel icon-tipo-archivo'></i>";
                                    }elseif($extension =="ppt" || $extension =="ppts" || $extension =="pptx"){
                                    echo "          <i class='fas fa-file-powerpoint icon-tipo-archivo'></i>";
                                    }elseif($extension =="pdf"){
                                    echo "          <i class='fas fa-file-pdf icon-tipo-archivo'></i>";
                                    }else{
                                    echo "          <i class='fas fa-file-image icon-tipo-archivo'></i>";
                                    }
                                    echo ""         .$file2['titulo']."";
                                    echo "      </label>";
                                    echo "    </span>";
                                    echo "    <div class='fecha'>
                                                Fecha subida: ".$file2['fecha_subida'].
                                         "    </div>";
                                    echo "  </div>";
                                    echo "  <div class='derecha'>";
                                   
                                    $archivoDescargado = $c_archivos->c_getDescargasByIdArchivoUserAlumno($file2['id'], $id_user);
                                    if(!$archivoDescargado && $nivel_usu == 2){
                                    echo "   <span class='recuadro-bordeado-iconos masdeuno'>";
                                    echo "      <a class='masdeuno-enlace' href='../services/helper.archivos_uploads.php?orden=3&idDetalleProf=".$id_detalle."&idFile=".$file2['id']."&nombreArchivo=".$file2['name_archivo']."'>";

                                    }else{
                                    echo "   <span class='recuadro-bordeado-iconos'>";
                                    echo "      <a class='masdeuno-enlace' href='../services/helper.archivos_uploads.php?orden=3&idDetalleProf=".$id_detalle."&idFile=".$file2['id']."&nombreArchivo=".$file2['name_archivo']."'>";

                                    }
                                    echo "           <i class='fas fa-download'></i>";
                                    echo "      </a>";
                                    echo "   </span>";


                                            if($nivel_usu == 1){
                                    $archivosDescargados = $c_archivos->c_conteoDescarga($file2['id']);                                    
                                    if($archivosDescargados[0]['cantidad'] >= 1){
                                    echo "    <span class='recuadro-bordeado-iconos masdeuno'>";
                                    echo "      <a class='masdeuno-enlace' href='plataforma.php?ruta=listaAlumnos&idDetalleProf=".$id_detalle."&idFile=".$file2['id']."&idcurso=".$id_curso."' >";
                                    }else {
                                    echo "    <span class='recuadro-bordeado-iconos'>";
                                    echo "      <a href='plataforma.php?ruta=listaAlumnos&idDetalleProf=".$id_detalle."&idFile=".$file2['id']."&idcurso=".$id_curso."' >";
                                    }
                                    echo "          <i class='fas fa-users'></i> ".$archivosDescargados[0]['cantidad']. "
                                                </a>
                                              </span>";
                                    echo "    <span class='recuadro-bordeado-iconos'>
                                                <a href='../services/helper.archivos_uploads.php?orden=2&idDetalleProf=".$id_detalle."&idFile=".$file2['id']."' >".
                                                    "<i class='fas fa-trash-alt'></i> 
                                                </a>
                                              </span>";
                                            }
                                    echo "  </div>";
                                    echo "</div>";            
                                    echo "<div class='detalles'>";
                                    echo "  <div class='descripcion'>".$file2['descripcion']."</div>";
                                    echo "  <div class='fecha'><strong>Fecha Entrega:</strong> ".$file2['fecha_entrega']."</div>";
                                    echo "</div>";                              
                            ?>
                        </div>
                    <?php
                        }//fin del FOR EACH :::: tipo usuario
                    }
                ?>
            </div>
        </div>
   </div>
</div>