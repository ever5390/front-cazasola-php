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