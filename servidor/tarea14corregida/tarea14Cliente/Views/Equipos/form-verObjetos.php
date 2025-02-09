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
            <li><a href="/tarea14Cliente/jugadores/form-buscarObjetos">Buscar Jugadores</a></li>
            <li><a href="/tarea14Cliente/jugadores/form-verObjetos">Ver todos los jugadores</a></li>
            <li><a href="/tarea14Cliente/jugadores/form-crearObjetos">Crear Jugador</a></li>
            <li><a href="/tarea14Cliente/equipos/form-verObjetos">Ver todos los equipos</a></li>
            <li><a href="/tarea14Cliente/equipos/form-crearObjetos">Crear Equipo</a></li>
            <li><a href="/tarea14Cliente/equipos/form-buscarObjetos">Buscar Equipo</a></li>
        </ul>
    </nav>
    <h1>Ver y Modificar Equipos</h1>

    <?php
   
    function mostrarFormularioEquipo($objeto) {
        ?>
        <div class="form-ver">
            <form action="/tarea14Cliente/equipos/form-actualizarObjeto" method="POST">
                <label for="codEquipo">Código del Equipo:</label>
                <input type="text" id="codEquipo" name="codEquipo" value="<?= $objeto->getCodEquipo(); ?>" readonly>
                <label for="localidad">Localidad:</label>
                <input type="text" id="localidad" name="localidad" value="<?= $objeto->getLocalidad(); ?>" required>
                <label for="nombreEquipo">Nombre del Equipo:</label>
                <input type="text" id="nombreEquipo" name="nombreEquipo" value="<?= $objeto->getNombre(); ?>" required>
                <button type="submit">Modificar</button>
            </form>
            <form action="/tarea14Cliente/equipos/form-borrarObjeto" method="POST">
                <input type="hidden" name="codEquipoBorrar" value="<?= $objeto->getCodEquipo(); ?>">
                <button type="submit">Borrar Equipo</button>
            </form>
        </div>
        <?php
    }
    //var_dump ($objetos);
    if (isset($error_message) && $error_message) {
        if ($error_message === "No se encontraron equipos (Código 204)") {
            echo '<p>No se encontraron equipos.</p>';
        } else {
            echo '<div class="error-message">' . $error_message . '</div>';
        }
    } else {
        if (is_array($objetos) && !empty($objetos)) {
            foreach ($objetos as $objeto) {
                mostrarFormularioEquipo($objeto);
            }
        } elseif (is_object($objetos)) {
            mostrarFormularioEquipo($objetos);
        } else {
            echo '<p>No se encontraron equipos.</p>';
        }
    }
    ?>
</body>
</html>

