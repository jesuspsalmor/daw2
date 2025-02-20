const limpiar = elemento => elemento.innerText = "";

const esperar = (funcion, argumento) => {
    setTimeout(() => {
        funcion(argumento);
    }, 2000); 
};

const media = array => {
    const suma = array.reduce((acumulado, valor) => acumulado + valor, 0);
    return suma / array.length;
};

document.addEventListener('DOMContentLoaded', () => {
    let notas = [];
    
    document.getElementById('form-notas').addEventListener('submit', (event) => {
        event.preventDefault();
        const mensaje = document.getElementById('infoOperacion');
        const nota = parseFloat(document.getElementById('nota').value);
        
        if (!isNaN(nota)) {
            notas.push(nota.toFixed(2));
            mensaje.innerText = "Nota añadida correctamente";
            
            esperar(limpiar, mensaje);
        } else {
            mensaje.innerText = "Debes introducir un número";
            esperar(limpiar, mensaje);
        }
    });

    document.getElementById('calcularMedia').addEventListener('click', () => {
        const notaMedia = document.getElementById('notaMedia');
        const promedio = media(notas.map(Number)); // Convertir strings a números
        notaMedia.innerText = promedio;
    });
});
