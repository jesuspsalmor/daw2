
// control de errores con fetch en POST
const SERVER = "http://localhost:4000"; // URL corregida

window.addEventListener("load", () => {
  document.getElementById("addProduct").addEventListener("submit", (event) => {
    event.preventDefault();

    const nuevoProducto = {
      nombre: document.getElementById("nombre").value,
      precio: document.getElementById("precio").value,
    };

    fetch(SERVER + "/productos", {
      method: "POST",
      body: JSON.stringify(nuevoProducto),
      headers: {
        "Content-Type": "application/json",
      },
    })
      .then((response) => {
        if (!response.ok) {
          // Aquí se controla un error HTTP
          throw new Error(
            `Error HTTP: ${response.status} - ${response.statusText}`
          );
        }
        return response.json(); // Intentamos parsear la respuesta
      })
      .then((dato2) => {
        console.log(dato2);
        document.getElementById("p1").innerText = `${dato2.nombre}: ${dato2.precio}`;
      })
      .catch((error) => {
        console.error(error);
        document.getElementById("p1").innerText =
          "No ha sido posible dar de alta el producto. " + error.message;
      });
  });
});
