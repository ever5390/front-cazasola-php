<?php
    // require_once 'modelo/class.conexion.php';
    // require_once '../modelo/class.consultas_cursos.php';
    require_once 'controller.cursos.php';

    $cursoById = new Cursos();
    session_start();
    $id_usu = $_SESSION["usuario_registrado"]['codigo'];
    $cont = 0;
    if(isset($_GET['val'])){
        $parametro = $_GET['val'];
    }

    $ruta = "../front-cazasola-php/controlador/helper2.php?idcurso=";

    if($parametro == "todos"){
        $result = $cursoById->c_verDetalleCursoByIdProfe($id_usu);
    }elseif($parametro != 0){
        $result = $cursoById->c_getCursosById($parametro);
    }
    
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
            if(!$detalle_reg['activado']){
            echo        "<a class='btn-desactivado' href='".$ruta.$detalle_reg['id_curso']."&activado=".$detalle_reg['activado']."'>Habilitar en plataforma</a>";
                } 
            else 
                {
            echo        "<a class='btn-activado' href='".$ruta.$detalle_reg['id_curso']."&activado=".$detalle_reg['activado']."'>Deshabilitar en plataforma</a>";
                }
            echo     "</div>";
            echo "</div>";
    }
    
?>
