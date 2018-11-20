<?php   
        require_once '../model/DAO_courses.php';
        require_once '../model/DAO_files.php';
        require_once '../model/DAO_users.php';
        require_once '../controller/controller_courses.php';
        require_once '../controller/controller_users.php';
        require_once '../controller/controller_files.php';

        session_start();
        $id_user = $_SESSION["usuario_registrado"]['id_usuario'];
        $nivel_usu = $_SESSION["usuario_registrado"]['nivel'];
        $result = null;
        if(isset($_GET['idDetalleProf'])){
            $id_detalle = $_GET['idDetalleProf'];
            $consultas_archivos = new Archivos();
            $registro_curso = new Cursos();
            $usuarios =  new Usuarios();
            $result = $registro_curso->getDetalleViewBDetalleId($id_detalle);
        }else{
            $id_detalle = 0;
        }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Raleway|Work+Sans" rel="stylesheet">
    <link rel="stylesheet" href="../library/css/estilos_generales.css">
    <script src="../library/js/jquery.min.js"></script>
    <script src="../library/js/javascript.js"></script>
    <title>plataforma-administrativa</title>
</head>
<body>
    <div class="container">
        <?php
            include 'aside-usuario-info.php';
        ?>
        <div class="menu-oculto"><i class="fas fa-bars"></i></div>

        <section class="bloque-main">
            <?php
                if(!$result){
                    echo '<h1>PLATAFORMA DE GESTION DE ACTIVIDADES</h1>';
                    echo '<p>Horario del curso a gestionar</p>';
                }else{
                    foreach($result as $detalle_reg){
                        echo "<h1> SOP812 ".$detalle_reg['nombre_curso']."</h1>";
                        if($nivel_usu == 2){
                            $profesor = $usuarios->c_cargarUsuariosByUserId($detalle_reg['id_user']);
                            echo "<span> <strong>Prof: TYH56 </strong>".$profesor[0]['nombres']."</span><br><br>";
                        }
                        $horario = $registro_curso->c_horarioByIdCurso($detalle_reg['id_detallecp']);
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
                        <i class="fas fa-upload"></i> Seleccione el archivo a subir
                    </label>
                    <a class="input-label enlace_desactivado" href="javascript:openModal()" >Subir</a>

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

            <!--  INICIO SECCION LISTA DE ARCHIVOS -->

                <div class="file-upload">
                    <h4>SYLLABUS</h4>
                    <div class="box-syllabus">
                        <?php
                            $syllabus = $consultas_archivos->getFileSyllabus($id_detalle, 1);
                            if(!$syllabus){

                                echo "<strong>Seleccione un curso de su Lista ..</strong>";
                                }
                            else{
                                    
                                foreach($syllabus as $file){
                            ?>
                                <label class="box-content-file" for="nameFileRegistered">
                                    <?php
                                         echo "<span class='block-file titulo'>".$file['titulo']."</span>";
                                         if($nivel_usu == 2){
                                             echo "<span class='view_details fecha'>Fecha subida: ".$file['fecha_subida']."</span>";
                                             echo "<span class='view_details download'><a href='#' >download</a></span>";
                                         } else{
                                             echo "<span class='block-file fecha'>Fecha subida: ".$file['fecha_subida']."</span>";
                                             echo "<span class='view_details download'><a href='#' >download</a></span>";
                                             echo "<span class='view_details numberPerson_download'>15 alumnos</span>";
                                             echo "<a class='enlace_ocultar' href='../services/helper.archivos_uploads.php?orden=2&idDetalleProf=".$id_detalle."&id_archivo=".$file['id']."'>x</a>";
                                         }
                                         echo "<span class='block-file descripcion'>".$file['descripcion']."</span>";
                                         echo "<span class='block-file fecha'><strong class='fecha_entrega'>Fecha Entrega:</strong> ".$file['fecha_entrega']."</span>";     
                                     ?>
                                </label>
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
                        $actividades = $consultas_archivos->getFileSyllabus($id_detalle, 2);
                    ?>
                    <div class="box-syllabus">
                        <?php
                            if(!$actividades){

                                echo "<strong>Seleccione un curso de su Lista ..</strong>";
                            }
                            else
                            {
                                foreach($actividades as $file2){
                        ?>
                                <label class="box-content-file" for="nameFileRegistered">
                                    <?php
                                        echo "<span class='block-file titulo'>".$file2['titulo']."</span>";
                                        if($nivel_usu == 2){
                                            echo "<span class='view_details fecha'>Fecha subida: ".$file2['fecha_subida']."</span>";
                                            echo "<span class='view_details download'><a href='../services/service_descarga_file.php?idFile=".$file2['id']."' >download</a></span>";
                                        } else{
                                            echo "<span class='block-file fecha'>Fecha subida: ".$file2['fecha_subida']."</span>";
                                            echo "<span class='view_details download'><a href='service_descarga_file.php' >download</a></span>";
                                            echo "<span class='view_details numberPerson_download'>15 alumnos</span>";
                                            echo "<a class='enlace_ocultar' href='../services/helper.archivos_uploads.php?orden=2&idDetalleProf=".$id_detalle."&id_archivo=".$file2['id']."'>x</a>";
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
        </section>
    </div>
</body>
</html>