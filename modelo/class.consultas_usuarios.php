<?php

    class ConsultasUsuarios{

        public function cargarUsuarios($user, $pass){
            $rows = null;
            $modelo = new Conexion();
            $conexion = $modelo->get_conexion();
            $sql="select * from usuario where usuario = :user and contrasena = :pass";
            $statement = $conexion->prepare($sql);
            $statement->bindParam(":user", $user);
            $statement->bindParam(":pass", $pass);
            $statement->execute();
            while($result = $statement->fetch()){
                $rows[] = $result;
            }
            // $modelo->close_conexion();
            return $rows;
        }
    }

?>