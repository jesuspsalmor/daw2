// // // Tarea 001 – Javascript – Ejercicio Adivina


// // //Haz un programa para que el usuario juegue a adivinar un número.

// // //Obtén un número entero al azar (busca por internet cómo se hace).

// // //Ve pidiendo al usuario que introduzca un número. Si es el que busca, le dices que lo ha encontrado, y si no, le mostrarás si el número que busca es mayor o menor que el introducido.

// // //El juego acaba cuando el usuario encuentra el número o cuando pulsa en ‘Cancelar’ (en este caso le mostraremos un mensaje de que ha cancelado el juego).


// // //El número pedido estará comprendido entre dos constantes llamadas MAX y MIN • El número oculto se mostrará en la consola desde el primer momento.


// // //El programa llevará la cuenta de los intentos que lleva el jugador y se mostrará en la página al pedir un nuevo número.

// // //Al finalizar, ya sea por cancelación o por acertar, se visualizará tanto en la página como en la consola el mensaje correspondiente junto al número de intentos y al número oculto.

const MIN = 1;
const MAX = 100;
const numeroOculto = Math.floor(Math.random() * (MAX - MIN + 1)) + MIN;
let intentos = 1;
let encontrado = false;

console.log(`Número oculto: ${numeroOculto}`);
let entrada = window.prompt(`Introduce un número entre ${MIN} y ${MAX}:`);

while (!encontrado) {
    if (entrada === null) {
        window.alert(`El número era ${numeroOculto}. intentos  ${intentos}`);
        break;
    }

    if (!isNaN(entrada) && entrada.trim() !== "" && entrada >= MIN && entrada <= MAX) {
        entrada = Number(entrada); // Convertimos la entrada a número solo para la comparación
        if (entrada === numeroOculto) {
            window.alert(`¡Enhorabuena! El número oculto es ${numeroOculto}. Acertaste en ${intentos} intentos.`);
            encontrado = true;
        } else {
            if (entrada < numeroOculto) {
                entrada = window.prompt(`El número ${entrada} es menor que el número oculto. Intento número ${intentos}:`);
            } else {
                entrada = window.prompt(`El número ${entrada} es mayor que el número oculto. Intento número ${intentos}:`);
            }
            intentos++;
        }
    } else {
        entrada = window.prompt(`Introduce un valor válido entre ${MIN} y ${MAX}. Intento número ${intentos}:`);
        intentos++;
    }
}