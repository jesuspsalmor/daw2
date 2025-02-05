<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ver y Modificar Equipos</title>
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
<h1>Ver y Modificar Equipos</h1>

<?php
if (is_array($equipos)) {
    if (!empty($equipos)) {
        foreach ($equipos as $equipo) {
            mostrarFormularioEquipo($equipo);
        }
    } else {
        echo "<p>No se encontraron equipos.</p>";
    }
} elseif (is_object($equipos)) {
    mostrarFormularioEquipo($equipos);
} else {
    echo "<p>No se encontraron equipos.</p>";
}

function mostrarFormularioEquipo($equipo) {
    ?>
    <div class="form-ver">
        <form action="/tarea14Cliente/equipos/form-actualizarEquipo" method="POST">
            <label for="codEquipo">Código del Equipo:</label>
            <input type="text" id="codEquipo" name="codEquipo" value="<?= $equipo->getCodEquipo(); ?>" readonly>
            
            <label for="localidad">Localidad:</label>
            <input type="text" id="localidad" name="localidad" value="<?= $equipo->getLocalidad(); ?>" required>
            
            <label for="nombreEquipo">Nombre del Equipo:</label>
            <input type="text" id="nombreEquipo" name="nombreEquipo" value="<?= $equipo->getNombre(); ?>" required>
            
            <button type="submit">Modificar</button>
        </form>
        <form action="/tarea14Cliente/equipos/form-borrarEquipo" method="POST">
            <input type="hidden" name="codEquipoBorrar" value="<?= $equipo->getCodEquipo(); ?>">
            <button type="submit">Borrar Equipo</button>
        </form>
    </div>
    <?php
}
?>
</body>
</html>
