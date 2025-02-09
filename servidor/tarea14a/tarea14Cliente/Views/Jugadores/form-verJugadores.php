

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ver y Modificar Jugadores</title>
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
<h1>Ver y Modificar Jugadores</h1>

<?php
//var_dump($jugadores);


if (is_array($jugadores)) {
    if (!empty($jugadores)) {
        foreach ($jugadores as $jugador) {
            mostrarFormularioJugador($jugador);
        }
    } else {
        echo "<p>No se encontraron jugadores.</p>";
    }
} elseif (is_object($jugadores)) {
    mostrarFormularioJugador($jugadores);
} else {
    echo "<p>No se encontraron jugadores.</p>";
}

function mostrarFormularioJugador($jugador) {
    ?>
    <div class="form-ver">
        <form action="/tarea14Cliente/jugadores/form-actualizarJugador" method="POST">
            <label for="codJugador">Código del Jugador:</label>
            <input type="text" id="codJugador" name="codJugador" value="<?= $jugador->getCodJugador(); ?>" readonly>
            <label for="codEquipo">Código del Equipo:</label>
            <input type="text" id="codEquipo" name="codEquipo" value="<?= $jugador->getCodEquipo(); ?>" required>

            <label for="nombre">Nombre del Jugador:</label>
            <input type="text" id="nombre" name="nombre" value="<?= $jugador->getNombre(); ?>" required>

            <label for="posicion">Posición:</label>
            <select id="posicion" name="posicion" required>
                <option value="Portero" <?= $jugador->getPosicion() == 'Portero' ? 'selected' : ''; ?>>Portero</option>
                <option value="Defensa" <?= $jugador->getPosicion() == 'Defensa' ? 'selected' : ''; ?>>Defensa</option>
                <option value="Centrocampista" <?= $jugador->getPosicion() == 'Centrocampista' ? 'selected' : ''; ?>>Centrocampista</option>
                <option value="Delantero" <?= $jugador->getPosicion() == 'Delantero' ? 'selected' : ''; ?>>Delantero</option>
            </select>

            <label for="sueldo">Sueldo:</label>
            <input type="number" id="sueldo" name="sueldo" value="<?= $jugador->getSueldo(); ?>" required>

            <button type="submit">Modificar</button>
        </form>
        <form action="/tarea14Cliente/jugadores/form-borrarJugador" method="POST">
            <input type="hidden" name="codJugadorBorrar" value="<?= $jugador->getCodJugador(); ?>">
            <button type="submit">Borrar Jugador</button>
        </form>
    </div>
    <?php
}
?>

</body>
</html>