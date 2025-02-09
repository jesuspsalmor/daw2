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
            <li><a href="/tarea14Cliente/jugadores/form-buscarObjetos">Buscar Jugadores</a></li>
            <li><a href="/tarea14Cliente/jugadores/form-verObjetos">Ver todos los jugadores</a></li>
            <li><a href="/tarea14Cliente/jugadores/form-crearObjetos">Crear Jugador</a></li>
            <li><a href="/tarea14Cliente/equipos/form-verObjetos">Ver todos los equipos</a></li>
            <li><a href="/tarea14Cliente/equipos/form-crearObjetos">Crear Equipo</a></li>
            <li><a href="/tarea14Cliente/equipos/form-buscarObjetos">Buscar Equipo</a></li>
        </ul>
    </nav>
    <h1>Ver y Modificar Jugadores</h1>
    <?php
   
    function mostrarFormularioObjeto($objeto) {
        ?>
        <div class="form-ver">
            <form action="/tarea14Cliente/jugadores/form-actualizarObjeto" method="POST">
                <label for="codObjeto">Código del jugador:</label>
                <input type="text" id="codObjeto" name="codObjeto" value="<?= $objeto->getCodjugador(); ?>" readonly>
                <label for="codEquipo">Código del Equipo:</label>
                <input type="text" id="codEquipo" name="codEquipo" value="<?= $objeto->getCodEquipo(); ?>" required>
                <label for="nombre">Nombre del jugador:</label>
                <input type="text" id="nombre" name="nombre" value="<?= $objeto->getNombre(); ?>" required>
                <label for="posicion">Posición:</label>
                <select id="posicion" name="posicion" required>
                    <option value="Portero" <?= $objeto->getPosicion() == 'Portero' ? 'selected' : ''; ?>>Portero</option>
                    <option value="Defensa" <?= $objeto->getPosicion() == 'Defensa' ? 'selected' : ''; ?>>Defensa</option>
                    <option value="Centrocampista" <?= $objeto->getPosicion() == 'Centrocampista' ? 'selected' : ''; ?>>Centrocampista</option>
                    <option value="Delantero" <?= $objeto->getPosicion() == 'Delantero' ? 'selected' : ''; ?>>Delantero</option>
                </select>
                <label for="sueldo">Sueldo:</label>
                <input type="number" id="sueldo" name="sueldo" value="<?= $objeto->getSueldo(); ?>" required>
                <button type="submit">Modificar</button>
            </form>
            <form action="/tarea14Cliente/jugadores/form-borrarObjeto" method="POST">
                <input type="hidden" name="codObjetoBorrar" value="<?= $objeto->getCodjugador(); ?>">
                <button type="submit">Borrar Objeto</button>
            </form>
        </div>
        <?php
    }

    if (isset($error_message) && $error_message) {
        if ($error_message === "No se encontraron jugadores (Código 204)") {
            echo '<p>No se encontraron jugadores.</p>';
        } else {
            echo '<div class="error-message">' . $error_message . '</div>';
        }
    } else {
        if (is_array($objetos) && !empty($objetos)) {
            foreach ($objetos as $objeto) {
                mostrarFormularioObjeto($objeto);
            }
        } elseif (is_object($objetos)) {
            mostrarFormularioObjeto($objetos);
        } else {
            echo '<p>No se encontraron jugadores.</p>';
        }
    }
    ?>
</body>
</html>
