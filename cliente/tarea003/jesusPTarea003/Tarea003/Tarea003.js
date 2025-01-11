 
 
 let factorial = 1;
 let numero = window.prompt('Introduce un número para calcular el factorial');
 numero = parseFloat(numero);
 
 if (isNaN(numero) || numero < 0) {
     window.alert('Por favor, introduce un número válido y no negativo.');
 } else {
     let cadena = `${numero}! = `;
     for (let i = numero; i > 0; i--) {
         if (i === numero) {
             cadena += `${i} x `;
         } else if (i === 1) {
             cadena += `${i}`;
         } else {
             cadena += `${i} x `;
         }
         factorial *= i;
     }
     window.alert(`El factorial de ${cadena} es ${factorial}`);
 }