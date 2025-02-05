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
        <li><a href="/tarea14Cliente/jugadores/form-buscarJugadores">Buscar Jugadores</a></li>
        <li><a href="/tarea14Cliente/jugadores/form-verJugadores">Ver todos los jugadores</a></li>
        <li><a href="/tarea14Cliente/jugadores/form-crearJugadores">Crear Jugador</a></li>
        <li><a href="/tarea14Cliente/equipos/form-verEquipos">Ver todos los equipos</a></li>
        <li><a href="/tarea14Cliente/equipos/form-crearEquipo">Crear Equipo</a></li>
        <li><a href="/tarea14Cliente/equipos/form-buscarEquipo">Buscar Equipo</a></li>
    </ul>
</nav>
<div class="form">
    <form action="/tarea14Cliente/equipos/form-verEquipos" method="POST">
        <label for="id">ID del Equipo:</label>
        <input type="number" id="id" name="id" required><br>

        <button type="submit" name="buscarId">Buscar</button>
    </form>
</div>
</body>
</html>