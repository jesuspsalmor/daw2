// Función para obtener productos desde el servidor
// también post de nuevo producto

import { funcionesCategorias } from "./funciones-categorias.js";

const obtenerProductos = async () => {
    try {
        // Realiza la solicitud a la API de productos
        const respuesta = await fetch("/productos"); // IP y PORT ya los obtiene del servidor

        if (!respuesta.ok) {
            console.log('mal');
            
            throw new Error("Error al cargar los productos");
        }
        // Devuelve los productos en formato JSON
        return await respuesta.json();
    } catch (error) {
        console.error("Error al obtener productos:", error);
        throw error; // Lanza el error para que quien llame a la función lo maneje
    }
};

// Función para pintar productos en la lista
/*
const pintarProductos = (productos) => {
    const listaProductos = document.getElementById("lista-productos");
    
    // Limpia la lista de productos antes de agregar nuevos
    listaProductos.innerHTML = "";

    if (productos.length === 0) {
        listaProductos.innerHTML = "<li class='list-group-item'>No hay productos disponibles.</li>";
        return;
    }

    // Itera sobre los productos y los agrega a la lista
    productos.forEach((producto, index) => {
    
        const nuevoLi = document.createElement("li");
        nuevoLi.className = "list-group-item";
        nuevoLi.textContent = `${producto.nombre} - ${parseFloat(producto.precio).toFixed(2)} € - (${producto.id_cat || "Sin categoría"})`;
        //nuevoLi.textContent = `${producto.nombre}`

        
        listaProductos.appendChild(nuevoLi);
    });
    
};
*/
/*
const pintarProductos = async (productos) => {  
    const listaProductos = document.getElementById("lista-productos");
    
    // Limpia la lista de productos antes de agregar nuevos
    listaProductos.innerHTML = "";

    if (productos.length === 0) {
        listaProductos.innerHTML = "<li class='list-group-item'>No hay productos disponibles.</li>";
        return;
    }

    // Obtener las categorías desde el servidor
    const categorias = await funcionesCategorias.obtenerCategorias();

    // Crear un mapa de id_cat -> nombre de la categoría
    const categoriasMap = categorias.reduce((map, categoria) => {
        map[categoria.id] = categoria.nombre;
        return map;
    }, {})


    // Itera sobre los productos y los agrega a la lista
    productos.forEach((producto, index) => {
    
        const nuevoLi = document.createElement("li");
        nuevoLi.className = "list-group-item";
        // obtener nombre de la categoría
        const categoriaNombre = categoriasMap[producto.id_cat] || "Sin categoría";
        //nuevoLi.textContent = `${producto.nombre} - ${parseFloat(producto.precio).toFixed(2)} € - (${producto.id_cat || "Sin categoría"})`;
        nuevoLi.textContent = `${producto.nombre} - ${parseFloat(producto.precio).toFixed(2)} € - (${categoriaNombre})`;

        
        listaProductos.appendChild(nuevoLi);
    });
    
};
*/

