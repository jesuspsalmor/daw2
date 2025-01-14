<?php
    include_once(models."Usuario.php");
    include_once(DAO."DAOUsuario.php");

    
    class SAUsuario{
        public static function registro($usuario){
            $registrado = DAOUsuario::registroUsuario($usuario);
            return $registrado;
        }
    }
?>