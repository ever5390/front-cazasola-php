<div>
        <img id="imagen_usuario" src="../uploads/user_images/<?php echo $_SESSION['usuario_registrado']['imagen'] ?>" alt="imagen-user" class="img-user">
        <div class="box-user">
            <p class="datos-usuario">
                <?php
                    echo "<img src='../uploads/icons/user.png'><label>".$_SESSION["usuario_registrado"]['nombres']."</label>";
                ?>
            </p>
            <p class="datos-usuario">
               <?php 
                    echo "<img src='../uploads/icons/mail.png'><label>".$_SESSION["usuario_registrado"]['correo']."</label>";
                ?>
            </p>
            <p class="datos-usuario">
                <?php
                    echo "<img src='../uploads/icons/phone.png'><label>".$_SESSION["usuario_registrado"]['telefono']."</label>";
                ?>
            </p>
        </div>
        <!-- fin bloque usuario -->
        <div class="menu-funciones">
            <ul>
                <li><a href="plataforma.php?ruta=cursos"><img src="../uploads/icons/courses.png"><label>Cursos</label></a></li>
                <?php
                    if($nivel_usu == 1) {
                        echo "<li><a href='plataforma.php?ruta=listaAlumnos'><img src='../uploads/icons/users.png'><label>Lista Alumnos</label></a></li>";
                    }
                ?>
                <li><a href="plataforma.php?ruta=registroCursos"><img src="../uploads/icons/register.png">    
                    <label>Registro Curso</label></a>
                </li>
                <li><a href="cerrar-session.php"><img src="../uploads/icons/close-session.png"><label>Cerrar Sesiòn</label></a></li>
            </ul>
        </div>
</div>
