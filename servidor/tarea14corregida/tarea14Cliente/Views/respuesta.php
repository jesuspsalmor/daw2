<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LIGA</title>
    <link rel="stylesheet" href="../Public/styles.css">
   
    
</head>
<body>

<nav>
    <ul>
        <li><a href="/tarea14Cliente/jugadores/form-buscarObjetos">Buscar Jugadores</a></li>
        <li><a href="/tarea14Cliente/jugadores/form-verObjetos">Ver todos los jugadores</a></li>
        <li><a href="/tarea14Cliente/jugadores/form-crearObjetos">Crear Jugador</a></li>
        <li><a href="/tarea14Cliente/equipos/form-verObjetos">Ver todos los equipos</a></li>
        <li><a href="/tarea14Cliente/equipos/form-crearObjetos">Crear Equipo</a></li>
        <li><a href="/tarea14Cliente/equipos/form-buscarObjetos">Buscar Equipo</a></li>
    </ul>
</nav>
<?php
     if (isset($mensaje) && $mensaje) {
        echo '<div class="message"><h2>' . $mensaje . '</h2></div>';
    }
 ?>  
</body>
</html>