const pintarProductos = async (productos) => {
    const listaProductos = document.getElementById("lista-productos");
    
    // Limpia la tabla antes de agregar nuevos productos
    listaProductos.innerHTML = "";

    if (productos.length === 0) {
        listaProductos.innerHTML = "<tr><td colspan='5' class='text-center'>No hay productos disponibles.</td></tr>";
        return;
    }

    // Obtener las categorías desde el servidor
    const categorias = await funcionesCategorias.obtenerCategorias();

    // Crear un mapa de id_cat -> nombre de la categoría
    const categoriasMap = categorias.reduce((map, categoria) => {
        map[categoria.id] = categoria.nombre;
        return map;
    }, {});

    // Iterar sobre los productos y agregarlos a la tabla
    productos.forEach((producto) => {
        const nuevaFila = document.createElement("tr");

        // Obtener el nombre de la categoría
        const categoriaNombre = categoriasMap[producto.id_cat] || "Sin categoría";

        // Crear las celdas de la fila
        nuevaFila.innerHTML = `
            <td>${producto.id}</td>
            <td>${producto.nombre}</td>
            <td>${parseFloat(producto.precio).toFixed(2)} €</td>
            <td>${categoriaNombre}</td>
            <td>
                <button class="btn btn-warning btn-sm me-2 btn-editar" >
                    <i class="bi bi-pencil-square">edit</i>
                </button>
                <button class="btn btn-danger btn-sm btn-eliminar" >
                    <i class="bi bi-trash">elim</i>
                </button>
            </td>
        `;
          // Asignar eventos a los botones
        const btnEditar = nuevaFila.querySelector(".btn-editar");
        const btnEliminar = nuevaFila.querySelector(".btn-eliminar");

        btnEditar.addEventListener("click", () => editarProducto(producto.id));
        btnEliminar.addEventListener("click", () => eliminarProducto(producto.id))
        // Añadir la fila a la tabla
        listaProductos.appendChild(nuevaFila);
    });
};


// Función principal para cargar y pintar productos
const cargarProductos = async () => {
    try {
        const productos = await obtenerProductos();
        console.log(productos);
        
        pintarProductos(productos);
    } catch (error) {
        //console.log(listaProductos);
        
        //listaProductos.innerHTML = "<li class='list-group-item text-danger'>Error2 al pintar productos.</li>";
        updateFooterMessage('Ocurrió un error', error);
    }
};

const guardarProducto = async ()=>{
    const formCrearProducto=document.getElementById('form-productos');
    const nuevoNombre=document.getElementById("producto-nombre").value;
    const nuevoPrecio=document.getElementById("producto-precio").value;
    const nuevaCategoria=document.getElementById("producto-categoria").value;
    
    // todos los campos estén completos
    if (!nuevoNombre || !nuevoPrecio || !nuevaCategoria) {
        alert("Todos los campos son obligatorios");
        return;
    }
    
    //extraer el id-cat
    //console.log(nuevaCategoria);
    const idCat= nuevaCategoria.split("-")[0].trim()
    //console.log(idCat);

    // Crear un objeto con los datos del nuevo producto
    const nuevoProducto = {
        nombre: nuevoNombre,
        precio: parseFloat(nuevoPrecio), // convertir el precio a un número
        idCategoria: idCat  // en el lasdo servidor llamo lo idCategoria a lo que va en body
    };

    try {
        // Realizar la solicitud POST al servidor
        const respuesta = await fetch('/productos', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json', // indicar que el cuerpo es JSON
            },
            body: JSON.stringify(nuevoProducto), // Convierte el objeto en una cadena JSON
        });

        if (!respuesta.ok) {
            throw new Error("Error al guardar el producto");
        }

        // Obtener la respuesta JSON
        const resultado = await respuesta.json();
        console.log("Producto creado:", resultado);

        // Muestra un mensaje o actualiza la UI
        alert(`Producto creado con éxito: ${resultado.nombre}`);
        
        // limpiar el formulario después de enviar el producto
        formCrearProducto.reset();

        // Opcional: recargar la lista de productos si estás mostrando todos los productos
        cargarProductos(); // Esto asume que tienes la función cargarProductos para actualizar la lista
    } catch (error) {
        console.error("Error al guardar el producto:", error);
        alert("Hubo un problema al guardar el producto.");
    }
};

const eliminarProducto = async (idProducto) => { 
    const confirmar = confirm(`¿Estás seguro de eliminar el producto con ID: ${idProducto}?`);
    if (!confirmar) return;

    try {
        const respuesta = await fetch(`/productos/${idProducto}`, {
            method: "DELETE",
        });

        if (!respuesta.ok) {
            throw new Error("Error al eliminar el producto");
        }

        alert("Producto eliminado con éxito");
        // Recargar la lista de productos
        cargarProductos();
    } catch (error) {
        console.error("Error al eliminar el producto:", error);
        alert("No se pudo eliminar el producto.");
    }
};

