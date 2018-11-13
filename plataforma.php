<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="estilo-plataforma.css">
    <link rel="stylesheet" href="estilo-cursos.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Raleway|Work+Sans" rel="stylesheet">
    <script src="jquery.min.js"></script>
    <script src="javascript.js"></script>
    <title>plataforma-administrativa</title>
</head>
<body>
    <?php
        require_once ('modelo/class.consultas_archivos.php');
        require_once ('controlador/controller.archivos_subidos.php');
        session_start();
        $id_user = $_SESSION["usuario_registrado"]['codigo'];
        $nivel_usu = $_SESSION["usuario_registrado"]['nivel'];
    ?>
    <div class="container">
        <?php
            include 'aside-usuario-info.php';
        ?>

        <div class="menu-oculto"><i class="fas fa-bars"></i></div>

        <section class="bloque-main">
           <h1>SISTEMAS DE INFORMACION</h1>
           <p>Lunes : 8:00 - 13:20 <br>
           Viernes : 17:30 - 20:30</p>

           <div class="select-file">    

            <!--  INICIO SECCION SUBIRS ARCHIVOS -->

            <?php
                if($nivel_usu == 1) {
            ?>
               <div class="selectbox-file">
                    <label for="file" class="input-label">
                        <i class="fas fa-upload"></i>
                        Seleccione el archivo a subir
                    </label>
                    <form name="formulario" method="post" >
                        <input type="file" id="file" >
                        <input type="hidden" name="inputHidden" value="">
                    </form>
               </div>
               <div class="check-box">
                   <br>
                    <input type="radio" name="rb"> Syllabus
                    <input type="radio" name="rb"> Activities
               </div>
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
                            $registro_arch = $consultas_archivos->getArchivos($id_user);
                            if(!$registro_arch){

                                echo "<strong>Seleccione un curso de su Lista ..</strong>";
                                }
                            else{
                                    
                                foreach($registro_arch as $user){
                                    if($user['tipo_archivo'] == 1){
                            ?>
                                <label class="labelRegistered" for="nameFileRegistered">
                                        <?php
                                        echo $user['nombre'];                         
                                        if($nivel_usu == 1) {
                                            echo "<a href='#'>x</a>";
                                        }
                                    ?>
                                        <a href="#">€</a>
                                    <?php
                                        if($nivel_usu == 1){
                                            echo "<a href='#'>5</a>";
                                        }
                                    ?>
                                </label>
                            <?php 
                                    }//fin del If :::: tipo ARCHIVO
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
                    <div class="box-syllabus">
                        <?php
                         if( $nivel_usu == 1){
                            if(!$registro_arch){

                                echo "<strong>Seleccione un curso de su Lista ..</strong>";
                            }
                            else
                            {
                                foreach($registro_arch as $user){
                                    if($user['tipo_archivo'] == 2){
                        ?>
                                <label class="labelRegistered" for="nameFileRegistered">
                                    INFORME N° 0XX - REPORTE DE INTERMEDIADOS E INSERTADOS DEL MES DE JULIO 2018 
                                    <?php
                                        if($nivel_usu == 1) {
                                            echo "<a href='#'>x</a>";
                                        }
                                    ?>
                                    <a href="#">€</a>
                                    <?php
                                        if($nivel_usu == 1){
                                            echo "<a href='#'>5</a>";
                                        }
                                    ?>
                                </label>
                            <?php
                                    }//fin del If :::: tipo ARCHIVO
                                }//fin del FOR EACH :::: tipo usuario
                            }
                        } else {
                            echo "<a href='cursos.php'>Seleccione un curso de su Lista ..</a>";
                        }
                        //fin del If :::: tipo usuario
                        ?>
                        <!-- <label class="labelRegistered" for="nameFileRegistered">INFORME N° 0XX - REPORTE DE INTERMEDIADOS E INSERTADOS DEL MES DE JULIO 2018 <a href="#">x</a><a href="#">€</a><a href="#">5</a></label>
                        <label class="labelRegistered" for="nameFileRegistered">INFORME N° 0XX - REPORTE DE INTERMEDIADOS E INSERTADOS DEL MES DE JULIO 2018 <a href="#">x</a><a href="#">€</a><a href="#">5</a></label>
                        <label class="labelRegistered" for="nameFileRegistered">INFORME N° 0XX - REPORTE DE INTERMEDIADOS E INSERTADOS DEL MES DE JULIO 2018 <a href="#">x</a><a href="#">€</a><a href="#">5</a></label> -->
                    </div>
                </div>
           </div>
        </section>
    </div>
</body>
</html>