<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Jugador</title>
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

<h1>Crear Jugador</h1>

<div class="form">
    <form action="/tarea14Cliente/jugadores/form-crearJugador" method="POST">
        <label for="codEquipo">Código del Equipo:</label>
        <input type="number" id="codEquipo" name="codEquipo" required><br>

        <label for="nombre">Nombre del Jugador:</label>
        <input type="text" id="nombre" name="nombre" required><br>

        <label for="posicion">Posición:</label>
        <select id="posicion" name="posicion" required>
            <option value="Portero">Portero</option>
            <option value="Defensa">Defensa</option>
            <option value="Centrocampista">Centrocampista</option>
            <option value="Delantero">Delantero</option>
        </select><br>

        <label for="sueldo">Sueldo:</label>
        <input type="number" id="sueldo" name="sueldo" required><br>

        <button type="submit">Crear</button>
    </form>
</div>

<?php if (isset($mensaje)): ?>
    <p><?= $mensaje; ?></p>
<?php endif; ?>

</body>
</html>

