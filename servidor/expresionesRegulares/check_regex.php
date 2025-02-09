<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $inputText = $_POST["inputText"];
    $pattern = "/aba/";
//Contengan la cadena "aba"
    if (preg_match($pattern, $inputText)) {
        echo "La cadena contiene 'aba'.";
    } else {
        echo "La cadena NO contiene 'aba'.";
    }
}
?>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $inputText = $_POST["inputText"];
    $pattern = "/bbb/";
//Contengan tres "b" seguidas
    if (preg_match($pattern, $inputText)) {
        echo "La cadena contiene tres 'b' seguidas.";
    } else {
        echo "La cadena NO contiene tres 'b' seguidas.";
    }
}
?>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $inputText = $_POST["inputText"];
    $pattern = "/^aa/";
//empiecen por dos "a"
    if (preg_match($pattern, $inputText)) {
        echo "La cadena empieza con dos 'a'.";
    } else {
        echo "La cadena NO empieza con dos 'a'.";
    }
}
?>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $inputText = $_POST["inputText"];
    $pattern = "/ba$/";
// terminen por "ba"
    if (preg_match($pattern, $inputText)) {
        echo "La cadena termina con 'ba'.";
    } else {
        echo "La cadena NO termina con 'ba'.";
    }
}
?>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $inputText = $_POST["inputText"];
    $pattern = "/^a.*b$/";
//empiecen por "a" y terminen por "b" (enmedio puede haber cualquier cosa)

    if (preg_match($pattern, $inputText)) {
        echo "La cadena empieza con 'a' y termina con 'b'.";
    } else {
        echo "La cadena NO empieza con 'a' y termina con 'b'.";
    }
}
?>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $inputText = $_POST["inputText"];
    $pattern = "/^a*$/";
   // contengan sólo "a" (la cantidad no importa)
    if (preg_match($pattern, $inputText)) {
        echo "La cadena contiene solo 'a'.";
    } else {
        echo "La cadena NO contiene solo 'a'.";
    }
}
?>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $inputText = $_POST["inputText"];
    $pattern = "/^b+a+$/";
//primero haya sólo una "b" y luego varias "a" (y no vuelva a haber más "b")
    if (preg_match($pattern, $inputText)) {
        echo "La cadena cumple con el patrón: una 'b' seguida de una o más 'a' y no contiene más 'b'.";
    } else {
        echo "La cadena NO cumple con el patrón.";
    }
}
?>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $inputText = $_POST["inputText"];
    $pattern = "/^(?=.*a)(?=.*b).*$/";
   // tengan tanto "a" como "b" (el orden o la cantidad no importa)

    if (preg_match($pattern, $inputText)) {
        echo "La cadena contiene tanto 'a' como 'b'.";
    } else {
        echo "La cadena NO contiene tanto 'a' como 'b'.";
    }
}
?>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $inputText = $_POST["inputText"];
    $pattern = "/(a{4,}|b{4,})/";
    //no tenga más de tres "a" o tres "b" seguidas
    if (preg_match($pattern, $inputText)) {
        echo "La cadena contiene más de tres 'a' o más de tres 'b' seguidas.";
    } else {
        echo "La cadena NO contiene más de tres 'a' o más de tres 'b' seguidas.";
    }
}
?>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $inputText = $_POST["inputText"];
    $pattern = "/^(ab|ba)+(a|b)?$/";
    //vayan alternando las "a" y las "b" sin repetirse
    if (preg_match($pattern, $inputText)) {
        echo "La cadena alterna las letras 'a' y 'b' sin repetirse.";
    } else {
        echo "La cadena NO alterna las letras 'a' y 'b' sin repetirse.";
    }
}
?>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $inputText = $_POST["inputText"];
    $pattern = "/^(aa|bb)+$/";
// sólo tenga parejas de "a" y de "b"
    if (preg_match($pattern, $inputText)) {
        echo "La cadena contiene solo parejas de 'a' y de 'b'.";
    } else {
        echo "La cadena NO contiene solo parejas de 'a' y de 'b'.";
    }
}
?>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $inputText = $_POST["inputText"];
    $pattern = "/^(a+|b+)$/";
 //tengan sólo "a" o sólo "b"
    if (preg_match($pattern, $inputText)) {
        echo "La cadena contiene solo 'a' o solo 'b'.";
    } else {
        echo "La cadena NO contiene solo 'a' o solo 'b'.";
    }
}
?>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $inputText = $_POST["inputText"];
    $pattern = "/^(a+b+|b+a+)$/";
