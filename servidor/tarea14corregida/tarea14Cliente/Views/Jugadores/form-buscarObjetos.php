<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buscar Jugadores</title>
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
    <form action="/tarea14Cliente/jugadores/form-verObjetos" method="POST">
        <label for="id">ID del Jugador:</label>
        <input type="number" id="id" name="id" required><br>

        <button type="submit" name="buscarId">Buscar</button>
    </form>
</div>
<div class="form">
    <form action="/tarea14Cliente/jugadores/form-verObjetos" method="POST">
        <label for="nombre">Nombre del Jugador:</label>
        <input type="text" id="nombre" name="Nombre"><br>

        <label for="posicion">Posición:</label>
        <select id="posicion" name="Posicion">
            <option value="">Cualquiera</option>
            <option value="Portero">Portero</option>
            <option value="Defensa">Defensa</option>
            <option value="Centrocampista">Centrocampista</option>
            <option value="Delantero">Delantero</option>
        </select><br>

        <label for="sueldomax">Sueldo Máximo:</label>
        <input type="number" id="sueldomax" name="sueldomax"><br>

        <label for="sueldomin">Sueldo Mínimo:</label>
        <input type="number" id="sueldomin" name="sueldomin"><br>

        <button type="submit">Buscar</button>
    </form>
</div>



</body>
</html>
