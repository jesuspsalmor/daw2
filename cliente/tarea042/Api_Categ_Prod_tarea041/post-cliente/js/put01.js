

const SERVER = "http://localhost:4000";
let objetoProducto;

// primero hacer get de datos 
document.getElementById("id-prod").addEventListener('change', async (event)=>{
    const idProd=document.getElementById("id-prod").value;
    if (isNaN(idProd) || idProd.trim() == "") {
        alert("id producto no válido");
      } else {
        //const datos = await getProducto(idProd);
        //console.log(datos);
        const datos= getProducto(idProd)
            .then (datos => {
                document.getElementById("nombre").value = datos.nombre;
                document.getElementById("precio").value = datos.precio; 
            })
            .catch(error=>{
                console.error(error);
                alert('No xiste el producto con id: ' + idProd)
            });
    }
})

async function getProducto(idProd) {
    const response = await fetch(SERVER+"/productos/"+idProd);
    if(!response.ok){
        throw `Error ${response.status} de la BBDD: ${response.statusText}`;
    }
    const datos= await response.json();
    return datos
}

// segundo cuando submit (Guardar cambios) hacer PUT
document.getElementById("formModificarProducto")
    .addEventListener('submit', (event)=>{
        event.preventDefault();
        const idProducto= document.getElementById("id-prod").value;
        const nuevosDatos={
            nombre:document.getElementById("nombre").value, 
            precio: document.getElementById("precio").value
        }
        putProducto(idProducto, nuevosDatos)
            .then (arrayInfo=>{
                console.log(arrayInfo);
            })       
    })

async function putProducto(idProd, nuevosDatos) {
    const response = await fetch(SERVER+"/productos/"+idProd, {
        method: "PUT",
        body: JSON.stringify(nuevosDatos),
        headers: {
          "Content-Type": "application/json",
        },
        }
    );
    if(!response.ok){
        throw `Error ${response.status} de la BBDD: ${response.statusText}`;
    }
    const datos= await response.json();
    return datos
}