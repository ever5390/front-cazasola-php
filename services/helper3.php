<?php

    require_once '../controller/controller_courses.php';
    require_once '../controller/controller_files.php';

    $ruta = "../view/plataforma.php?idDetalleProf=";
    $cursos = new Cursos();
    $files =  new Archivos();
    if($nivel_usu == 1){ // USUARIO PROFESOR
        $result = $cursos->getCursosByIdProf($id_user);
    } else { // USUARIO ALUMNO
        $result = $cursos->c_getViewMatriculaAlumno($id_user);
    }

    if($result){
        foreach($result as $cursoReg){
            
            $idDetalle = $cursoReg['id_detallecp'];
            if($nivel_usu == 2){ // SOLO USUARIO ALUMNO
                $numeroArchivos = $files->c_conteoArchivos($idDetalle);
                $numeroArchivosDescarga = $files->c_conteoArchivosDescarga($idDetalle, $id_user);
                $archivoPdtesDescargaByAlumno = $numeroArchivos[0]-$numeroArchivosDescarga[0];
            }

            if($cursoReg['habilitado']){
                echo "<div class='item-curso'>";
                echo    "<div class='name-curso'>";
                $cursoName = $cursos->c_getCursosById($cursoReg['id_curso']);
                echo        "<h4>";
                if($nivel_usu == 2 && $archivoPdtesDescargaByAlumno != 0){ // SOLO USUARIO ALUMNO
                ?>
                <div style='float:right' class='notification'>
                    <!-- <div class='notify-box'> -->
                    <img src='../uploads/icons/notifications-button2.png' alt='notify'>
                    <a class='notify-number-download' href="#"><?php echo $archivoPdtesDescargaByAlumno;?></a>
                    <!-- </div> -->
                </div>
                <?php
                }
                echo "CUR_".$cursoReg['id_curso']." ".$cursoName[0]['nombre_curso']."</h4>";
                echo    "</div>";
                echo    "<div class='descripcion-curso'>";
                $horario = $cursos->c_horarioByIdCurso($cursoReg['id_detallecp']);
                foreach($horario as $reg_horario){
                    echo    "<p >".$reg_horario['dia_asignado'].": ";
                    echo          $reg_horario['horainicio']." - ";
                    echo          $reg_horario['horafin'];
                    echo    "</p>";
                }
                echo        "<a class ='btn-activado' href='".$ruta.$reg_horario['id_detallecp']."'>Administrar Plataforma</a>";
                echo     "</div>";
                echo "</div>";
            }
        }
    }

?>