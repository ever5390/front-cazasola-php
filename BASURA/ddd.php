<?php
   
    // session_start();
    require_once '../modelo/class.conexion.php';
    require_once '../modelo/class.consultas_cursos.php';
    require_once 'controller.cursos.php';
    $param = $_GET['param'];
    echo $param;
    



    header('Location: ../registro-curso.php?valor=55');
    // $cont = 0;
    // $repetida = false;
    // $cursoById = new Cursos();
    // $ruta = "../plataforma.php";

    // $result = $cursoById->getCursosById($param);

    // $array_cursos = array();
    // $array_horario = array();

    // if($result){
    //     foreach($result as $registro){
    //         $repetida = false;
    //             if(isset($_SESSION['curso'])){

    //                 foreach($_SESSION['curso'] as $curso){
    //                     if($curso['nombre_curso'] == $registro['nombre_curso'] ){
    //                         $repetida = true;
    //                     }
    //                 }
    //                 // SI ENCUENTRA EN LA SGTE ITEM UNO REPETIDO NO ALMACENA NADA Y SALE DE LA SECUENCIA.
    //                 if($cont == 0 && $repetida == true){
    //                     break;
    //                 } else {
    //                     if($cont < 1){
    //                         $array_cursos = $_SESSION['curso'];
    //                         array_push($array_cursos, $registro);
    //                         $_SESSION['curso'] = $array_cursos;
    //                     }

    //                     $array_horario = $_SESSION['horario'];
    //                     array_push($array_horario, $registro);
    //                     $_SESSION['horario'] = $array_horario;
    //                 }

    //             }else{
    //                 array_push($array_cursos, $registro);
    //                 array_push($array_horario, $registro);
    //                 $_SESSION['curso'] = $array_cursos;
    //                 $_SESSION['horario'] = $array_horario;
    //             }
    //         //}
    //         $cont++;
    //     } 

    // };

    // if(isset($_SESSION['curso'])){
        
    //     foreach($_SESSION['curso'] as $curso){
            
    //         echo "<div class='item-curso'>";
    //             echo "<div class='name-curso'>";
    //             echo     "<h4>".$curso['nombre_curso']."</h4>";
    //             echo "</div>";
    //             echo "<div class='descripcion-curso'>";
    //             foreach($_SESSION['horario'] as $horario){
    //                 if( $horario['nombre_curso'] == $curso['nombre_curso'] ){
    //                     echo "<p>".$horario['dia_asignado']." : ".$horario['horainicio']." - ". $horario['horafin']."</p>";
    //                 }
    //             }            
    //         echo        "<a href=".$ruta.">Habilitar en plataforma</a>";
    //         echo      "</div>";
    //         echo "</div>";
    //     }

    // }

        // if(isset($_SESSION['curso'])){
        
        // foreach($result as $curso){
        //     if($cont < 1){
        //         echo "<div class='item-curso'>";
        //             echo "<div class='name-curso'>";
        //             echo     "<h4>".$curso['nombre_curso']."</h4>";
        //             echo "</div>";
        //             echo "<div class='descripcion-curso'>";
        //             // foreach($_SESSION['horario'] as $horario){
        //             //     if( $horario['nombre_curso'] == $curso['nombre_curso'] ){
        //             //         echo "<p>".$horario['dia_asignado']." : ".$horario['horainicio']." - ". $horario['horafin']."</p>";
        //             //     }
        //             // }            
        //         echo        "<a href=".$ruta.">Habilitar en plataforma</a>";
        //         echo      "</div>";
        //         echo "</div>";
        //     }
        //     $cont++;
        // }

        // if($result){
        //     foreach($result as $registro){
        //         $repetida = false;
        //             if(isset($_SESSION['curso'])){
    
        //                 foreach($_SESSION['curso'] as $curso){
        //                     if($curso['nombre_curso'] == $registro['nombre_curso'] ){
        //                         $repetida = true;
        //                     }
        //                 }
        //                 // SI ENCUENTRA EN LA SGTE ITEM UNO REPETIDO NO ALMACENA NADA Y SALE DE LA SECUENCIA.
        //                 if($cont == 0 && $repetida == true){
        //                     break;
        //                 } else {
        //                     if($cont < 1){
        //                         $array_cursos = $_SESSION['curso'];
        //                         array_push($array_cursos, $registro);
        //                         $_SESSION['curso'] = $array_cursos;
        //                     }
    
        //                     $array_horario = $_SESSION['horario'];
        //                     array_push($array_horario, $registro);
        //                     $_SESSION['horario'] = $array_horario;
        //                 }
    
        //             }else{
        //                 array_push($array_cursos, $registro);
        //                 array_push($array_horario, $registro);
        //                 $_SESSION['curso'] = $array_cursos;
        //                 $_SESSION['horario'] = $array_horario;
        //             }
        //         //}
        //         $cont++;
        //     };
    
        // };
    //}