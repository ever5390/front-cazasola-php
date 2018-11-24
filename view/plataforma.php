<?php   
    session_start();
    if(!$_SESSION["usuario_registrado"]){
        header('Location: ../index.html');    
    }
    /** Almacenamos datos de session */
    $nivel_usu = $_SESSION["usuario_registrado"]['nivel'];
    $id_user = $_SESSION["usuario_registrado"]['id_usuario'];

    /** Incluimos informaciòn de controladores */
    require_once '../controller/controller_files.php';
    require_once '../controller/controller_users.php';
    require_once '../controller/controller_courses.php';

    /* Instanciamos objetos a utilizar */
    $c_cursos = new Cursos();
    $c_archivos = new Archivos();
    $c_usuarios =  new Usuarios();

    /* Inicializamos variables */
    $result = null;
    $mensaje = null;
    $alumnos = null;
    $curso = null;
    $id_detalle = 0;

    /** Identificamos si s pasan o no paràmetros por URL y almacenamos si fuera el caso */
    if(isset($_GET['idDetalleProf'])) {
        $id_detalle = $_GET['idDetalleProf'];
    }

    if(isset($_GET['idFile'])) {
        $id_archivo = $_GET['idFile'];
        $alumnos = $c_archivos->c_getDescargasByIdArchivo($id_archivo);
    }

    if(isset($_GET['ruta'])){
        $seccion_administrar = $_GET['ruta'];
    }

    if(isset($_GET['idcurso'])) {
        $idcurso = $_GET['idcurso'];
        $curso = $c_cursos->c_getCursosById($idcurso);
    }

    if(isset($_GET['mensaje'])){
        $mensaje = $_GET['mensaje'];
    }

    if(isset($_GET['idDetalleProf'])){
        $id_detalle = $_GET['idDetalleProf'];
        $result = $c_cursos->getDetalleViewBDetalleId($id_detalle);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous"> -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans|Roboto" rel="stylesheet"> 
    <link rel="stylesheet" href="../library/css/estilos_generales.css">
    <script src="../library/js/jquery.min.js"></script>
    <script src="../library/js/javascript.js"></script>
    <title>plataforma-administrativa</title>
</head>
<body>
    <div class="container">
        <aside class="bloque-menu">
            <?php
            include 'aside-usuario-info.php';
            ?>
        </aside>
        <section class="bloque-main">
            <?php
                switch($seccion_administrar){
                case  "cursos":
                    include 'cursos.php';
                break;
                case  "listaAlumnos":
                    include "lista-alumnos.php";
                break;
                case "registroCursos":
                    include 'registro-curso.php';
                break;
                case "gestionArchivos":
                    include 'administracionArchivos.php';
                break;
                default:
                    include 'cursos.php';
                break;
                }
            ?>
        </section>
        <div class="menu-oculto"><i class="fas fa-bars"></i></div>
    </div>
</body>
</html>