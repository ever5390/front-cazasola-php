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
        $nivel_usu = $_SESSION["usuario_registrado"]['nivel'];
    ?>
    <div class="container">
        <div class="menu-oculto"><i class="fas fa-bars"></i></div>
        <?php
            include 'aside-usuario-info.php'
        ?>
        <section class="bloque-main">
            <h1>REGISTRO DE CURSOS ASIGNADO SEGÙN MATRÌCULA</h1>
            <p><strong>Prof: </strong><?php echo $_SESSION["usuario_registrado"]['nombres']; ?></p>            
           <p>Seleccione el curso a habilitar en plataforma:</p>
           <select class="combo-box-cursos">
              <option value="volvo">SISTEMAS DE INFORMACIÒN</option>
              <option value="saab">TEORIA GENERAL DE SISTEMAS</option>
              <option value="mercedes">LENGUAJE ENSAMBLADOR</option>
            </select>
           <div class="cursos">
                <div class="item-curso">
                    <div class="name-curso">
                        <h4>SISTEMAS DE INFORMACIÒN</h4>
                    </div>
                    <div class="descripcion-curso">
                    <p> Lunes : 8:30 - 15:20<br>
                        Lunes : 8:30 - 15:20<br>
                        Lunes : 8:30 - 15:20
                    </p>
                    <a href="plataforma.php">Habilitar en plataforma</a>
                    </div>
                </div>

                 <div class="item-curso">
                    <div class="name-curso">
                        <h4>TEORIA GENERAL DE SISTEMAS</h4>
                    </div>
                    <div class="descripcion-curso">
                    <p> Lunes : 8:30 - 15:20<br>
                        Lunes : 8:30 - 15:20<br>
                        Lunes : 8:30 - 15:20
                    </p>
                    <a href="plataforma.php">Habilitar en plataforma</a>
                    </div>
                </div>

                 <div class="item-curso">
                    <div class="name-curso">
                        <h4>LENGUAJE ENSAMBLADOR</h4>
                    </div>
                    <div class="descripcion-curso">
                    <p> Lunes : 8:30 - 15:20<br>
                        Lunes : 8:30 - 15:20<br>
                        Lunes : 8:30 - 15:20
                    </p>
                    <a href="plataforma.php">Habilitar en plataforma</a>
                    </div>
                </div>
           </div>
        </section>
    </div>
</body>
</html>