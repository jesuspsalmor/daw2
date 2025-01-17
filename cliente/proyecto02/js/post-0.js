
// POST con fetch
// solución al ejercicio del final de ajax3

const SERVER = "http://localhos:4000";

window.addEventListener("load", () => {
  document.getElementById("addProduct").addEventListener("submit", (event) => {
    event.preventDefault();
    const nuevoProducto = {
      id: "", // esta línea no es necesaria
      nombre: document.getElementById("nombre").value,
      precio: document.getElementById("precio").value,
    };
    const respuesta = fetch(SERVER + "/productos", {
      method: "POST",
      body: JSON.stringify(nuevoProducto),
      headers: {
        "Content-Type": "application/json",
      },
    });

    respuesta
      .then((dato1) => dato1.json())
      .then((dato2) => {
        //pintamos lo que queramos
        console.log(dato2);
        document.getElementById("p1").
          innerText = `${dato2.nombre}: ${dato2.precio}`;
      })
      .catch(error=>{
        console.log(error);
        document.getElementById("p1").
          innerText = `No ha sido posible dar de alta el producto`;
      });
  });
});
