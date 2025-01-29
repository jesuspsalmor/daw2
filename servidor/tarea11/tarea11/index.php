<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./Public/styles.css">
    
    <?php
    include("./APP/Controllers/ControllerDataBase.php");
    ?>
</head>
<body>
    <header>
    <div class="latienda">
        <h1>La Tienda</h1>
    </div>
    <div class="usuario">
        <?php
        include_once("./APP/Controllers/ControllerUsuario.php");
        ?>
    </div>
    </header>
    <main>

        <article class="productos">
        <?php
        
        include_once("./APP/Controllers/ControllerProducto.php");
        ?> 
        </article>
        <article class="ventas">
        <?php
       
        include_once("./APP/Controllers/ControllerVentas.php");
        ?> 
        </article>
        <article class="ventas">
        <?php

        include_once("./APP/Controllers/ControllerAlbaran.php");
        ?> 
        </article>
    </main>
    
</body>
</html>