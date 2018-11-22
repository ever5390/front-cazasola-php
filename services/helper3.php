<?php

    require_once '../model/DAO_connection.php';
    require_once '../model/DAO_courses.php';
    require_once '../controller/controller_courses.php';

    $ruta = "../view/plataforma.php?idDetalleProf=";
    $cursos = new Cursos();
    if($nivel_usu == 1){ // USUARIO PROFESOR
        $result = $cursos->getCursosByIdProf($id_user);
    } else { // USUARIO ALUMNO
        $result = $cursos->c_getViewMatriculaAlumno($id_user);
    }

    if($result){
        foreach($result as $cursoReg){
            if($cursoReg['habilitado']){
                echo "<div class='item-curso'>";
                echo    "<div class='name-curso'>";
                $cursoName = $cursos->c_getCursosById($cursoReg['id_curso']);
                echo        "<h4>";
                ?>
                <div style='float:right' class='notification'>
                    <!-- <div class='notify-box'> -->
                        <img src='../uploads/icons/notifications-button2.png' alt='notify'>
                        <a class='notify-number-download' href="#">5</a>
                    <!-- </div> -->
                </div>
                <?php
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