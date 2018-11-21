<?php
    // require_once '../controller/controller_courses.php';

    // $cursoById = new Cursos();
    // session_start();
    // $id_usu = $_SESSION["usuario_registrado"]['id_usuario'];
    // $nivel_usu = $_SESSION["usuario_registrado"]['nivel']; //para el aside

    // $cont = 0;
    // if(isset($_GET['val'])){
    //     $parametro = $_GET['val'];
    // }
    /**dddd */

//     session_start();
//     require_once '../model/DAO_connection.php';
//     require_once '../model/DAO_users.php';
//     require_once '../model/DAO_files.php';
//     require_once '../controller/controller_files.php';
//     require_once '../controller/controller_users.php';
//     require_once '../model/DAO_courses.php';
//     require_once '../controller/controller_courses.php';

//     $nivel_usu = $_SESSION["usuario_registrado"]['nivel'];
//     $id_usu = $_SESSION["usuario_registrado"]['id_usuario'];
//     $archivo = new Archivos();
//     $consultas = new Usuarios();
//     $cursos = new Cursos();
//     $alumnos = array();
//     $curso = null;

//     //Obtener Lista de Alumnos que descargaron dichos archivos. Buscando por IdArchivo en tabla Descargas.

//     if(isset($_GET['val'])) {
//         $regArchivo = $_GET['val'];
//         $alumnos = $archivo->c_getDescargasByIdArchivo($id_archivo);
//     }4
//     // if(isset($_GET['idFile'])) {
//     //     $id_archivo = $_GET['idFile'];
//     //     $alumnos = $archivo->c_getDescargasByIdArchivo($id_archivo);
//     // }
//     // if(isset($_GET['idcurso'])) {
//     //     $idcurso = $_GET['idcurso'];
//     //     $curso = $cursos->c_getCursosById($idcurso);
//     // }





//     /**dddd */


//     echo "<h4>CUR_".$curso[0]['id_curso']." ". $curso[0]['nombre_curso']."</h4><br>";
//     $filename = $archivo->c_getFileByIdFile($id_archivo);
//     echo "<span>".$filename[0]['titulo']."</span>";
// ?>
<!-- //     <table>
//     <thead>
//         <th>Nro</th>
//         <th>Código</th>
//         <th>Nombres y Apellidos</th>
//         <th>Correo</th>
//         <th>Fecha Descarga</th>
//     </thead>
//     <tbody>
//     <?php -->
//     if($alumnos != null){
//         $indice=1;
//         foreach($alumnos as $alumno){
//             $registroAlumno = $consultas->c_cargarUsuariosByUserId($alumno['id_usuario']);
//     ?>
//         <tr>
//             <td><?php echo $indice ?></td> 
//             <td>COD_ALU_<?php echo $registroAlumno[0]['id_usuario'] ?></td>
//             <td class="td-nombres"><?php echo $registroAlumno[0]['nombres'] ?></td>
//             <td><?php echo $registroAlumno[0]['correo'] ?></td>
//             <td><?php echo $alumno['fecha_descarga']?></td>
//         </tr>
//     <?php
//         $indice++;
//         }
//     }
//     ?>
//     </tbody>
// </table>

    
    
?>