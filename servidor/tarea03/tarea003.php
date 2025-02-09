<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<h1>1 Crea una página que:</h1>
<div>
<p>a. Muestra el nombre del fichero que se está ejecutando.</p>
<?php
$filename = basename($_SERVER['PHP_SELF']);
echo "<span>El nombre del fichero actual es: " . $filename."</span>";
?>
</div>
<div>
<p>b. Muestra la dirección IP del equipo desde el que estás accediendo.</p>
<?php
$ipAddress = $_SERVER['REMOTE_ADDR'];
echo "<span>La dirección IP del equipo desde el que estás accediendo es: " . $ipAddress."</span>";
?>
</div>
<div>
<p>c. Muestra el path donde se encuentra el fichero que se está ejecutando.</p>
<?php
$filename = $_SERVER['PHP_SELF'];
echo "<span>El nombre del fichero actual es: " . $filename."</span>";
?>
</div>
<div>
<p>d. Muestra la fecha y hora actual formateada en 2021-10-5 19:17:18.</p>
<?php
date_default_timezone_set('Europe/Madrid');
$fechaHoraActual = date('Y-n-j H:i:s', time());
echo "<span>La fecha y hora actual es: " . $fechaHoraActual."<span>";
?>
</div>
<div>
<p>e. Muestra la fecha y hora actual en Oporto formateada en (día de la semana, día de
mes de año, hh:mm:ss , Zona horaria).</p>
<?php
date_default_timezone_set('Europe/Lisbon'); 

$fechaHoraActual = date('l, j F Y, H:i:s, e');
echo "<span>La fecha y hora actual en Oporto es: " . $fechaHoraActual."</span>";
?>
</div>
<div>
<p>f. Inicializa y muestra una variable en timestamp y en fecha con formato dd/mm/yyyy
de tu cumpleaños</p>
<?php

$fechaCumpleanos = '1990-05-28 00:00:00';
$timestamp = strtotime($fechaCumpleanos);
$fechaFormateada = date('d/m/Y', $timestamp);
echo "<span>Fecha de mi cumpleaños en formato dd/mm/yyyy: " . $fechaFormateada . "</span>";

?>
</div>
<div>
<p>g. Calcular la fecha y el día de la semana de dentro de 60 días.</p>
<?php

$fecha_actual = new DateTime();
$fecha_actual->modify('+60 days');
$dia_semana = $fecha_actual->format('l'); 
echo "<span>Fecha: " . $fecha_actual->format('Y-m-d') . "<span>\n";
echo "<span>Día de la semana: " . $dia_semana . "<span>\n";
?>
</div>










    
</body>
</html>