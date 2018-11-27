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
        <div class="posicion-btn-plus" id="posicion-btn-plus">
    <?php
            if($nivel_usu == 1) {
    ?>          
                <a class="boton-ver-formulario" href="javascript:openModals()" ><i class="fas fa-plus"></i></a>
    <?php
        }
    ?>
                <form action="../services/helper.archivos_uploads.php?orden=4&idDetalleProf=<?php echo $id_detalle ?>" method="post">
                    <button class = "boton-buscar-archivo" type="submit" value=""><i class='fas fa-search'></i></button>
                    <input class = "input-buscar" type="text" name="txt-buscar" placeholder="Archivo a buscar">
                </form>
        </div>
    <?php
        if($nivel_usu == 1) {
    ?>
            <div id="modal">
                <form id="form-archivo-details" name="formulario" enctype="multipart/form-data" action="../services/helper.archivos_uploads.php?orden=1&idDetalleProf=<?php echo $id_detalle ?>" method="post" >
                    <div><a class="close-modal" href="javascript:closeModal()">x</a></div><br>
                    <p><input type="radio" name="radio" value="1" required> Syllabus
                    <input type="radio" name="radio" value="2" required> Actividades <p>
                    <label for="file" class="boton-examinar-archivo" >
                        <i class="fas fa-upload"></i> Seleccione archivo
                    </label>
                    <p><input    class="input-form" type="file" name="fichero_usuario" id="file" onchange = "cargarArchivo(this)"></p>
                    <p><input    class="input-form" type="text" name="txtTitulo" maxlength="79" placeholder="titulo de actividad"></p>
                    <p><input    class="input-form" type="text" id="nameFile" maxlength="79" name="nameFile" placeholder="archivo subido" ></p>
                    <p><input    class="input-form" type="date" name="txtFecha" required></p>
                    <p><textarea class="input-form" cols="2" rows="3" maxlength="800" name="txtDescripcion" placeholder=" descripcion de la actividad" value=""></textarea></p>
                    <p><input    class="input-form btn-submit" type="submit" name="btn_submit" value="Upload File"></p>
                </form>
            </div>
    <?php
        }
    ?>
    <div class="mensaje"><?php echo $mensaje ?></div>
    <!--  INICIO SECCION LISTA DE ARCHIVOS -->
    
    <?php  
    
        if($filtro==null){
            include "lista-archivos.php"; 
        } else {
            include "lista-archivos-busqueda.php"; 
        }
    ?>

    <!-- FIN LISTA ARCHIVOS -->
   </div>
</div>