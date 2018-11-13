
<aside class="bloque-menu">
        <img src="img/user-defecto.jpg" alt="imagen-user" class="img-user">
        <!-- <h4 style="text-align: center">Bienvenido</h4> -->
        <div class="box-user">
            <p class="datos-usuario">
                <?php
                    
                    echo $_SESSION["usuario_registrado"]['nombres'];
                ?>
            
            </p>
            <p class="datos-usuario">
               <?php
                    
                    echo $_SESSION["usuario_registrado"]['correo'];
                ?>
            </p>
            <p class="datos-usuario">
                <?php
                    
                    echo $_SESSION["usuario_registrado"]['telefono'];
                ?>
            </p>
        </div>
        <!-- fin bloque usuario -->
        <div class="menu-funciones">
            <ul>
                <li><a href="plataforma.php"><img src="img/icons/icon1.png"><label>Plataforma</label></a></li>
                <li><a href="cursos.php"><img src="img/icons/icon1.png"><label>Cursos</label></a></li>
                <?php
                    if($nivel_usu == 1) {
                        echo "<li><a href='lista-alumnos.php'><img src='img/icons/icon1.png'><label>Lista Alumnos</label></a></li>";
                    }
                ?>
                <li><a href="registro-curso.php"><img src="img/icons/icon1.png"><label>Registro Curso</label></a></li>
                <li><a href="cerrar-session.php"><img src="img/icons/icon1.png"><label>Cerrar Sesiòn</label></a></li>
            </ul>
        </div>
</aside>