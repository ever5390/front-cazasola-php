         <?php
            $consulta = new Cursos();
            $id_user = $_SESSION["usuario_registrado"]['codigo'];
            $cursos = array();
            $cursos = $consulta->getCursos($id_user);
        ?>
           <h1>REGISTRO DE CURSOS ASIGNADO SEGÙN MATRÌCULA</h1>
           <p><strong>Usuario: </strong><?php $_SESSION["usuario_registrado"]['nombres']?></p>        
           <p>Seleccione el curso a habilitar en plataforma:</p>
           <select class="combo-box-cursos" onchange="valor(this)" id="miSelect">
                <option value="0">--seleccione--</option>
        <?php
            foreach($cursos as $curso){ 
                echo "<option value='".$curso['id_curso']."'>".$curso['nombre_curso']."</option>";
            }
        ?>
           </select>
           <div id='divData' class='cursos'>
           </div>
        </section>