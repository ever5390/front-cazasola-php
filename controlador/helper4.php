<?php
    // require 'modelo/class.conexion.php';
    // require_once './modelo/class.consultas_cursos.php';
    // require 'controller.cursos.php';

    require_once 'modelo/class.conexion.php';
    require_once 'modelo/class.consultas_cursos.php';
    require_once 'controller.cursos.php';
    $consulta = new Cursos();
    
    $cursos = array();
 
    echo "<select class='combo-box-cursos' id='miSelect' >";
    echo "<option value='0' >--seleccione--</option>";
          $cursos = $consulta->getCursos($id_user);
          echo var_dump($cursos);
          if($cursos){
              foreach($cursos as $curso){
                  echo "<option value='5'>".$curso['nombre_curso']."</option>";
                  //".$curso['id_curso']."   onchange='valor(this)'
              }
          }
                
    echo "</select>";
    echo "<div id='divData' class='cursos'>"
?>