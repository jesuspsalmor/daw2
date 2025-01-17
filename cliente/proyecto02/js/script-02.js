// callback
const SERVER = 'http://localhost:4000';

window.addEventListener('load', function() {
    document.getElementById('addProduct').addEventListener('submit', (event) => {
    event.preventDefault();
    let idProd = document.getElementById('id-prod').value
    if (isNaN(idProd) || idProd.trim() == '') {
      alert('Debes introducir un número')
    } else {
      getProd(idProd, renderProd) 
    }
  })
})

function renderProd(datos) {
    // aquí pintamos los datos. Habrá casos que será muy extenso.
    document.getElementById('p1').innerHTML = datos.nombre+":  "+datos.precio;
}

function getProd(idProd, callback) {
  const peticion = new XMLHttpRequest()
  peticion.open('GET', SERVER + '/productos?id=' + idProd);
  peticion.send()
  peticion.addEventListener('load', function() {
    if (peticion.status === 200) {
      callback(JSON.parse(peticion.responseText));
    } else {
      console.error("Error " + peticion.status + " (" + peticion.statusText + ") en la petición")
    }
  })
  peticion.addEventListener('error', () => console.error('Error en la petición HTTP'))
}
