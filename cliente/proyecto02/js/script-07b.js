
// fetch con async/await
// tratando errores con try-catch también en getData()
const SERVER = "http://localhot:4000";

window.addEventListener("load", () => {
  document
    .getElementById("addProduct")
    .addEventListener("submit", async (event) => {
      event.preventDefault();
      let idProd = document.getElementById("id-prod").value;
      if (isNaN(idProd) || idProd.trim() == "") {
        alert("Debes introducir un número");
      } else {
        try {
          const datos = await getData(idProd);
          // La ejecución se para en la sentencia anterior hasta que
          // contesta la función getData
          document.getElementById("p1").innerHTML =
            datos.nombre + ":  " + datos.precio;
        } catch (err) {
          console.log("mal");
          console.error(err);
          document.getElementById("p1").innerHTML = err;
          return;
        }
      }
    });
});

async function getData(idProd) {
  try {
    const response = await fetch(SERVER + "/productos?id=" + idProd);
    if (!response.ok) {
      throw `Error ${response.status} de la BBDD: ${response.statusText}`;
    }
    const datos = await response.json();
    return datos;
  } catch (error) {
    // Manejar errores internos a getProd()
    console.error("Error de RED en getProd:", error);
    throw error; // O relanzar el error si es necesario
  }
}
