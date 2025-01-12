import { obtenerPaises, listaNombres, paisesGuardados } from './model.js';
import { actualizarLista, mostrarDetallesPais } from './view.js';

let paisSeleccionado = null;

document.addEventListener("DOMContentLoaded", () => {
    obtenerPaises()
        .then((paises) => {
            paisesGuardados.splice(0, paisesGuardados.length, ...paises);
            actualizarLista(listaNombres(idiomaSeleccionado()));
        })
        .catch(console.error);

    document.querySelectorAll('input[name="idioma"]').forEach((element) => element.addEventListener("click", cambioIdioma));
    document.getElementById("nombre").addEventListener("input", filtrarLista);
    document.getElementById('formulario').addEventListener('submit', buscar);
    localStorage.clear();
    sessionStorage.clear();
});

const idiomaSeleccionado = () => document.querySelector('input[name="idioma"]:checked').value || "Ninguno";

const cambioIdioma = () => {
    actualizarLista(listaNombres(idiomaSeleccionado()));
    if (paisSeleccionado) mostrarDetallesPais(paisSeleccionado, idiomaSeleccionado());
};

const filtrarLista = () => {
    const inputTexto = document.getElementById("nombre").value.toLowerCase();
    const listaFiltrada = listaNombres(idiomaSeleccionado()).filter((nombre) => nombre.toLowerCase().startsWith(inputTexto));
    actualizarLista(listaFiltrada);
};

const buscar = (event) => {
    event.preventDefault();
    const paisselecionadoNombre = document.getElementById('nombre').value;
    const idioma = idiomaSeleccionado();
    const infoPais = paisesGuardados.find(pais => idioma === "esp" ? pais.translations.spa.common === paisselecionadoNombre : pais.name.common === paisselecionadoNombre);

    if (infoPais) {
        paisSeleccionado = infoPais;
        mostrarDetallesPais(infoPais, idioma);
        document.getElementById('nombre').value = '';
    } else {
        console.log("País no encontrado");
    }
};
