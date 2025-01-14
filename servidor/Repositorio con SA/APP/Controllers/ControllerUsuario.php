<?php
    include_once("/repositorio/Config/structure.php");
    include_once(validaciones."validacionesUsuario.php");
    include_once(models."Usuario.php");

    
    if(isset($_POST["formRegistro"])){
        $usuario = new Usuario(/* Datos */);
        $correcto = validarUsuarioRegistro($usuario);
        if($correcto){
            $registrado = SAUsuario::registro($usuario);
            if($registrado){
                //Guardo los datos de ese usuario en $_SESSION (login)
                //Redirijo index.php
            }
            else{
                //Redirijo al registro mostrando el error
            }
        } else {
            //Redirijo al registro mostrando errores
        }
    }

    if(isset($_POST["formLogin"])){
        //Logica para el inicio de sesion
    }

    if(isset($_POST["formLogout"])){
        //Logica para el inicio de sesion
    }

    
?>