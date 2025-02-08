<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>
    <header>
        <nav>
            <ul>
                <li><a href="elegiridioma.php?idioma=fr"><img src="../imagenes/france_flags_flag_16999.png" alt="Bandera de Francia"><p>francés</p></a></li>
                <li><a href="elegiridioma.php?idioma=ale"><img src="../imagenes/germany_flags_flag_17001.png" alt="Bandera de Alemania"><p>alemán</p></a></li>
                <li><a href="elegiridioma.php?idioma=it"><img src="../imagenes/italy_flags_flag_17018.png" alt="Bandera de Italia"><p>italiano</p></a></li>
                <li><a href="elegiridioma.php?idioma=es"><img src="../imagenes/spain_flags_flag_17068.png" alt="Bandera de España"><p>español</p></a></li>
                <li><a href="elegiridioma.php?idioma=uk"><img src="../imagenes/united_kingdom_flags_flag_17079.png" alt="Bandera del Reino Unido"><p>inglés</p></a></li>
            </ul>
        </nav>
    </header>


<?php
if (isset($_GET['idioma'])){
    $idioma=$_GET['idioma'];
        switch ($idioma) {
            case 'fr':
                echo '<h1>Bonjour le monde</h1>';
                break;
            case 'ale':
                 echo '<h1>Hallo Welt</h1>';
                break;
            case 'it':
                echo '<h1>Ciao mondo</h1>';
                break;
            case 'es':
                echo ' <h1>hola mundo</h1>';
                break;
            case 'uk':
                echo '<h1>hello world</h1>';
                break;            
            default:
                # code...
                break;
        }
    }


?> 
</body>
</html>