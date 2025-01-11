import { Tarea } from "./tareas.class.js";

document.addEventListener('DOMContentLoaded', () => {
    const arrayTareas = [];

    document.getElementById('form-addtarea').onsubmit = function(event) {
        event.preventDefault(); // Prevenir la recarga de la página
        console.log('Formulario de nueva tarea enviado');

        // Obtener los valores de los campos de entrada
        let nombreTarea = document.getElementById('nombre').value;
        let descripcionTarea = document.getElementById('descripcion').value;
        
        // Crear una nueva instancia de Tarea con el nombre y la descripción
        let nuevaTarea = new Tarea(nombreTarea, descripcionTarea);
        
        // Añadir la nueva tarea al array de tareas
        arrayTareas.push(nuevaTarea);
        
        // Mostrar todas las tareas en la interfaz
        document.querySelector('.tareas').innerHTML = ''; // Limpiar tareas previas
        arrayTareas.forEach(element => {
            element.mostrarTarea(); // Mostrar cada tarea
        });
        
        // Vaciar los campos de entrada
        document.getElementById('nombre').value = '';
        document.getElementById('descripcion').value = '';
        
        // Mostrar el array de tareas en la consola
        console.log(arrayTareas);
    };
});

