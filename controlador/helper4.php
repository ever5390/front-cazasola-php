<?php
    // require 'modelo/class.conexion.php';
    // require_once './modelo/class.consultas_cursos.php';
    // require 'controller.cursos.php';

    require_once 'modelo/class.conexion.php';
    require_once 'modelo/class.consultas_cursos.php';
    require_once 'controller.cursos.php';
    $consulta = new Cursos();
    $id_user = $_SESSION["usuario_registrado"]['codigo'];
    $cursos = array();

    echo '<h1>REGISTRO DE CURSOS ASIGNADO SEGÙN MATRÌCULA</h1>';
    echo "<p><strong>Usuario: </strong><".$_SESSION["usuario_registrado"]['nombres']."</p>";            
    echo "<p>Seleccione el curso a habilitar en plataforma:</p>";       
    echo "<select class='combo-box-cursos' onchange='valor(this)' id='miSelect'>";
    echo "<option value='0'>--seleccione--</option>";
          $cursos = $consulta->getCursos($id_user);
          echo var_dump($cursos);
          if($cursos){
              foreach($cursos as $curso){
                  echo "<option value='".$curso['id_curso']."'>".$curso['nombre_curso']."</option>";
              }
          }
                
    echo "</select>";
    echo "<div id='divData' class='cursos'>"
?>