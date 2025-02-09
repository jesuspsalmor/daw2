<?php

class DAOUsuario{
    public static function leerUsuarios(){
        try {
            $conexion = new PDO('mysql:host='.IP.';dbname='.DB, USER, PASS);
            $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "SELECT * FROM usuarios";
            $stmt = $conexion->prepare($sql);
            $stmt->execute();
            while($fila = $stmt->fetch()){
                $usuario = new Usuario($fila['id'], $fila['nombre'], $fila['apellidos'], $fila['email']);
                $usuarios[] = $usuario;
            }    
        } catch (\Throwable $th) {
            echo "Error: ".$th->getMessage();
        } finally {
            unset($stmt);
            unset($conexion);
        }
        return $usuarios;
    }

    public static function insertarUsuario($usuario){
        $correcto = true;
        try {
            $conexion = new PDO('mysql:host='.IP.';dbname='.DB, USER, PASS);
            $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "INSERT INTO usuarios (nombre, apellidos, email) VALUES (:nombre, :apellidos, :email)";
            $stmt = $conexion->prepare($sql);
            $stmt->bindParam(':nombre', $usuario->nombre);
            $stmt->bindParam(':apellidos', $usuario->apellidos);
            $stmt->bindParam(':email', $usuario->email);
            $stmt->execute();

        } catch (\Throwable $th) {
            echo "Error: ".$th->getMessage();
            $correcto = false;
        } finally {
            unset($stmt);
            unset($conexion);
        }
        return $correcto;
    }
    
}