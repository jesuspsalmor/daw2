const url = "https://restcountries.com/v3.1/all";
export let paisesGuardados = [];

export const obtenerPaises = () => new Promise((resolve, reject) => {
    const peticion = new XMLHttpRequest();
    peticion.open("GET", url);
    peticion.send();
    peticion.onload = () => peticion.status === 200 ? resolve(JSON.parse(peticion.responseText)) : reject("Error al obtener los datos.");
});

export const listaNombres = (idioma) => paisesGuardados.map((pais) => idioma === "esp" ? pais.translations.spa.common : pais.name.common).sort();
