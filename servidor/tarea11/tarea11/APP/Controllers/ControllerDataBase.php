<?php


include("Config/conexionBDDefecto.php");
mysqli_report(MYSQLI_REPORT_ERROR|MYSQLI_REPORT_STRICT);
try{
    $conexion= new mysqli(IPD,USERD,CLAVED,BDD);
    $conexion->close();
}catch(Exception $e){
    try {
        $conexion=new mysqli(IPD,USERD,CLAVED);
        $commands=file_get_contents("Config/tiendaServ.sql");
    
        
        $conexion->multi_query($commands);
        $conexion->close();
    
    } catch (\Throwable $th) {
        echo $th;
    }
}



    
?>

