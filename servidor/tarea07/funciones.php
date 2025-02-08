<?php
function br() {
    echo "<br>";
}

function h1($cadena) {
    echo "<h1>$cadena</h1>";
}

function p($cadena) {
    echo "<p>$cadena</p>";
}

function self() {
    return $_SERVER['PHP_SELF'];
}

function letraDni($dni) {
    $letras = "TRWAGMYFPDXBNJZSQVHLCKE";
    $index = $dni % 23;
    return $letras[$index];
}

function generarNumerosAleatorios($array, $min, $max, $cantidad, $puedenRepetirse) {
    $numerosGenerados = [];
    
    if ($puedenRepetirse) {
        for ($i = 0; $i < $cantidad; $i++) {
            $array[] = rand($min, $max);
        }
    } else {
        if (($max - $min + 1) < $cantidad) {
            return "No es posible generar la cantidad de números solicitada sin repetirse.";
        }
        
        while (count($array) < $cantidad) {
            $num = rand($min, $max);
            if (!in_array($num, $array)) {
                $array[] = $num;
            }
        }
    }

    return $array;
}




?>
