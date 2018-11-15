<?php
    session_start();
    require 'modelo/class.conexion.php';
            require_once 'modelo/class.consultas_cursos.php';
            require 'controlador/controller.cursos.php';
// require 'controlador/controller.cursos.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="estilo-plataforma.css">
    <link rel="stylesheet" href="estilo-cursos.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Raleway|Work+Sans" rel="stylesheet">     <title>plataforma-administrativa</title>
    <script src="jquery.min.js"></script>
    <script src="javascript.js"></script>

</head>
<body>
    <?php
        $nivel_usu = $_SESSION["usuario_registrado"]['nivel']; //para el aside 
    ?>
    <div class="container">
        <div class="menu-oculto"><i class="fas fa-bars"></i></div>
        <?php
            include 'aside-usuario-info.php'
        ?>
        <section class="bloque-main">
        <?php
            
            $consulta = new Cursos();
            $id_user = $_SESSION["usuario_registrado"]['codigo'];
            $cursos = array();
            $cursos = $consulta->getCursos($id_user);
        ?>

           <h1>REGISTRO DE CURSOS ASIGNADO SEGÙN MATRÌCULA</h1>
           <p><strong>Usuario: </strong><?php $_SESSION["usuario_registrado"]['nombres']?></p>        
           <p>Seleccione el curso a habilitar en plataforma:</p>
           <select class="combo-box-cursos" onchange="valor(this)" id="miSelect">
                <option value="0">--seleccione--</option>
        <?php
                foreach($cursos as $curso){
                    echo $curso['id_curso']."<br>";
                    echo $curso['nombre_curso']."<br>";
                    echo "<option value='".$curso['id_curso']."'>".$curso['nombre_curso']."</option>";
                }
        ?>
           </select>
           <div id='divData' class='cursos'>

        </section>
    </div>
</body>
</html>