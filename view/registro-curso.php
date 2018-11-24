
           <h1>REGISTRO DE CURSOS ASIGNADOS SEGÙN MATRÌCULA</h1>
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
           <!-- <span>Seleccione el curso a habilitar en plataforma:</span> -->
           <?php
            if($nivel_usu == 1){  // PARA CASO  PROFESOR 
                $cursos = $c_cursos->c_getDetalleViewByUser($id_user);
           ?>
                <select class="combo-box-cursos" onchange="valor(this)" id="miSelect">
                    <option value='0'>--seleccione--</option>
                    <?php
                        if($cursos){
                            foreach($cursos as $curso){
                                echo "<option value='".$curso['id_detallecp']."'>".$curso['nombre_curso']."</option>";
                            }
                        }
                    ?>
                </select>
            <?php
            } else { // PARA CASO ALUMNO
                $cursos = $c_cursos->c_getMatriculaAlumno($id_user);
           ?>
                <select class="combo-box-cursos" onchange="valor(this)" id="miSelect">
                    <option value='0'>--seleccione--</option>
                    <?php
                    foreach($cursos as $curso){
                        $matricula = $c_cursos->getDetalleViewBDetalleId($curso['id_detallecp']);
                   
                        if($matricula){
                            foreach($matricula as $reg_matricula){
                                echo "<option value='".$reg_matricula['id_detallecp']."'>".$reg_matricula['nombre_curso']."</option>";
                            }
                        }
                    }
                    ?>
                </select>
            <?php
            } 
           ?>
            <button value="" onclick ="valor(this)" id="btn_cursos">Ver Todos</button>

            <div id="divData" class="cursos"></div>

        </section>
