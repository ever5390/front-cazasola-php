<?php
    require_once '../modelo/class.conexion.php';
    require_once '../modelo/class.consultas_cursos.php';
    require_once 'controller.cursos.php';
    
    session_start();
    
    $param = $_GET['val'];
    echo $param;
    $cont = 0;
    $cursoById = new Cursos();
    $ruta = "../plataforma.php";

    $result = $cursoById->getCursosById($param);

    $array_cursos = array();

    // if( !isset($_SESSION['lista']) ){
    //     $_SESSION['lista'] = $array_cursos;
    // }
    // else{
    //     $array_cursos = $_SESSION['lista'];
    //     array_push($array_cursos, 'cabeza');
    //     $_SESSION['lista'] = $array_cursos;
    // }
    // echo "session lista";
    // echo var_dump($_SESSION['lista']);

    if($result){
        foreach($result as $registro){
            // if($cont<1){
                if(isset($_SESSION['lista_cursos'])){
                    // echo "si existe";
                    $array_cursos = $_SESSION['lista_cursos'];
                    array_push($array_cursos, $registro);
                    $_SESSION['lista_cursos'] = $array_cursos;
                }else{
                    array_push($array_cursos, $registro);
                    $_SESSION['lista_cursos'] = $array_cursos;
                }
            //}
            $cont++;
        } 

    };
    // header('Location: ../registra_curso_include.php');
//echo var_dump($_SESSION['lista_cursos']);
    $cont = 0;
    if(isset($_SESSION['lista_cursos'])){
        
        foreach($_SESSION['lista_cursos'] as $registro){
            


            if($cont<1){
            echo "<div class='item-curso'>";
                echo "<div class='name-curso'>";
                echo     "<h4>".$registro['nombre_curso']."</h4>";
                echo "</div>";
                echo "<div class='descripcion-curso'>";
            for($i = 0; $i<sizeof($_SESSION['lista_cursos']); $i++){
                echo     "<p>".$registro[$i]['dia_asignado']." : ".$registro[$i]['horainicio']." - ". $registro[$i]['horafin']."</p>";
            }
            
            echo        "<a href=".$ruta.">Habilitar en plataforma</a>";
            echo      "</div>";
            echo "</div>";
            }
            $cont++;
        }

    }
    
?>