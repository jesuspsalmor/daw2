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

<div class="form">
    <form action="/tarea14Cliente/equipos/form-crearObjeto" method="POST">
        <label for="localidad">Localidad:</label>
        <input type="text" id="localidad" name="localidad" required>

        <label for="nombreEquipo">Nombre del Equipo:</label>
        <input type="text" id="nombreEquipo" name="nombreEquipo" required>

        <button type="submit" name="crearEquipo">Crear</button>
    </form>
</div>

</body>
</html>

