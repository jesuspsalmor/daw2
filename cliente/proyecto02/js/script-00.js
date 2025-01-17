//primer intento
const SERVER="http://localhost:4000";
window.addEventListener('load',function(){
    document.getElementById('addProduct').addEventListener('submit', (event)=>{
        event.preventDefault();
        let idProd=document.getElementById('id-prod').value
        if(isNaN(idProd) || idProd==""){
            alert("Debes introducir un número")
        }else{
            const datos= getProd(idProd)
            console.log(datos);
            //pintamos los datos en la página
            document.getElementById('p1').innerHTML=datos.nombre + " " +datos.precio
        }
    })
})

function getProd(idProd){
    const peticion=new XMLHttpRequest();
    peticion.open('GET', SERVER + '/productos/?id='+idProd);
    peticion.send();
    peticion.addEventListener('load', function(){
        if(peticion.status===200){
            const datos=JSON.parse(peticion.responseText); 
            console.log(datos);
            return datos;
        } else {
            console.error('Error '+ peticion.status +'('+peticion.statusText +') en la peticion');
        }
    })
    peticion.addEventListener('error', ()=>console.error("error en la petición HTTP"));
}