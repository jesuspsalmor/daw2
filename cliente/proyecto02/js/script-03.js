// promesas
const SERVER="http://localhost:4000";
window.addEventListener('load',function(){
    document.getElementById('addProduct').addEventListener('submit', (event)=>{
        event.preventDefault();
        let idProd=document.getElementById('id-prod').value
        if(isNaN(idProd) || idProd==""){
            alert("Debes introducir un número")
        }else{
            getProd(idProd)
            // en el .then() estará el código a ejecutar cuando tengamos los datos
            .then((datos) => {
                document.getElementById('p1').innerHTML = datos.nombre+":  "+datos.precio;
            })
            // en el .catch() está el tratamiento de errores
            .catch((error) => console.error(error))
      
        }
    })
})

function getProd(idProd) {
    return new Promise((resolve, reject) => {
      const peticion = new XMLHttpRequest();
      peticion.open('GET', SERVER + '/productos?id=' + idProd);
      peticion.send();
      peticion.addEventListener('load', () => {
        if (peticion.status === 200) {
          resolve(JSON.parse(peticion.responseText));
        } else {
          reject("Error " + peticion.status + " (" + peticion.statusText + ") en la petición");
        }
      })
      peticion.addEventListener('error', () => reject('Error en la petición HTTP'));
    })
  }
  