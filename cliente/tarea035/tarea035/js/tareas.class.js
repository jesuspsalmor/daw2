export class Tarea {
    static autoin = 1;
    constructor(nombre, descripcion) {
        this.nombre = nombre;
        this.descripcion = descripcion;
        this.id = Tarea.autoin++;
        this.completada = false; // Inicialmente no completada
        this.eliminada = false; // Inicialmente no eliminada
    }

    crearElemento(tag, className, value = '', disabled = true) {
        let element = document.createElement(tag);
        if (className) element.classList.add(className);
        if (tag === 'input' && value) {
            element.type = 'text';
            element.value = value;
            element.disabled = disabled;
        } else if (tag === 'textarea' && value) {
            element.value = value;
            element.disabled = disabled;
        }
        return element;
    }

    mostrarTarea(arrayTareas) {
        if (this.eliminada) return; // No mostrar si está eliminada

        let divTarjeta = document.createElement('div');
        divTarjeta.classList.add('tarjeta');
        if (this.completada) divTarjeta.classList.add('terminada');

        let inputNombreTarea = this.crearElemento('input', 'inputNombre', this.nombre);
        let textareaDescripcionTarea = this.crearElemento('textarea', 'textareaDescripcion', this.descripcion);

        // Crear checkbox y etiqueta para marcar como completada
        let divCompletada = document.createElement('div');
        divCompletada.classList.add('divCompletada');
        
        let checkboxCompletada = document.createElement('input');
        checkboxCompletada.type = 'checkbox';
        checkboxCompletada.checked = this.completada;
        
        let etiquetaCompletada = document.createElement('span');
        etiquetaCompletada.textContent = this.completada ? 'Desmarcar' : 'Marcar como hecha';
        
        checkboxCompletada.addEventListener('change', () => {
            this.completada = checkboxCompletada.checked;
            etiquetaCompletada.textContent = this.completada ? 'Desmarcar' : 'Marcar como hecha';
            divTarjeta.classList.toggle('terminada', this.completada);
            inputNombreTarea.classList.toggle('terminada', this.completada);
            textareaDescripcionTarea.classList.toggle('terminada', this.completada);
        });
        
        divCompletada.append(checkboxCompletada, etiquetaCompletada);
        
        // Crear botón "Eliminar"
        let botonEliminar = document.createElement('button');
        botonEliminar.classList.add('botonEliminar');
        botonEliminar.textContent = 'Eliminar';
        botonEliminar.addEventListener('click', () => this.borrartarea(divTarjeta));

        // Crear botón "Modificar"
        let botonModificar = document.createElement('button');
        botonModificar.classList.add('botonModificar');
        botonModificar.textContent = 'Modificar';
        botonModificar.addEventListener('click', () => {
            const editando = botonModificar.textContent === 'Guardar';
            [inputNombreTarea, textareaDescripcionTarea].forEach(input => input.disabled = editando);
            if (editando) {
                this.nombre = inputNombreTarea.value;
                this.descripcion = textareaDescripcionTarea.value;
                alert('Tarea modificada');
            }
            botonModificar.textContent = editando ? 'Modificar' : 'Guardar';
        });

        divTarjeta.append(inputNombreTarea, textareaDescripcionTarea, divCompletada, botonEliminar, botonModificar);
        document.querySelector('.tareas').appendChild(divTarjeta);
    }

    borrartarea(divTarjeta) {
        this.eliminada = true;
        divTarjeta.style.display = 'none';
    }
}
