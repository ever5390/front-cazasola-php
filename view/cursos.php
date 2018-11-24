<div>
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
</div>
       
