<?php
 include("Config/conexionBDDefecto.php");
 mysqli_report(MYSQLI_REPORT_ERROR|MYSQLI_REPORT_STRICT);
    
    function ComprobarNombreDeUsuario($nombreUsuario){
        
        try{
            $conexion = new mysqli(IP,USER,CLAVE,BD);
            $resultado = $conexion->query("SELECT usuario FROM usuarios WHERE  usuario =?");
            $consulta->bind_param("s",$nombreUsuario );
            $consulta->execute();
        } catch(Exception $e){
            echo $e->getMessage(); 
        }finally{
                $conexion->close();
        }
            return $resultado ;
    }
  
        

    
 
 function leerUsuario($usuario){

 }
 function CrearUsuario($usuario){

 }
 function actualizarUsuario($usuario){

 }
 function BorrarUsuario($usuario){

 }
?>