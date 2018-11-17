<?php   
        require 'modelo/class.consultas_archivos.php';
        require 'modelo/class.consultas_cursos.php';
        require 'controlador/controller.cursos.php';
        require 'controlador/controller.archivos_subidos.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="estilo-plataforma.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Raleway|Work+Sans" rel="stylesheet">
    <script src="jquery.min.js"></script>
    <script src="javascript.js"></script>
    <title>plataforma-administrativa</title>
</head>
<body>
    <?php
        session_start();
        $id_user = $_SESSION["usuario_registrado"]['codigo'];
        $nivel_usu = $_SESSION["usuario_registrado"]['nivel'];

        $result = null;

        if(isset($_GET['id_curso'])){
            $curso_id = $_GET['id_curso'];

            $registro_curso = new Cursos();
            $result = $registro_curso->c_getCursosById($curso_id);
        }else{
            $curso_id = 0;
        }
    ?>
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
                        
                        echo "<h1>".$detalle_reg['nombre_curso']."</h1>";
                        
                        $horario = $registro_curso->c_horarioByIdCurso($detalle_reg['id_curso']);
                        echo    "<p>";
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

            <!--selectbox-file  INICIO SECCION SUBIRS ARCHIVOS -->

            <?php
                if($nivel_usu == 1) {
            ?>                        
                    <form name="formulario" enctype="multipart/form-data" action="controlador/helper.archivos_uploads.php?orden=1&id_curso=<?php echo $curso_id ?>" method="post" >
                        <label for="file" class="input-label">
                            <i class="fas fa-upload"></i>
                            Seleccione el archivo a subir
                        </label>
                        <input type="submit" name="btn_submit" value="">
                        <textarea rows="3" name="txtDescripcion" placeholder=" Descripcion del Archivo"></textarea>
                        <input type="file" name="fichero_usuario" id="file" onchange = "cargarArchivo(this)" required>
                        <input type="hidden" name="nameArchivoOculto" value="">
                        <br><br>
                        <input type="radio" name="radio" value="1" required> Syllabus
                        <input type="radio" name="radio" value="2" required> Activities
               </form>
            <?php  
                }  
            ?>

            <!--  INICIO SECCION LISTA DE ARCHIVOS -->

                <div class="file-upload">
                    <h3>SYLLABUS</h3>
                    <div class="box-syllabus">
                        <?php

                        if( $nivel_usu == 1){
                            $consultas_archivos = new Archivos();
                            $syllabus = $consultas_archivos->getFileSyllabus($id_user, $curso_id, 1);
                            if(!$syllabus){

                                echo "<strong>Seleccione un curso de su Lista ..</strong>";
                                }
                            else{
                                    
                                foreach($syllabus as $file){
                            ?>
                                <label class="labelRegistered" for="nameFileRegistered">
                                        <?php
                                        echo $file['titulo'];                         
                                        if($nivel_usu == 1) {
                                            echo "<a class='enlace_ocultar' href='controlador/helper.archivos_uploads.php?orden=2&id_curso=".$curso_id."&id_archivo=".$file['id']."'>x</a>";
                                        }
                                    ?>
                                        <a class='enlace_ocultar' href="#">€</a>
                                    <?php
                                        if($nivel_usu == 1){
                                            echo "<a class='enlace_ocultar' href='#'>5</a>";
                                        }
                                    ?>
                                </label>
                            <?php 
                                }//fin del FOR EACH :::: tipo usuario
                            }
                        } else {
                            echo "<a href='cursos.php'>Seleccione un curso de su Lista ..</a>";
                        }
                        //fin del If :::: tipo usuario
                        ?>
                    </div>
                </div>

                <div class="file-upload">
                    <h3>ACTIVITIES</h3>
                    <?php
                        $actividades = $consultas_archivos->getFileSyllabus($id_user, $curso_id, 2);
                    ?>
                    <div class="box-syllabus">
                        <?php
                         if( $nivel_usu == 1){
                            if(!$actividades){

                                echo "<strong>Seleccione un curso de su Lista ..</strong>";
                            }
                            else
                            {
                                foreach($actividades as $file2){
                        ?>
                                <label class="labelRegistered" for="nameFileRegistered">
                                    <!-- INFORME N° 0XX - REPORTE DE INTERMEDIADOS E INSERTADOS DEL MES DE JULIO 2018  -->
                                    <?php
                                     
                                        echo $file2['titulo'];
                                        if($nivel_usu == 1) {
                                            echo "<a class='enlace_ocultar' href='controlador/helper.archivos_uploads.php?orden=2&id_curso=".$curso_id."&id_archivo=".$file2['id']."'>x</a>";
                                        }
                                    ?>
                                    <?php
                                    echo "<a href='#' class='enlace_ocultar' >€</a>";
                                    
                                        if($nivel_usu == 1){
                                            echo "<a href='#' class='enlace_ocultar' >5</a>";
                                        }
                                    ?>
                                </label>
                            <?php
                                }//fin del FOR EACH :::: tipo usuario
                            }
                        } else {
                            echo "<a href='cursos.php'>Seleccione un curso de su Lista ..</a>";
                        }
                        //fin del If :::: tipo usuario
                        ?>
                    </div>
                </div>
           </div>
        </section>
    </div>
</body>
</html>