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
  let radioIngles= document.getElementById('eng');
  let opciones = paises.map(pais => pais.translations.spa.common).sort();
  if(radioIngles.checked){
    opciones = paises.map(pais => pais.translations.spa.common).sort();
    console.log('ingles');
  }
   const listaNombres=document.getElementById("listaPaises");
    opciones.forEach(opcion => {
        const elementoOpcion=document.createElement('option');
        elementoOpcion.value=opcion;
        listaNombres.appendChild(elementoOpcion)
    });
}
document.addEventListener('submit', (event) => {
  event.preventDefault(); 

  let paisselecionado = document.getElementById('nombre').value;
  let radioIngles= document.getElementById('eng');
  console.log(radioIngles);
  let infoPais = paisesGuardados.find(pais => pais.translations.spa.common === paisselecionado);
  if(radioIngles.checked){
     infoPais = paisesGuardados.find(pais => pais.name.common === paisselecionado);
  }
  
   
  if (infoPais) {
    let nombreOficial = infoPais.translations.spa.official;
    if(radioIngles.checked){
      nombreOficial = infoPais.name.official
      console.log('ingles');
    }
    const bandera = infoPais.flags.png;
    const poblacion = infoPais.population;

    const divNombreOficial = document.getElementById('nombreOficial');
    const divBandera = document.getElementById('bandera');
    const divPoblacion = document.getElementById('poblacion');

    divNombreOficial.textContent = `Nombre oficial: ${nombreOficial}`;
    divBandera.innerHTML = `<img src="${bandera}" alt="Bandera de ${nombreOficial}">`;
    divPoblacion.textContent = `Población: ${poblacion.toLocaleString()}`;
    document.getElementById('nombre').value = ''; 
  } else {
    console.log("País no encontrado");
  }
});


