<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
<div class="Parte 1">
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
<div>
    <p>3. Escribe un programa que pida por pantalla el tamaño de una matriz (Ej lado=4)</p>
    <form action="">
        <input type="text">
        <button type="submit"></button>
    </form>
</div>

</body>
</html>