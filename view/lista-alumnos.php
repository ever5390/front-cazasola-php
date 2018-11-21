<?php
    session_start();
    require_once '../model/DAO_connection.php';
    require_once '../model/DAO_users.php';
    require_once '../model/DAO_files.php';
    require_once '../controller/controller_files.php';
    require_once '../controller/controller_users.php';
    require_once '../model/DAO_courses.php';
    require_once '../controller/controller_courses.php';

    $nivel_usu = $_SESSION["usuario_registrado"]['nivel'];
    $id_usu = $_SESSION["usuario_registrado"]['id_usuario'];
    $archivo = new Archivos();
    $consultas = new Usuarios();
    $cursos = new Cursos();
    $alumnos = array();
    $curso = null;

    //Obtener Lista de Alumnos que descargaron dichos archivos. Buscando por IdArchivo en tabla Descargas.

    if(isset($_GET['idFile'])) {
        $id_archivo = $_GET['idFile'];
        $alumnos = $archivo->c_getDescargasByIdArchivo($id_archivo);
    }
    if(isset($_GET['idcurso'])) {
        $idcurso = $_GET['idcurso'];
        $curso = $cursos->c_getCursosById($idcurso);
    }

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
            <h2>LISTA DE ALUMNOS CON DESCARGAS ACTIVAS</h2>
            <p><strong>Prof: </strong><?php echo $_SESSION["usuario_registrado"]['nombres']; ?></p> 

            <div class="box-lista">
               <?php
                    if($alumnos){
                        echo "<h4>CUR_".$curso[0]['id_curso']." ". $curso[0]['nombre_curso']."</h4><br>";
                        $filename = $archivo->c_getFileByIdFile($id_archivo);
                        echo "<span>".$filename[0]['titulo']."</span>";
                ?>
                        <table>
                        <thead>
                            <th>Nro</th>
                            <th>Código</th>
                            <th>Nombres y Apellidos</th>
                            <th>Correo</th>
                            <th>Fecha Descarga</th>
                        </thead>
                        <tbody>
                        <?php
                        if($alumnos != null){
                            $indice=1;
                            foreach($alumnos as $alumno){
                                $registroAlumno = $consultas->c_cargarUsuariosByUserId($alumno['id_usuario']);
                        ?>
                            <tr>
                                <td><?php echo $indice ?></td> 
                                <td>COD_ALU_<?php echo $registroAlumno[0]['id_usuario'] ?></td>
                                <td class="td-nombres"><?php echo $registroAlumno[0]['nombres'] ?></td>
                                <td><?php echo $registroAlumno[0]['correo'] ?></td>
                                <td><?php echo $alumno['fecha_descarga']?></td>
                            </tr>
                        <?php
                            $indice++;
                            }
                        }
                        ?>
                        </tbody>
                    </table>
                <?php
                    }else{
                       echo "<p>Seleccione el archivo para mostrar la lista correspondiente:</p>";
                       $cursosByProfesor = $cursos->c_getDetalleViewByUser($id_usu);
                       echo " <select class='combo-box-cursos' onchange='valor2(this)' id='miSelect2'>";
                       echo "    <option value = '0'>--Seleccione--</option>";
                       if($cursosByProfesor){
                            foreach($cursosByProfesor as $cursos){
                                echo "<option value='".$cursos['id_detallecp']."'>".$cursos['nombre_curso']."</option>";
                            }
                        }
                       echo " </select>";
                       echo " <div id='divData2'></div>";
                    }
                ?>
           </div>
        </section>
    </div>
</body>
</html>
