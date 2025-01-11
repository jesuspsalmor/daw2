document.body.style.overflow = 'hidden';
const canvas = document.getElementById('lienzo');
const ctx = canvas.getContext('2d');
canvas.width = window.innerWidth;
canvas.height = window.innerHeight;

//const colorFondo= 'rgba(255, 255, 0, 0.3)';  // las bolas dejan estela por ser un fondo semi-transparente
//const colorFondo='yellow' // no dejan estela
const colorFondo = `rgb(${aleatorioEntre(0, 255)},${aleatorioEntre(0, 255)},${aleatorioEntre(0, 255)}, 0.3)`; //con estela
//const colorFondo = `rgb(${aleatorioEntre(0, 255)},${aleatorioEntre(0, 255)},${aleatorioEntre(0, 255)})`; // sin estela

const arrayBolas = []; //array donde guardaremos las bolas

const minBolas=5; //min número de bolas
const maxBolas=25; // max número de bolas

const minRadio=5; //min tamaño en pix de radio
const maxRadio=40; // max tamaño en pix de radio

const minVelo= -17; //min valor en pix de velocidad
const maxVelo= 17; // max valor en pix de velocidad


//genera un número aleatorio entre dos valores
function aleatorioEntre(min, max) {
    let num = Math.floor(Math.random() * (max - min + 1)) + min;
    return num;
}
  
class Bola{
    constructor(){ // las bolas se crean con un radio y un centro (x, y)
        this.radio = aleatorioEntre(minRadio,maxRadio);
        this.x = aleatorioEntre(this.radio + 1, canvas.width);
        this.y = aleatorioEntre(this.radio + 1, canvas.height);
        this.vx = aleatorioEntre(minVelo,maxVelo);
        this.vy = aleatorioEntre(minVelo,maxVelo);
        this.color = "rgba(" + aleatorioEntre(0,255) + ","+aleatorioEntre(0,255) + "," + aleatorioEntre(0,255) ;
    }
    pintar(){
        this.x += this.vx;
        this.y+=this.vy; 
        ctx.beginPath(); 
        ctx.arc(this.x, this.y, this.radio, 0, Math.PI * 2, true);
        ctx.fillStyle = this.color;
        ctx.fill();
    }
    chocarParedes(){ //Invertimos velocidad x e y si llega al límite del canvas
        if (this.y + this.radio >= canvas.height || this.y -  this.radio <= 0) {
            this.vy = -this.vy;
        }
        if (this.x + this.radio >= canvas.width || this.x - this.radio <= 0) {
            this.vx = -this.vx;
        }
    }

    chocarConOtrasBolas(){
        //hay choque horizontal si la separación entre los centros de dos bolas es menor
        // a la suma de sus radios. Como no siempre estarán en la misma horizontal: Miramos que 
        // ocurra en la hipotenusa de los dos ejes . Usando el teorema de Pitágoras
            for(let j=0; j<arrayBolas.length;j++){
                // Para que no compruebe la posición con ella misma
               if(this!==arrayBolas[j]){
                   let separacionHorizontal= Math.abs(this.x - arrayBolas[j].x);
                   let separacionVertical= Math.abs(this.y - arrayBolas[j].y);
                //    let tres = Math.sqrt(uno+dos);
                   let separacionReal=Math.sqrt(separacionHorizontal * separacionHorizontal + separacionVertical*separacionVertical);
                   if (separacionReal < this.radio + arrayBolas[j].radio) {
                        this.vx = -this.vx;
                        this.vy = -this.vy;
                   }
                }
            }
    }
}



//generamos varias bolas
for (let i=0; i < aleatorioEntre(minBolas, maxBolas); i++){
    let bola = new Bola();
    arrayBolas.push(bola);
}
  
// Para que haya movimiento contínuo
function bucle() {
   ctx.fillStyle = colorFondo; //color de fondo que se aplica antes de dibujar cada bola en cada instante;
   ctx.fillRect(0, 0, canvas.width, canvas.height);
   //dibujamos las bolas
   for(let i=0; i< arrayBolas.length; i++){
        arrayBolas[i].pintar();
        arrayBolas[i].chocarParedes();
        arrayBolas[i].chocarConOtrasBolas(); 
   }
   requestAnimationFrame(bucle); 
 }
 bucle();