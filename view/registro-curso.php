<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Raleway|Work+Sans" rel="stylesheet">     <title>plataforma-administrativa</title>
    <link rel="stylesheet" href="../library/css/estilos_generales.css">
    <script src="../library/js/javascript.js"></script>
    <script src="../library/js/jquery.min.js"></script>
</head>
<body>
    <?php

        require_once '../model/DAO_connection.php';
        require_once '../model/DAO_courses.php';
        require_once '../controller/controller_courses.php';

        session_start();
        $consulta = new Cursos();
        $cursos = array();

        $nivel_usu = $_SESSION["usuario_registrado"]['nivel']; //para el aside
        $id_user = $_SESSION["usuario_registrado"]['id_usuario'];

        $cursos = $consulta->c_getDetalleViewByUser($id_user);
    ?>
    <div class="container">
        <?php
            include 'aside-usuario-info.php'
        ?>
        <div class="menu-oculto"><i class="fas fa-bars"></i></div>

        <section class="bloque-main">
           <h1>REGISTRO DE CURSOS ASIGNADO SEGÙN MATRÌCULA</h1>
           <p><strong>Usuario: </strong><?php echo $_SESSION["usuario_registrado"]['nombres']; ?></p>

           <p>Seleccione el curso a habilitar en plataforma:</p>
           <select class="combo-box-cursos" onchange="valor(this)" id="miSelect">
              <option value='0'>--seleccione--</option>
                <?php
                    if($cursos){
                        foreach($cursos as $curso){
                            echo "<option value='".$curso['id_detallecp']."'>".$curso['nombre_curso']."</option>";
                        }
                    }
                ?>
            </select>
            <button value="" onclick ="valor(this)" id="btn_cursos">Ver Todos</button>

            <div id="divData" class="cursos"></div>

        </section>

    </div>
</body>
</html>