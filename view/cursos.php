<?php
    session_start();
    if(!$_SESSION["usuario_registrado"]){
        header('Location: ../index.html');    
    }
    $nivel_usu = $_SESSION["usuario_registrado"]['nivel'];
    $id_user = $_SESSION["usuario_registrado"]['id_usuario'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Raleway|Work+Sans" rel="stylesheet">     <title>plataforma-administrativa</title>
    <link rel="stylesheet" href="../library/css/estilos_generales.css">
    <script src="../library/js/jquery.min.js"></script>
    <script src="../library/js/javascript.js"></script>
</head>
<body>
    <div class="container">
         <?php
            include 'aside-usuario-info.php';
        ?>
        <div class="menu-oculto"><i class="fas fa-bars"></i></div>

        <section class="bloque-main">
           <h1>LISTA DE CURSOS ASIGNADOS</h1>
           <p>
            <?php 
                if($nivel_usu == 1){
                    echo "<strong>Profesor: </strong>";
                } else {
                    echo "<strong>Alumno(a): </strong>";
                }
                echo $_SESSION["usuario_registrado"]['nombres']; 
            ?>
            </p>        
            <div id="divData" class="cursos">
            <?php
                require_once '../services/helper3.php';
            ?>
            </div>
        </section>
    </div>
</body>
</html>