<?php
include_once ('Model/Persona.php');
include_once ('Config/config.php');
class DAOPersona{
    public static function getPersonas(){
        $personas = [];
        try {
            $con = new PDO("mysql:host=".IP.";dbname=".DB, USER, PASS);
            $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $con->prepare("select * from usuarios");
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $stmt->execute();
            while ($row = $stmt->fetch()) {
                $persona = new Persona($row['id'], $row['nombre'], $row['apellido'], $row['dni']);
                array_push($personas, $persona);
            }
        } catch (Exception $e) {
            echo $e->getMessage();
        }finally{
            unset($stmt);
            unset($con);
        }
        return $personas;
    }

    public static function getPersona($id){
        $persona = null;
        try {
            $con = new PDO("mysql:host=".IP.";dbname=".DB, USER, PASS);
            $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $con->prepare("select * from usuarios where id = :id");
            $stmt->bindParam(':id', $id);
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $stmt->execute();
            $row = $stmt->fetch();
            $persona = new Persona($row['id'], $row['nombre'], $row['apellido'], $row['dni']);
        } catch (Exception $e) {
            echo $e->getMessage();
        }finally{
            unset($stmt);
            unset($con);
        }
        return $persona;
    }
}