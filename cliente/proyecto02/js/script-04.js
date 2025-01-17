//async-await
const SERVER = "http://localhost:4000";
window.addEventListener("load", function () {
  document
    .getElementById("addProduct")
    .addEventListener("submit", async (event) => {
      event.preventDefault();
      let idProd = document.getElementById("id-prod").value;
      if (isNaN(idProd) || idProd == "") {
        alert("Debes introducir un número");
      } else {
        try {
          const datos = await getProd(idProd);
          console.log(datos);
          //pintamos los datos en la página
          document.getElementById("p1").innerHTML =
            datos.nombre + " " + datos.precio;
        } catch (error) {
          console.log(error);
        }
      }
    });
});

function getProd(idProd) {
  return new Promise((resolve, reject) => {
    const peticion = new XMLHttpRequest();
    peticion.open("GET", SERVER + "/productos?id=" + idProd);
    peticion.send();
    peticion.addEventListener("load", () => {
      if (peticion.status === 200) {
        resolve(JSON.parse(peticion.responseText));
      } else {
        reject(
          "Error " + peticion.status + " (" + peticion.statusText + ") en la petición"
        );
      }
    });
    peticion.addEventListener("error", () =>
      reject("Error en la petición HTTP")
    );
  });
}
