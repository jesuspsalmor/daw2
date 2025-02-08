<!-- Genera un array multidimensional y asociativo donde
a. los nombres de los equipos locales deben ser índices del array que contiene los 
subarrays con el equipo visitante y a su vez un subarray con: 
b. resultado, roja, amarilla y penalti que son índices de los anterioes.
2. El script lo único que debe hacer es mostrar una tabla similar a la de abajo, recogiendo los 
datos del array multidimensional que habéis creado
3. Genera otra table que sea clasificación. 
a. De tal forma que, por partido ganado se sumará tres puntos y por partido empatado 1.
b. Goles a favor
c. Goles en contra -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>


    <style>
        .body{
            display=flex;
        }
    .table {
        border: 1px solid lightgray;
        border-collapse: collapse;
    }
    .table th, .table td {
        border: 1px solid lightgray;
        text-align: center;
    }
    .resultado {
        background-color: green;
    }
    .rojas {
        background-color: red;
    }
    .amarillas {
        background-color: yellow;
    }
    .penaltis{
        background-color: orange;
    }
    </style>
</head>
<body class="body">
<?php
$partidos = array(
    "Zamora" => array(
        "Salamanca" => array(
            "resultado" => "3-2",
            "roja" => 1,
            "amarilla" => 2,
            "penalti" => 1
        ),
        "Avila" => array(
            "resultado" => "4-1",
            "roja" => 0,
            "amarilla" => 1,
            "penalti" => 0
        ),
        "Valladolid" => array(
            "resultado" => "1-2",
            "roja" => 0,
            "amarilla" => 3,
            "penalti" => 1
        ),
    ),
    "Salamanca" => array(
        "Zamora" => array(
            "resultado" => "3-2",
            "roja" => 1,
            "amarilla" => 0,
            "penalti" => 2
        ),
        "Avila" => array(
            "resultado" => "4-1",
            "roja" => 1,
            "amarilla" => 1,
            "penalti" => 1
        ),
        "Valladolid" => array(
            "resultado" => "1-2",
            "roja" => 2,
            "amarilla" => 0,
            "penalti" => 1
        ),
    ),
    "Avila" => array(
        "Zamora" => array(
            "resultado" => "3-2",
            "roja" => 1,
            "amarilla" => 2,
            "penalti" => 1
        ),
        "Salamanca" => array(
            "resultado" => "1-3",
            "roja" => 1,
            "amarilla" => 2,
            "penalti" => 0
        ),
        "Valladolid" => array(
            "resultado" => "1-2",
            "roja" => 0,
            "amarilla" => 1,
            "penalti" => 0
        ),
    ),
    "Valladolid" => array(
        "Zamora" => array(
            "resultado" => "3-2",
            "roja" => 2,
            "amarilla" => 1,
            "penalti" => 1
        ),
        "Salamanca" => array(
            "resultado" => "3-1",
            "roja" => 1,
            "amarilla" => 0,
            "penalti" => 1
        ),
        "Avila" => array(
            "resultado" => "1-2",
            "roja" => 0,
            "amarilla" => 1,
            "penalti" => 1
        ),
    ),
);

function mostrarTabla($partidos) {
    $html = "<table class='table' >";
    $html .= "<tr><th class='rojas'>Equipos</th><th>Zamora</th><th>Salamanca</th><th>Avila</th><th>Valladolid</th></tr>";
    foreach ($partidos as $equipoLocal => $juegos) {
        $html .= "<tr>";
        $html .= "<td>$equipoLocal</td>";
        foreach (array("Zamora", "Salamanca", "Avila", "Valladolid") as $equipoVisitante) {
            if ($equipoLocal === $equipoVisitante) {
                $html .= "<td></td>";
            } else {
                $detalles = $juegos[$equipoVisitante];
                $html .= "<td>";
                $html .= "<span class='resultado'>{$detalles['resultado']} </span><br>";
                $html .= "<span class='rojas'>{$detalles['roja']}</span> ";
                $html .= "<span class='amarillas'>{$detalles['amarilla']}</span> ";
                $html .= "<span class='penaltis'> {$detalles['penalti']}</span>";
                $html .= "</td>";
            }
        }
        $html .= "</tr>";
    }
    $html .= "</table>";
    echo $html;
}


function calcularPuntos($partidos) {
    $clasificacion = array();

    foreach ($partidos as $equipoLocal => $juegos) {
        foreach ($juegos as $equipoVisitante => $detalles) {
            $resultado = explode("-", $detalles['resultado']);
            $golesLocal = (int)$resultado[0];
            $golesVisitante = (int)$resultado[1];

            if (!isset($clasificacion[$equipoLocal])) {
                $clasificacion[$equipoLocal] = array("puntos" => 0, "golesFavor" => 0, "golesContra" => 0);
            }
            if (!isset($clasificacion[$equipoVisitante])) {
                $clasificacion[$equipoVisitante] = array("puntos" => 0, "golesFavor" => 0, "golesContra" => 0);
            }

            $clasificacion[$equipoLocal]["golesFavor"] += $golesLocal;
            $clasificacion[$equipoLocal]["golesContra"] += $golesVisitante;
            $clasificacion[$equipoVisitante]["golesFavor"] += $golesVisitante;
            $clasificacion[$equipoVisitante]["golesContra"] += $golesLocal;

            if ($golesLocal > $golesVisitante) {
                $clasificacion[$equipoLocal]["puntos"] += 3;
            } elseif ($golesLocal < $golesVisitante) {
                $clasificacion[$equipoVisitante]["puntos"] += 3;
            } else {
                $clasificacion[$equipoLocal]["puntos"] += 1;
                $clasificacion[$equipoVisitante]["puntos"] += 1;
            }
        }
    }

    return $clasificacion;
}

function mostrarClasificacion($clasificacion) {
    echo "<table class='table'>";
    echo "<tr><th>Equipo</th><th>Puntos</th><th>Goles a Favor</th><th>Goles en Contra</th></tr>";
    foreach ($clasificacion as $equipo => $detalles) {
        echo "<tr>";
        echo "<td>$equipo</td>";
        echo "<td>{$detalles['puntos']}</td>";
        echo "<td>{$detalles['golesFavor']}</td>";
        echo "<td>{$detalles['golesContra']}</td>";
        echo "</tr>";
    }
    echo "</table>";
}

// Mostrar tabla de resultados
mostrarTabla($partidos);

// Calcular y mostrar clasificación
$clasificacion = calcularPuntos($partidos);
mostrarClasificacion($clasificacion);
?>


</body>
</html>