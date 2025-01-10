const url = "https://restcountries.com/v3.1/all";
let paisesGuardados=[];
obtenerPaises()
  .then((paises) => {
    console.log(paises);
    paisesGuardados=paises
    anadirLista(paises);
  }).catch((error)=>{
    console.log(error)
  });
function obtenerPaises() {
  return new Promise((resolve, reject) => {
    const peticion = new XMLHttpRequest();
    peticion.open("GET", url);
    peticion.send();
    peticion.addEventListener("load", () => {
      if (peticion.status === 200) {
        resolve(JSON.parse(peticion.responseText));
      } else {
        reject("eerror");
      }
    });
  });
}
 function anadirLista(paises){
    const opciones = paises.map(pais => pais.name.common).sort();
    const listaNombres=document.getElementById("listaPaises");
    opciones.forEach(opcion => {
        const elementoOpcion=document.createElement('option');
        elementoOpcion.value=opcion;
        listaNombres.appendChild(elementoOpcion)
    });
}
document.addEventListener('submit', (event) => {
  event.preventDefault(); // Para evitar que el formulario se envíe y la página se recargue
  const paisselecionado = document.getElementById('nombre').value;
  const infoPais = paisesGuardados.find(pais => pais.name.common === paisselecionado);
  if (infoPais) {
    const nombreOficial = infoPais.name.official;
    const bandera = infoPais.flags.png;
    const poblacion = infoPais.population;

    const divNombreOficial = document.getElementById('nombreOficial');
    const divBandera = document.getElementById('bandera');
    const divPoblacion = document.getElementById('poblacion');

    divNombreOficial.textContent = `Nombre oficial: ${nombreOficial}`;
    divBandera.innerHTML = `<img src="${bandera}" alt="Bandera de ${nombreOficial}">`;
    divPoblacion.textContent = `Población: ${poblacion.toLocaleString()}`;
  } else {
    console.log("País no encontrado");
  }
});


