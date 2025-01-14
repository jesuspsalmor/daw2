<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<!-- Escribe un programa que dado un array ordénalo y devuelve otro array sin que haya 
elementos repetidos 
 datos = [2,5,9,7,6,3,1,5,4,8,3,2,6,9,3,5,1,2,3];
 2. Escribe un programa que dado un array devuelva la posición donde haya el valor 3 y cambie el 
valor por el número de la posición
 datos = [2,5,9,7,6,3,1,5,4,8,3,2,6,9,3,5,1,2,3];
 3. Escribe un programa que pida por pantalla el tamaño de una matriz (Ej lado=4). Rellene de la 
siguiente maner -->
<div class="parte1">
    <p> Parte 1:
        Escribe un programa que dado un array ordénalo y devuelve otro array sin que haya 
elementos repetidos 
 datos = [2,5,9,7,6,3,1,5,4,8,3,2,6,9,3,5,1,2,3]</p>
 <div>
    <?php
        $datos= [2,5,9,7,6,3,1,5,4,8,3,2,6,9,3,5,1,2,3];
        $nuevoArray=array_unique($datos);
        asort($nuevoArray);
        var_dump($nuevoArray);
        echo"<br>";
        print_r($nuevoArray);
        echo"<br>";
         foreach($nuevoArray as $key =>$val){
             echo"$val ,";
         }
    ?>
 </div>
</div>
<div class="parte2">
    <p>2. Escribe un programa que dado un array devuelva la posición donde haya el valor 3 y cambie el 
    valor por el número de la posición datos = [2,5,9,7,6,3,1,5,4,8,3,2,6,9,3,5,1,2,3]</p>
    <div>
        <?php
         $datos= [2,5,9,7,6,3,1,5,4,8,3,2,6,9,3,5,1,2,3];
        print_r($datos);
        
       
         foreach($datos as $key =>$val){
            if($val==3){
                $datos[$key] = $key;
                 
            }
        }
        echo"<br>";
        print_r($datos);
        ?>
    </div>
</div>
<div class="parte3">
    <p>3. Escribe un programa que pida por pantalla el tamaño de una matriz (Ej lado=4)</p>
    <form method="POST">
        <input type="text" name="lado">
        <button type="submit">Crear tabla</button>
    </form>
    <div>
        <?php
        

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $lado = intval($_POST["lado"]);
            $matriz = array();
        
            for ($i = 0; $i < $lado; $i++) {
                $matriz[$i] = array();
                for ($j = 0; $j < $lado; $j++) {
                    if ($i == 0) {
                        $matriz[$i][$j] = 1;
                    } else if ($j == 0) {
                        $matriz[$i][$j] = 1;
                    } else {
                        $matriz[$i][$j] = $matriz[$i-1][$j] + $matriz[$i][$j-1];
                    }
                }
            }
        
            echo "<table border='1'>";
            for ($i = 0; $i < $lado; $i++) {
                echo "<tr>";
                for ($j = 0; $j < $lado; $j++) {
                    echo "<td>" . $matriz[$i][$j] . "</td>";
                }
                echo "</tr>";
            }
            echo "</table>";
        }
        
        ?>
        
     
    
    </div>
</div>

</body>
</html>