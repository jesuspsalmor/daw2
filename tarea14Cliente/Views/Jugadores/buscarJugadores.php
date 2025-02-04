<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buscar Jugadores</title>
    <link rel="stylesheet" href="../styles.css">
 
</head>
<body>
<nav>
        <ul>
            <li><a href="./buscarJugadores">Buscar Jugadores</a></li>
            <li><a href="./vertodosJugadores">Ver todos los jugadores</a></li>
            <li><a href="./crearJugador">Crear Jugador</a></li>
            <li><a href="./verEquipos">Ver todos los equipos</a></li>
            <li><a href="./crearEquipo">Crear Equipo</a></li>
        </ul>
    </nav>
    <h1>Buscar Jugadores</h1>
    <form action="./buscarJugadores" method="GET">
        <label for="nombre">Nombre del Jugador:</label>
        <input type="text" id="nombre" name="Nombre" required><br>

        <label for="posicion">Posición:</label>
        <input type="text" id="posicion" name="Posicion" required><br>

        <label for="sueldomax">Sueldo Máximo:</label>
        <input type="number" id="sueldomax" name="sueldomax" required><br>

        <label for="sueldomin">Sueldo Mínimo:</label>
        <input type="number" id="sueldomin" name="sueldomin" required><br>

        <button type="submit">Buscar</button>
    </form>
</body>
</html>
