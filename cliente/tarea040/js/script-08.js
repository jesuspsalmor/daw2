const SERVER = "http://localhost:4000";

document.addEventListener("DOMContentLoaded", () => {
  document.getElementById("consultarProducto").addEventListener("submit", (event) => {
    event.preventDefault();
    let idProd = document.getElementById("id-prod").value;

    if (isNaN(idProd) || idProd.trim() === "") {
      alert("Debes introducir un número");
    } else {
      getData(idProd)
        .then((datos) => {
          const nombre = document.getElementById("nombre");
          nombre.value = datos.nombre;
          const precio = document.getElementById("precio");
          precio.value = datos.precio;
          const formModificar = document.getElementById("modificarProducto");
          formModificar.style.display = "block";
        })
        .catch((err) => {
          console.error("Error fetching data:", err);
          document.getElementById("p1").innerHTML = `Error: ${err}`;
        });
    }
  });

  document.getElementById("modificarProducto").addEventListener("submit", async (event) => {
    event.preventDefault();
    
    const nombre = document.getElementById("nombre").value;
    const precio = document.getElementById("precio").value;
    const idProd = document.getElementById("id-prod").value;  // Obtener el ID del producto
    
    try {
      if (nombre && precio) {
        // Si ambos campos han cambiado, usar PUT
        const resultado = await putData(idProd, { nombre, precio });
        console.log('Datos modificados:', resultado);
      } else if (nombre || precio) {
        // Si solo un campo ha cambiado, usar PATCH
        const campo = nombre ? "nombre" : "precio";
        const valor = nombre || precio;
        const resultado = await patchData(idProd, { campo, valor });
        console.log('Dato modificado:', resultado);
      } else {
        alert("No se ha hecho ningún cambio");
      }
    } catch (err) {
      console.error('Error:', err);
    }
  });
});

async function getData(idProd) {
  const response = await fetch(`${SERVER}/productos?id=${idProd}`);

  if (!response.ok) {
    throw `Error ${response.status} de la BBDD: ${response.statusText}`;
  }

  const datos = await response.json();
  return datos;
}

async function putData(id, datos) {
  const response = await fetch(`${SERVER}/productos/${id}`, {
    method: 'PUT',
    headers: {
      'Content-Type': 'application/json'
    },
    body: JSON.stringify(datos)
  });

  if (!response.ok) {
    throw new Error(`Error ${response.status}: ${response.statusText}`);
  }

  const resultado = await response.json();
  return resultado;
}

async function patchData(id, datos) {
  const response = await fetch(`${SERVER}/productos/${id}`, {
    method: 'PATCH',
    headers: {
      'Content-Type': 'application/json'
    },
    body: JSON.stringify(datos)
  });

  if (!response.ok) {
    throw new Error(`Error ${response.status}: ${response.statusText}`);
  }

  const resultado = await response.json();
  return resultado;
}
