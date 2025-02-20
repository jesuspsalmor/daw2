document.addEventListener('DOMContentLoaded', () => {
    const numeroOculto = Math.floor(Math.random() * 1000) + 1;
    let intento=1;
    document.getElementById('formulario').addEventListener('submit', (event) => {
        event.preventDefault();
        const numeroIn = parseInt(document.getElementById('numeroIn').value, 10);
        const respuesta=document.getElementById('respuesta');
        
        console.log(numeroIn);
        if(numeroIn===numeroOculto){
            respuesta.innerText=`bravoooo has acertado (en ${intento} intentos`;
        }else{
            if(numeroIn>numeroOculto){
                
                respuesta.innerText=`te pasaste(intento numero ${intento})`;
                intento++;
            }else{
                
                respuesta.innerText=`te quedaste corto(intento numero ${intento})`;
                intento++;
            }
        }
    
    document.getElementById('rendirse').addEventListener('click',()=>{
        respuesta.innerText=`el nueemro oculto eraaaaaa.....${numeroOculto} nectesitaste ${intento-1} intentos`;
    })
    
    });
});
