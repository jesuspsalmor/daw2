//mala solución
const SERVER = 'http://localhost:4000';

window.addEventListener('load', function() {
    document.getElementById('addProduct').addEventListener('submit', (event) => {
      event.preventDefault(); // Cancela la acción predeterminada del evento ‘submit’ 
      const idProd = document.getElementById('id-prod').value;
      if (isNaN(idProd) || idProd == '') {
        alert('Debes introducir un número');
      } else {
        getProducto(idProd);
      }
    })
})

function getProducto(idProd) {
  const peticion = new XMLHttpRequest();
  peticion.open('GET', SERVER + '/productos?id=' + idProd);
  peticion.send();
  peticion.addEventListener('load', function() {
    if (peticion.status === 200) {
      const datos = JSON.parse(peticion.responseText); // Convertirmos los datos JSON a un objeto
      console.log(datos);
      document.getElementById('p1').innerHTML = datos.nombre+"  "+datos.precio;
    } else {
      console.error("Error " + peticion.status + " (" + peticion.statusText + ") en la petición");
    }
  })
  peticion.addEventListener('error', () => console.error('Error en la petición HTTP'));
}
