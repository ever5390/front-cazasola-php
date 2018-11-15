<?php
    // require '../modelo/class.conexion.php';
    require 'controller.cursos.php';

    session_start();
    $id_usu = $_SESSION["usuario_registrado"]['codigo'];
    if(isset($_GET['val'])){
        $id_curso_select = $_GET['val'];
    }

    $cont = 0;
    $repetida = false;
    $cursoById = new Cursos();
    $ruta = "../front-cazasola-php/controlador/helper2.php?idcurso=";
    $result = $cursoById->c_verDetalleCursoByProfe($id_usu);

    if($result){
        foreach($result as $detalle_reg){
            echo "<div class='item-curso'>";
            echo    "<div class='name-curso'>";
            echo        "<h4>".$detalle_reg['nombre_curso']."</h4>";
            echo    "</div>";
            echo    "<div class='descripcion-curso'>";
            $horario = $cursoById->c_horarioByIdCurso($detalle_reg['id_curso']);
            foreach($horario as $reg_horario){
                echo    "<p>".$reg_horario['dia_asignado'].": ";
                echo          $reg_horario['horainicio']." - ";
                echo          $reg_horario['horafin'];
                echo    "</p>";
            }
            echo        "<a href='".$ruta.$reg_horario['id_curso']."'>Habilitar en plataforma</a>";
            echo     "</div>";
            echo "</div>";
        }
    }

?>