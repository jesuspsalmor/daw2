import { Computadora } from "./Computadora.js";

export class Orden{
    static contadorOrdenes=0;
    constructor(){
        this.idOrden=++Orden.contadorOrdenes
        this.computadoras=[]
    }
    agregarComputadora(computadora){
        this.computadoras.push(computadora)
    }
     
    mostrarOrden(){
        let orden=`Orden :${this.idOrden.formato()}`
        let cadena=orden
        cadena+=this.computadoras.reduce((cadena,computadora)=>
            cadena+computadora.toString()+`\n`,"");

        return cadena
    }
    
}