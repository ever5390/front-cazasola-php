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
                                    echo "        <a class='masdeuno-enlace' href='../services/helper.archivos_uploads.php?orden=3&idDetalleProf=".$id_detalle."&idFile=".$file['id']."&nombreArchivo=".urldecode($file['name_archivo'])."'>";

                                    }else{
                                    echo "     <span class='recuadro-bordeado-iconos'>";
                                    echo "        <a class='masdeuno-enlace' href='../services/helper.archivos_uploads.php?orden=3&idDetalleProf=".$id_detalle."&idFile=".$file['id']."&nombreArchivo=".urldecode($file['name_archivo'])."'>";

                                    }
                                    echo "           <i class='fas fa-download'></i>";
                                    echo "        </a>";
                                    echo "     </span>";

                                if($nivel_usu == 1){
                                    $archivosDescargados = $c_archivos->c_conteoDescargaByIdArchivo($file['id']);                                    
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
                                    echo "      <a class='masdeuno-enlace' href='../services/helper.archivos_uploads.php?orden=3&idDetalleProf=".$id_detalle."&idFile=".$file2['id']."&nombreArchivo=".urldecode($file2['name_archivo'])."'>";

                                    }else{
                                    echo "   <span class='recuadro-bordeado-iconos'>";
                                    echo "      <a class='masdeuno-enlace' href='../services/helper.archivos_uploads.php?orden=3&idDetalleProf=".$id_detalle."&idFile=".$file2['id']."&nombreArchivo=".urldecode($file2['name_archivo'])."'>";

                                    }
                                    echo "           <i class='fas fa-download'></i>";
                                    echo "      </a>";
                                    echo "   </span>";


                                if($nivel_usu == 1){
                                    $archivosDescargados = $c_archivos->c_conteoDescargaByIdArchivo($file2['id']);                                    
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