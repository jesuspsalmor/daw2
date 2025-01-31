
// Función para obtener categorias desde el servidor
const obtenerCategorias = async () => {
    try {
        // Realiza la solicitud a la API de categorias
        const respuesta = await fetch("/categorias"); // IP y PORT ya los obtiene del servidor

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
const pintarCategorias = (categorias) => {
    const listaCategorias = document.getElementById("lista-categorias");
    
    // Limpia la lista de productos antes de agregar nuevos
    listaCategorias.innerHTML = "";

    if (categorias.length === 0) {
        listaCategorias.innerHTML = "<li class='list-group-item'>No hay categorias disponibles.</li>";
        return;
    }

    // Itera sobre las categorias y los agrega a la lista
    categorias.forEach((categoria, index) => {
    
        const nuevoLi = document.createElement("li");
        nuevoLi.className = "list-group-item";
        nuevoLi.textContent = `${categoria.id} - ${categoria.nombre})`;
                
        listaCategorias.appendChild(nuevoLi);
    });
    
};

// Función principal para cargar y pintar categorias al final html
const cargarCategorias = async () => {
    try {
        const categorias = await obtenerCategorias();
        //console.log(categorias);
        
        pintarCategorias(categorias);
    } catch (error) {
        listaCategorias.innerHTML = "<li class='list-group-item text-danger'>Error2 al pintar categorias.</li>";
    }
};

const anadirSelectCategorias= async() =>{
    const selectCategorias=document.getElementById('producto-categoria');
    //console.log(selectCategorias);
    
    try {
        const categorias=await obtenerCategorias();
        categorias.forEach((categoria)=>{
            const nuevaOption=document.createElement('option');
            nuevaOption.text=`${categoria.id} - ${categoria.nombre}`;
            selectCategorias.add(nuevaOption);
        })
    } catch (error) {
        
    }
}

export const funcionesCategorias={
    obtenerCategorias,
    pintarCategorias,
    cargarCategorias,
    anadirSelectCategorias
};