/*
const eliminarProducto = async (idProducto) => {
    const confirmar = confirm(`¿Estás seguro de eliminar el producto con ID: ${idProducto}?`);
    if (!confirmar) return;

    try {
        const respuesta = await fetch(`/productos/${idProducto}`, {
            method: "DELETE",
        });

        if (!respuesta.ok) {
            throw new Error("Error al eliminar el producto");
        }

        // Mostrar mensaje de éxito en el modal
        mostrarModalAlert("Éxito", "Producto eliminado con éxito");

        // Recargar la lista de productos
        cargarProductos();
    } catch (error) {
        console.error("Error al eliminar el producto:", error);

        // Mostrar mensaje de error en el modal
        mostrarModal("Error", "No se pudo eliminar el producto.");
    }
};
*/

/*
const eliminarProducto = async (idProducto) => {
    mostrarModalConfirmacion(`¿Estás seguro de eliminar el producto con ID: ${idProducto}?`, async () => {
        try {
            const respuesta = await fetch(`/productos/${idProducto}`, {
                method: "DELETE",
            });

            if (!respuesta.ok) {
                throw new Error("Error al eliminar el producto");
            }

            // Mostrar mensaje de éxito en un modal
            window.alert("Producto eliminado con éxito")
            //mostrarModalAlert("Éxito", "Producto eliminado con éxito");

            // Recargar la lista de productos
            cargarProductos();
        } catch (error) {
            console.error("Error al eliminar el producto:", error);

            // Mostrar mensaje de error en el modal
            //mostrarModalAlert("Error", "No se pudo eliminar el producto.");
            window.alert("No se pudo eliminar el producto.")
        }
    });
};
*/

 const editarProducto = (idProducto) => { 
    alert(`Editar producto con ID: ${idProducto}`);
    // Aquí puedes abrir un formulario con los datos del producto para editarlo
};

const cargarCategorias= async()=>{
    try {
        const response= await fetch('/categorias');
        const categorias= await response.json();
        if(!response.ok){
            throw new Error ("categorias no disponibles");
        }
        const select =document.getElementById("productoCategoria");
        select.innerHTML="";

        categorias.forEach(cat=>{
            const option=document.createElement("option");
            option.value=cat.id;
            option.textContent=cat.nombre;
            select.appendChild(option);
        })
    } catch (error) {
        console.log("mal",error);
    }
}
 async function cargarProductoPorId(id) {
try {
    await funcionesProductos.cargarCategorias();
    const response = await fetch (`/productos/`+id);
    const producto = await response.json();
    document.querySelector('#productoNombre').value=producto.nombre;
    document.querySelector('#productoPrecio').value=producto.precio;
    document.querySelector('#productoCategorria').value=producto.id_cat;
} catch (error) {
 console.log(error);
}
}

const actualizarProducto=async (event)=>{
    event.preventDefault();
    const id =document.querySelector('#productoID').value;
    const nombre=document.querySelector('#productoNombre').value;

    const  precio=document.querySelector('#productoPrecio').value;
    const nuevoId_cat=document.querySelector('#productoCategoria').value;
    const  productoNuevo={
        "nombre":nombre,
        "precio":precio,
        "id_categoria":nuevoId_cat
    }
    console.log(productoNuevo);
    try {
        const response=await fetch(`/productos/${id}`,{
            method:"PUT",
            headers:{"Content-Type":"application/json",

            },
            body:JSON.stringify(productoNuevo),
        });
        if(!response.ok){
            throw new Error("eeeerorrr");
            
        }
        window.alert("producto actualizado");
    } catch (error) {
        
    }
}

export const funcionesProductos={
    obtenerProductos,
    pintarProductos,
    cargarProductos,
    guardarProducto,
    eliminarProducto,
    editarProducto, 
    cargarCategorias,
    cargarProductoPorId,
    actualizarProducto
};


