//const API_BASE_URL="localhost:40002/" // no se utilzia por servir página estática express

import { funcionesProductos } from "./funciones-productos.js";
//import { funcionesCategorias } from "./funciones-categorias.js";

document.addEventListener("DOMContentLoaded", () => {
    const content = document.getElementById("content");

    // Cargar el formulario HTML de productos
    const loadForm = async (section) => {
      try{  
        switch(section) {
            case "productos-lista":
                const productosList = await fetch('forms/productos-lista.html');
                if (!productosList.ok) {
                    throw new Error('No se pudo cargar el formulario de productos');
                }
                
                let texto=await productosList.text();
                //content.innerHTML = await productosList.text();
                console.log(texto);
                content.innerHTML = texto;
                funcionesProductos.cargarProductos();
                break;
            case "productos-agregar":
                const productosAgregar = await fetch('forms/productos-agregar.html');
                content.innerHTML = await productosAgregar.text();
                break;
            case "productos-modificar":
                const productosmodificar = await fetch('forms/productos-modificar.html');
                content.innerHTML = await productosmodificar.text();
                funcionesProductos.cargarCategorias();
                document.getElementById('productoID').addEventListener("change",(event)=>{
                    const id =event.target.value;
                    console.log(id)
                    if(id){
                        funcionesProductos.cargarProductoPorId(id);
                    }
                })
                document.querySelector(`#formmodificarProducto`).addEventListener('submit',funcionesProductos.actualizarProducto);
            
                break;
            case "categorias-lista":
                const categoriasList = await fetch('forms/categorias-lista.html');
                content.innerHTML = await categoriasList.text();
                break;
            case "categorias-agregar":
                const categoriasAgregar = await fetch('forms/categorias-agregar.html');
                content.innerHTML = await categoriasAgregar.text();
                break;
            case "almacen":
                content.innerHTML = "<h2>Gestión de Almacén</h2><p>Aquí puedes gestionar los productos en el almacén.</p>";
                break;
            default:
                content.innerHTML = "<p>Seleccione una opción.</p>";
        }
        // Hacemos visible la sección cargada
        const seccionDiv = document.getElementById(section);
        seccionDiv.classList.remove('hidden');  // Elimina la clase 'hidden'
      } catch (error){
        console.log("Error al cargar el formulario:", error);
        
      }
    };

    document.querySelectorAll('.dropdown-item, .nav-link').forEach(link => {
        link.addEventListener('click', (e) => {
            e.preventDefault();
            const targetSection = e.target.getAttribute('data-section');
            loadForm(targetSection);
        });
    });
});
