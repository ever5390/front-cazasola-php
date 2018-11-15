<?php

    require_once 'modelo/class.conexion.php';
    require_once 'modelo/class.consultas_cursos.php';
    require_once 'controller.cursos.php';

    $ruta = "plataforma.php?id_curso=";
    $curso = new Cursos();
    $result = $curso->c_verDetalleCursoProf($id_user, 1);

    if($result){
        foreach($result as $detalle_reg){
            echo "<div class='item-curso'>";
            echo    "<div class='name-curso'>";
            echo        "<h4>".$detalle_reg['nombre_curso']."</h4>";
            echo    "</div>";
            echo    "<div class='descripcion-curso'>";
            $horario = $curso->c_horarioByIdCurso($detalle_reg['id_curso']);
            foreach($horario as $reg_horario){
                echo    "<p>".$reg_horario['dia_asignado'].": ";
                echo          $reg_horario['horainicio']." - ";
                echo          $reg_horario['horafin'];
                echo    "</p>";
            }
            echo        "<a class ='btn-activado' href='".$ruta.$reg_horario['id_curso']."'>Administrar Plataforma</a>";
            echo     "</div>";
            echo "</div>";
        }
    }
  
?>