// EJERCICIO: Haz una función a la que se le pasa un DNI (ej. 12345678w o 87654321T) 
// y devolverá si es correcto o no. La letra que debe corresponder a un DNI correcto 
// se obtiene dividiendo la parte numérica entre 23 y cogiendo de la cadena ‘TRWAGMYFPDXBNJZSQVHLCKE’ 
// la letra correspondiente al resto de la división. Por ejemplo, si el resto es 0 la letra será la T y si es 4 será la G. Prueba la función en la consola con tu DN

let dni=window.prompt("introduce dni");
let dniarray=dni.split("")
let cadenaNumeros="";
let letraDni;
let valorLetra;

let letras=["T","R","W","A","G","M","Y","F","P","D","X","B","N","J","Z","S","Q","V","H","L","C","K","E"];

function divisionDni(cadenaNumeros){
    valorLetra=cadenaNumeros%23;
    return valorLetra
}

if(dniarray.length !=9){
    window.alert("dni mal introducido")

}else{
    for(i=0;i<dniarray.length;i++){
        if(i==dni.length-1){
            letraDni=dniarray[i];
            console.log(letraDni);
        }else{
            cadenaNumeros+=dniarray[i];

        }

    }
    console.log(cadenaNumeros);
    cadenaNumeros=parseInt(cadenaNumeros);
};
console.log("el valor de la letra es"+ divisionDni(cadenaNumeros));
console.log("letra" +letraDni.toUpperCase )
if(letraDni.toUpperCase()===letras[divisionDni(cadenaNumeros)]){
    window.alert("dni correcto")
}else{
    window.alert("dni incorrecto")
    
}