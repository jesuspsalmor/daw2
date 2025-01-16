<?php
require("./php/conexionBD.php");

class Cliente{
    public $id;
    public $Nombre;
    public $apellido1;
    public $apellido2;
    public $dni;
    public $fecha_nacimiento;
    public $email;

    public function __construct($id,$nombre,$apellido1,$apellido2,$dni,$fecha_nacimiento,$email){
        $this->id = $id;
        $this->nombre=$nombre;
        $this->apellido1 =$apellido1;
        $this->apellido2=$apellido2;
        $this->dni=$dni;
        $this->fecha_nacimiento=$fecha_nacimiento;
        $this->email=$email;
    }
}
function cargarBBDD(){
    try{
        $conexion = new mysqli(IP,USER,CLAVE);
        $commands = file_get_contents("./php/clientes.sql");  
        $conexion->multi_query($commands);
    } catch(Exception $e){
        echo $e->getMessage();
    }finally{
        $conexion?->close();
    }
}
function createCliente($cliente){
    $correcto = 0;
    try{
        $conexion = new mysqli(IP,USER,CLAVE,BD);
        $consulta = $conexion->prepare("INSERT INTO clientes (nombre,apellido1,apellido2,dni,fecha_nacimiento,email) VALUES (?,?,?,?,?,?)");
        $consulta->bind_param("ssssss", $cliente->nombre, $cliente->apellido1,$cliente->apellido2,$cliente->dni,$cliente->fecha_nacimiento,$cliente->email);
        $consulta->execute();
        $correcto = 1;
    } catch (Exception $e){
        echo $e->getMessage();
    } finally{
        $consulta?->close();
        $conexion?->close();
    }
    return $correcto;
}
function readAll(){
    $clientes = [];
    try{
        $conexion = new mysqli(IP,USER,CLAVE,BD);
        $resultado = $conexion->query("SELECT * FROM clientes");
        while($fila = $resultado->fetch_assoc()){
            $cliente = new Cliente($fila["id"], $fila["nombre"], $fila["apellido1"], $fila["apellido2",$fila["dni"],$fila["fecha_nacimiento"],$fila["email"]]);
            $clientes[] = $cliente;
            //array_push($tareas, $tarea);
        }
    } catch (Exception $e){
        echo $e->getMessage();
    } finally{
        $conexion?->close();
    }
    return $clientes;
}

function updateCliente($cliente){
    $correcto = 0;
    try{
        $conexion = new mysqli(IP,USER,CLAVE,BD);
        $consulta = $conexion->prepare("UPDATE clientes SET nombre=?, apellido1=?, apellido2=?, dni=?,fecha_nacimiento=?,email=? WHERE id=?");
        $consulta->bind_param("ssssssi", $tarea->titulo, $tarea->descripcion, $tarea->hecho, $tarea->id);
        $consulta->execute();
        $correcto = 1;
    } catch (Exception $e){
        echo $e->getMessage();
    } finally{
        $consulta?->close();
        $conexion?->close();
    }
    return $correcto;
}

function deleteCliente($id){
    $correcto = 0;
    try{
        $conexion = new mysqli(IP,USER,CLAVE,BD);
        $consulta = $conexion->prepare("DELETE FROM clientes WHERE id = ?");
        $consulta->bind_param("i", $id);
        $consulta->execute();
        $correcto = 1;
    } catch (Exception $e){
        echo $e->getMessage();
    } finally{
        $consulta?->close();
        $conexion?->close();
    }
    return $correcto;
}

