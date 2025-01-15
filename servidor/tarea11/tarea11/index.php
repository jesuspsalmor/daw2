<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./Public/styles.css">
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
            
        </article>
    </main>
    
</body>
</html>