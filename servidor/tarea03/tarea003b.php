<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php 
        if(isset($_GET["valor"])){
            $valor=$_GET["valor"];
            if(is_numeric($valor)){
                echo"<span>el valor es numerico</span><br>";
                if(ctype_digit($valor)){
                    echo"<span>el numero es entero</span>";
                }else{
                    echo "<span> el numero es un float</span>";
                }
            }else{
                echo"<span>el valor no es numerico </span>";
            }

        }
        ?>
</body>
</html>