<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="estilo-plataforma.css">
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

        <?php
            include 'aside-usuario-info.php';
        ?>
        <div class="menu-oculto"><i class="fas fa-bars"></i></div>

        <section class="bloque-main">
           <h1>LISTA DE ALUMNOS CON PARTICIPACIÒN ACTIVA</h1>
           <p><strong>Prof: </strong><?php echo $_SESSION["usuario_registrado"]['nombres']; ?></p>                   <p>Seleccione la fuente de archivo para mostrar la lista correspondiente:</p>
           <select class="combo-box-cursos">
              <option value="volvo">SYLLABUS</option>
              <option value="saab">ARCHIVO NRO 1</option>
              <option value="mercedes">ARCHIVO NRO 2</option>
            </select>
           <div class="cursos">
                <table>
                    <thead>
                        <th>CODIGO</th>
                        <th>NOMBRES COMPLETOS</th>
                        <th>FECHA DESCARGA</th>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1415210276</td>
                            <td class="td-nombres">Ever Rosales Peña</td>
                            <td>10-12-2018</td>
                        </tr>
                         <tr>
                            <td>1415210276</td>
                            <td>Ever Rosales Peña</td>
                            <td>10-12-2018</td>
                        </tr>
                        <tr>
                            <td>1415210276</td>
                            <td>Ever Rosales Peña</td>
                            <td>10-12-2018</td>
                        </tr>                       
                    </tbody>
                </table>
           </div>
        </section>
    </div>
</body>
</html>