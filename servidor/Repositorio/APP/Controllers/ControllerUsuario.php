<?php
    include_once("/repositorio/Config/structure.php");
    include_once(validaciones."validacionesUsuario.php");
    include_once(models."Usuario.php");
    include_once(DAO."DAOUsuario.php");

    
    if(isset($_POST["formRegistro"])){
        $correcto = validarUsuarioRegistro(/* Datos */);
        if($correcto){
            $usuario = new Usuario(/* Datos */);

            //Usando DAO como clase
            //$daoUsuario = new DAOUsuario();
            //$daoUsuario->registroUsuario($usuario);

            //Usando DAO como static
            $registrado = DAOUsuario::registroUsuario($usuario);
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