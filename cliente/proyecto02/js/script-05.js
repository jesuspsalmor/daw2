// fetch
const SERVER = 'http://localhost:4000';

window.addEventListener('load', () => {
  document.getElementById('addProduct').addEventListener('submit', (event) => {
    event.preventDefault();
    let idProd = document.getElementById('id-prod').value
    if (isNaN(idProd) || idProd.trim() == '') {
      alert('Debes introducir un número')
    } else {
      fetch(SERVER + '/productos?id=' + idProd)
        .then((response) => response.json())
        .then((datos) => {
           // aquí pintamos los datos. Habrá casos que será muy extenso.
           document.getElementById('p1').innerHTML = datos.nombre+"  "+datos.precio;
        })
        .catch((error) => console.error(error))
    }
  })
})
