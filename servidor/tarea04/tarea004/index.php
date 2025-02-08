<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    
    <title>Document</title>
</head>
<body>
    <div>
        <p>Realiza un programa utilizando bucles que muestre la siguiente figura</p>
        <section>
        <?php
        $altura=3;
        $espacios=$altura;
        $asteriscos=1;
        for($i=0;$i<$altura;$i++){
            for($j=$espacios;$j>0;$j--){
                echo "&nbsp&nbsp";
            }
            $espacios--;
        for ($g=0;$g<$asteriscos;$g++){
            echo "&nbsp*&nbsp";
        }
        echo "<br>";
        $asteriscos++;


        }
        ?>
        </section>
    </div>
    <div>
        <p>Realiza un programa utilizando bucles que muestre la siguiente figura</p>
        <section>
        <?php
        $altura=7;
        $espacios=$altura;
        $asteriscos=1;
        $mitad=$altura/2;
        $contador=0;
       
        for($i=0;$i<$altura;$i++){
            if($contador>=$mitad){
                for($j=$asteriscos;$j>0;$j--){
                    echo "&nbsp&nbsp";
                }
                
                for ($g=0;$g<$espacios;$g++){
                    echo "&nbsp*&nbsp";
            }
            echo "<br>";
            $espacios--;
            $asteriscos++;
            $contador++;

            }else{
                for($j=$espacios;$j>0;$j--){
                    echo "&nbsp&nbsp";
                }
                $espacios--;
                for ($g=0;$g<$asteriscos;$g++){
                echo "&nbsp*&nbsp";
                }
            echo "<br>";
            $asteriscos++;
            $contador++;
            }

            


        }
       



        ?>
        </section>
    </div>
    <div>
        <p>Realiza un programa utilizando bucles que muestre la siguiente figura</p>
        <section>
        <?php
            $altura=7;
            $espacios=$altura;
            $espaciosR=0;
            $mitad=$altura/2;
            $contador=0;
           
            for($i=0;$i<$altura;$i++){
                if($contador>=$mitad-1){
                    for($j=$espacios;$j>0;$j--){

                        echo"&nbsp&nbsp";
                    }
                    echo"&nbsp*&nbsp";
                    
                    for($j=$espaciosR;$j>0;$j--){
    
                        echo"&nbsp&nbsp";
                    }
                    if($contador==0||$contador==$altura-1){
                        
                    }else{
                        echo"&nbsp*&nbsp";
                        $espaciosR-=2;
                    }
                    echo"<br>";
                    $espacios++;
                    $contador++;

                }else{
                    for($j=$espacios;$j>0;$j--){

                        echo"&nbsp&nbsp";
                    }
                    echo"&nbsp*&nbsp";
                    
                    for($j=$espaciosR;$j>0;$j--){
    
                        echo"&nbsp&nbsp";
                    }
                    if($contador==0||$contador==$altura-1){
    
                    }else{
                        echo"&nbsp*&nbsp";
                        $espaciosR+=2;
                    }
                    echo"<br>";
                    $espacios--;
                    $contador++;
                }




                
                
            }

        ?>
        </section>
    </div>
 <div>  <p > 4. Realiza un programa que le introduzca un valor de un producto con 2 decimales y posteriormente
un valor con el que pagar por encima (Valor del producto 6.33€ y ha pagado con 10€). Muestra el
número mínimo de monedas con las que puedes devolver el cambio
</p>
<section class="ejer4">

<?php
   
function calcularCambio($precio, $pagado) {
   
    $cambio = $pagado - $precio;
    $monedas = [2, 1, 0.5, 0.2, 0.1, 0.05, 0.02, 0.01];
    $resultado = [];

    foreach ($monedas as $moneda) {
    
        if ($cambio >= $moneda) {
            $cantidad = floor($cambio / $moneda);
            $resultado[$moneda] = $cantidad;
            $cambio = round($cambio - ($cantidad * $moneda), 2);
            echo"<p> $cantidad moneda(s) de $moneda € </p>";
        }
    }

    return $resultado;
}

$precio = 6.33;
$pagado = 10;
echo "<p>Cambio para $precio pagado con $pagado €</p>";
$cambio = calcularCambio($precio, $pagado);



?>

</section></div>
<div><p>5. Escriba un programa que pida un año y que escriba si es bisiesto o no.
Los años bisiestos son múltiplos de 4, pero los múltiplos de 100 no lo son, aunque los múltiplos
de 400 sí.</p>
<section class="ejer5">
   
<form method="post">        
    <label for="anio"><p>

    Introduce un año:</p></label>        
    <input type="number" id="anio" name="anio" required>        
    <button type="submit">Verificar</button>    
</form>    
<?php        if ($_SERVER["REQUEST_METHOD"] == "POST")
 {            $anio = intval($_POST["anio"]);            
 function es_bisiesto($anio) {                
    if (($anio % 4 == 0 && $anio % 100 != 0) || ($anio % 400 == 0)) {
return true;
 } else {  
                                                
return false;   
                                                               
}          
                                                                
}     
                                                                       
                     
                    
if (es_bisiesto($anio))
                     
{               
                        
    echo "<p>El año $anio es bisiesto.</p>";            }
                          
    else { 
                                          
    echo "<p>El año $anio no es bisiesto.</p>";            
    }        }    
    ?> 

</section></div>
</body>
</html>