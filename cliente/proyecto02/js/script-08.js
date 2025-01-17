
// tratando errores en fetch (async-await)
// sin utilizar try-catch (subscribiendonos al .catch directamente)
const SERVER = "http://localhost:4000";

window.addEventListener("load", () => {
  document
    .getElementById("addProduct")
    .addEventListener("submit", (event) => {
      event.preventDefault();
      let idProd = document.getElementById("id-prod").value;

      if (isNaN(idProd) || idProd.trim() === "") {
        alert("Debes introducir un número");
      } else {
        getData(idProd)
          .then((datos) => {
            const nombre=document.getElementById("nombre");
            nombre.value=datos.nombre;
            const precio=document.getElementById("precio");
            precio.value=datos.precio;
            const formModificar=document.getElementById("modificarProducto");
            formModificar.style.display("block");

              
          })
          .catch((err) => {
            console.log("mal");
            console.error(err);
            document.getElementById("p1").innerHTML = err;
          });
      }
    });
});

async function getData(idProd) {
  const response = await fetch(SERVER + "/productos?id=" + idProd);

  if (!response.ok) {
    throw `Error ${response.status} de la BBDD: ${response.statusText}`;
  }

  const datos = await response.json();
  return datos;
}
