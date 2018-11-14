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
        session_start();
        require_once ('modelo/class.conexion.php');
        require_once ('modelo/class.consultas_cursos.php');
        require_once ('controlador/controller.cursos.php');
        $id_user = $_SESSION["usuario_registrado"]['codigo'];
        $nivel_usu = $_SESSION["usuario_registrado"]['nivel'];
        $ruta = "plataforma.php";
    ?>
    <div class="container">
        <div class="menu-oculto"><i class="fas fa-bars"></i></div>
        <?php
            include 'aside-usuario-info.php'
        ?>
        <section class="bloque-main">
        <?php
            include 'registra_curso_include.php'
        ?>  
        </section>
    </div>
</body>
</html>