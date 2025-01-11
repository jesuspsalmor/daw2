let suma=0;
let cantidaNotas=0;
 let continuar=true;
 let media=0;
let entrada= window.prompt('intruduce la nota');


while (continuar) {
    let entrada = window.prompt('Introduce la nota');
    if (entrada !== null && !isNaN(entrada) && entrada.trim() !== "") {
        entrada = parseFloat(entrada); 
        suma += entrada;
        cantidaNotas += 1;
    } else {
        if (cantidaNotas > 0) {
            let media = suma / cantidaNotas;
            window.alert(`La media es ${media}`);
        } else {
            window.alert('No se introdujeron notas válidas.');
        }
        continuar = false;
    }
}
