<!DOCTYPE html>
<html>
<head>
    <title>Prueba de Funciones PHP</title>
</head>
<body>
    <?php
    include 'funciones.php';
    
    h1("Título Principal");
    br();
    p("Esto es un párrafo.");
   
    echo "Nombre del fichero: " . self();
    br();
    $dni = 71032505;
    echo "Letra del DNI $dni: " . letraDni($dni);
    br();
$array = [];
$array = generarNumerosAleatorios($array, 1, 10, 5, true);
print_r($array);
    ?>
</body>
</html>
