<?php
    require_once '../controller/controller_courses.php';

    $cursoById = new Cursos();
    session_start();
    $id_usu = $_SESSION["usuario_registrado"]['id_usuario'];
    $nivel_usu = $_SESSION["usuario_registrado"]['nivel']; //para el aside

    $cont = 0;
    if(isset($_GET['val'])){
        $parametro = $_GET['val'];
    }
    $mensaje = "Ningùn curso verificado en su matrìcula aùn. Pòngase en contacto con su Facultad.";
    //recordar que esto es como si estuviera incrustado en el HTML del view de registro_cursos
    //por eso los ../services/helper2.. y no solo helper2.. de frente. 
    $ruta = "../services/helper2.php?idcurso=";

    if($parametro == "todos" &&  $nivel_usu == 1){  // USUARIO PROFESOR
        $result = $cursoById->c_verDetalleCursoByIdProfe($id_usu);
    }elseif($parametro == "todos" &&  $nivel_usu == 2){  // USUARIO ALUMNO
        $result = $cursoById->c_getViewMatriculaAlumno($id_usu);
    }
    elseif($parametro != 0){
        $result = $cursoById->c_getDetalleByDetalleId($parametro);
    }

    if($result){
        $mensaje = null;
        foreach($result as $cursoReg){
            // echo var_dump($cursoReg);
                echo    "<div class='item-curso'>";
                echo        "<div class='name-curso'>";
                    $cursoName = $cursoById->c_getCursosById($cursoReg['id_curso']);
                    
                    echo        "<h4>".$cursoName[0]['nombre_curso']."</h4>";
                    echo    "</div>";
                    echo    "<div class='descripcion-curso'>";
                    $horario = $cursoById->c_horarioByIdCurso($cursoReg['id_detallecp']);
                    
                    foreach($horario as $reg_horario){
                        echo    "<p>".$reg_horario['dia_asignado'].": ";
                        echo          $reg_horario['horainicio']." - ";
                        echo          $reg_horario['horafin'];
                        echo    "</p>";
                    }
                // // $habilitado = $cursoById->c_getCursosById($cursoReg['id_curso']);
                // // foreach($habilitado as $reg_habilitado){
                if($cursoReg['habilitado'] == 0){
                    echo        "<a class='btn-desactivado' href='".$ruta.$cursoReg['id_detallecp']."&activado=".$cursoReg['habilitado']."'>Habilitar en plataforma</a>";
                        } 
                    else 
                        {
                    echo        "<a class='btn-activado' href='".$ruta.$cursoReg['id_detallecp']."&activado=".$cursoReg['habilitado']."'>Deshabilitar en plataforma</a>";
                    }
                echo      "</div>";
                echo   "</div>";
        }
    }else{
        echo $mensaje;
    }
    

    
    
?>