const numeroRecibido=parseFloat(window.prompt("introduce un numero"));

let verificador= function(numeroRecibido) {
    if(numeroRecibido<0){
       return verificador="Negativo";
    }else{
        if(numeroRecibido>0){
           return verificador="positivo";
        }else{
           return verificador="cero";
        }
    }
}

let cuadrado=(numeroRecibido)=>numeroRecibido*=numeroRecibido;
window.alert(`el numero introducido a sido ${numeroRecibido} y es `+verificador(numeroRecibido)+`, su Cuadrado es `+cuadrado(numeroRecibido))