// haya unas cuantas "a" y luego unas cuantas "b" o al revés
    if (preg_match($pattern, $inputText)) {
        echo "La cadena contiene unas cuantas 'a' seguidas de unas cuantas 'b' o viceversa.";
    } else {
        echo "La cadena NO contiene unas cuantas 'a' seguidas de unas cuantas 'b' o viceversa.";
    }
}
?>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $inputText = $_POST["inputText"];
    $pattern = "/(aba|bab)/";
//contengan la cadena "aba" o la cadena "bab"
    if (preg_match($pattern, $inputText)) {
        echo "La cadena contiene 'aba' o 'bab'.";
    } else {
        echo "La cadena NO contiene 'aba' ni 'bab'.";
    }
}
?>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $inputText = $_POST["inputText"];
    $pattern = "/(ba.*ba)/";
//contengan la cadena "ba" dos veces
    if (preg_match($pattern, $inputText)) {
        echo "La cadena contiene 'ba' dos veces.";
    } else {
        echo "La cadena NO contiene 'ba' dos veces.";
    }
}
?>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $inputText = $_POST["inputText"];
    $pattern = "/^-?\d+$/";
//números enteros (positivos o negativos)
    if (preg_match($pattern, $inputText)) {
        echo "La cadena contiene un número entero.";
    } else {
        echo "La cadena NO contiene un número entero.";
    }
}
?>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $inputText = $_POST["inputText"];
    $pattern = "/^-?\d+,\d+$/";
//números decimales (con una coma como separador decimal
    if (preg_match($pattern, $inputText)) {
        echo "La cadena contiene un número decimal con coma como separador decimal.";
    } else {
        echo "La cadena NO contiene un número decimal con coma como separador decimal.";
    }
}
?>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $inputText = $_POST["inputText"];
    $pattern = "/^-?\d+([.,]\d+)?$/";
//números decimales (con una coma o un punto como separador decimal
    if (preg_match($pattern, $inputText)) {
        echo "La cadena contiene un número decimal con coma o punto como separador decimal.";
    } else {
        echo "La cadena NO contiene un número decimal con coma o punto como separador decimal.";
    }
}
?>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $inputText = $_POST["inputText"];
    $pattern = "/^[96]\d{8}$/";
    //números de teléfonos (de nueve cifras, que empiecen por 9 o 6)
    if (preg_match($pattern, $inputText)) {
        echo "La cadena contiene un número de teléfono válido.";
    } else {
        echo "La cadena NO contiene un número de teléfono válido.";
    }
}
?>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $inputText = $_POST["inputText"];
    $pattern = "/^[0-5]\d{4}$/";
   // códigos postales (de cinco cifras, que empiecen como mucho por 5)
    if (preg_match($pattern, $inputText)) {
        echo "La cadena contiene un código postal válido.";
    } else {
        echo "La cadena NO contiene un código postal válido.";
    }
}
?>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $inputText = $_POST["inputText"];
    $pattern = "/^\d{7,8}[A-Za-z]?$/";
//. DNI (siete u ocho cifras que pueden ir seguidas de una letra)

    if (preg_match($pattern, $inputText)) {
        echo "La cadena contiene un número de DNI válido.";
    } else {
        echo "La cadena NO contiene un número de DNI válido.";
    }
}
?>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $inputText = $_POST["inputText"];
    $pattern = "/^(0[1-9]|[12][0-9]|3[01])\/(0[1-9]|1[0-2])\/\d{4}$/";
    //fechas (dd/mes/año)
    if (preg_match($pattern, $inputText)) {
        echo "La cadena contiene una fecha válida.";
    } else {
        echo "La cadena NO contiene una fecha válida.";
    }
}
?>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $inputText = $_POST["inputText"];
    $pattern = "/^[a-z]+$/";
    //palabras en minúsculas sin números
    if (preg_match($pattern, $inputText)) {
        echo "La cadena contiene solo palabras en minúsculas sin números.";
    } else {
        echo "La cadena NO contiene solo palabras en minúsculas sin números.";
    }
}
?>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $inputText = $_POST["inputText"];
    $pattern = "/^[A-Z][a-z]*$/";
// palabras en las que sólo la primera letra esté en mayúscula
    if (preg_match($pattern, $inputText)) {
        echo "La cadena contiene palabras con solo la primera letra en mayúscula.";
    } else {
        echo "La cadena NO contiene palabras con solo la primera letra en mayúscula.";
    }
}
?>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $inputText = $_POST["inputText"];
    $pattern = "/^([a-zA-Z]+ ){2,3}[a-zA-Z]+$/";
//tres o cuatro palabras (sin números)
    if (preg_match($pattern, $inputText)) {
        echo "La cadena contiene tres o cuatro palabras sin números.";
    } else {
        echo "La cadena NO contiene tres o cuatro palabras sin números.";
    }
}
?>
