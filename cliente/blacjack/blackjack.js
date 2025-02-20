const nombres = ['2', '3', '4', '5', '6', '7', '8', '9', '10', 'J', 'Q', 'K', 'A'];
const palos = ['corazones', 'diamantes', 'tréboles', 'picas'];
const valores = {
  '2': 2, '3': 3, '4': 4, '5': 5, '6': 6, '7': 7, '8': 8, '9': 9, '10': 10,
  'J': 10, 'Q': 10, 'K': 10, 'A': 11 // El valor del As puede ser 1 o 11, lo ajustaremos en el juego
};

let baraja = [];

palos.forEach((palo) => {
  nombres.forEach((nombre, index) => {
    baraja.push({
      id: baraja.length + 1,
      nombre: nombre,
      palo: palo,
      valor: valores[nombre],
      imagen: `images/${nombre}_de_${palo}.jpg` // Ajusta la ruta a tus imágenes
    });
  });
});

console.log(baraja);
function shuffle(array) {
    for (let i = array.length - 1; i > 0; i--) {
      const j = Math.floor(Math.random() * (i + 1));
      [array[i], array[j]] = [array[j], array[i]];
    }
    return array;
  }
  
  baraja = shuffle(baraja);
  function repartirCarta(baraja) {
    return baraja.pop();
  }
  
  function calcularPuntaje(mano) {
    let total = 0;
    let ases = 0;
  
    mano.forEach(carta => {
      total += carta.valor;
      if (carta.nombre === 'A') ases++;
    });
  
    // Ajustar el valor de los ases si es necesario
    while (total > 21 && ases > 0) {
      total -= 10;
      ases--;
    }
  
    return total;
  }
  let manoJugador = [];
let manoDealer = [];

// Repartir dos cartas a cada jugador
manoJugador.push(repartirCarta(baraja));
manoJugador.push(repartirCarta(baraja));
manoDealer.push(repartirCarta(baraja));
manoDealer.push(repartirCarta(baraja));

console.log('Mano del Jugador:', manoJugador);
console.log('Puntaje del Jugador:', calcularPuntaje(manoJugador));
console.log('Mano del Dealer:', manoDealer);
console.log('Puntaje del Dealer:', calcularPuntaje(manoDealer));

// Puedes agregar más lógica para continuar el juego, como permitir que el jugador pida más cartas (hit) o se plante (stand)
