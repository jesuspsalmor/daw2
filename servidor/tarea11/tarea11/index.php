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
        La Tienda
    </div>
    <div class="usuario">
        <?php
        include_once("./APP/Controllers/ControllerUsuario.php");
        ?>
    </div>
    </header>
    <main>
   
        <aside class="carrito">
        
        </aside>
        <article class="productos">
        <?php
        include_once("./APP/Controllers/ControllerProducto.php");
        ?> 
        </article>
    </main>
    
</body>
</html>