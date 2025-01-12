export const actualizarLista = (lista) => {
    const dataList = document.getElementById("listaPaises");
    dataList.innerHTML = ""; // Limpia la lista anterior
    lista.forEach((opcion) => dataList.innerHTML += `<option value="${opcion}"></option>`);
};

export const mostrarDetallesPais = (pais, idioma) => {
    const nombreOficial = idioma === "esp" ? pais.translations.spa.official : pais.name.official;
    const { flags: { png: bandera }, population: poblacion } = pais;

    document.getElementById('nombreOficial').textContent = `Nombre oficial: ${nombreOficial}`;
    document.getElementById('bandera').innerHTML = `<img src="${bandera}" alt="Bandera de ${nombreOficial}">`;
    document.getElementById('poblacion').textContent = `Población: ${poblacion.toLocaleString()}`;
};
