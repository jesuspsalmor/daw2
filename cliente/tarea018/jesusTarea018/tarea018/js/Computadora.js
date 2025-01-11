import { Teclado } from "./Teclado.js"
import { Raton } from "./Raton.js"
import { Monitor } from "./Monitor.js"
export class Computadora {
    static contadorComputadoras=0
    constructor(){
        this._idComputadora=++Computadora.contadorComputadoras
        this._nombre
        this.monitor=Monitor
         this.teclado=Teclado 
         this.raton=Raton
         

    }

     toString(){
        return  `\nPC id: PC${this._idComputadora.formato()} ${this.nombre} 
        \n ${this.monitor.toString()}\n ${this.teclado.toString()}\n ${this.raton.toString()} `
     }
    
}