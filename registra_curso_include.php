<h1>REGISTRO DE CURSOS ASIGNADO SEGÙN MATRÌCULA</h1>
            <p><strong>Usuario: </strong><?php echo $_SESSION["usuario_registrado"]['nombres']; ?></p>            
           
           <p>Seleccione el curso a habilitar en plataforma:</p>            
           <select class="combo-box-cursos" onchange='valor()' id='miSelect'>
              <option value="0">--seleccione--</option>
            <?php
                $consulta_curso = new Cursos();
                $cursos = $consulta_curso->getCursos($id_user);
                if($cursos){
                    foreach($cursos as $curso){
                        echo "<option value='".$curso['id_curso']."'>".$curso['nombre_curso']."</option>";
                    }
                }
            ?>             
            </select>
            <div id="divData" class="cursos">
                <!-- <div class="cursos"> -->
                    
                 <!-- <div class="item-curso">
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
                </div>-->

                <!-- </div> -->
           </div>