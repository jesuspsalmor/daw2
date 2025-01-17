
// tratando los errores en fecth
const SERVER = 'http://localhost:4000';

window.addEventListener("load", () => {
  document.getElementById("addProduct").addEventListener("submit", (event) => {
    event.preventDefault();
    let idProd = document.getElementById("id-prod").value;
    if (isNaN(idProd) || idProd.trim() == "") {
      alert("Debes introducir un número");
    } else {
      fetch(SERVER + "/productos?id=" + idProd)
        .then((response) => {
          if (!response.ok) {
            // lanzamos un error que interceptará el .catch()
            throw `Error ${response.status} de la BBDD: ${response.statusText}`;
          }
          return response.json(); // devolvemos la promesa que hará el JSON.parse
        })
        .then((datos) => {
          // ya tenemos los datos formateados
          // Aquí procesamos los datos (en nuestro ejemplo los pintaríamos en la página)
          document.getElementById("p1").innerHTML =
            datos.nombre + "  " + datos.precio;
          console.log(datos);
        })
        .catch((error) => console.error(error));
    }
  });
});
