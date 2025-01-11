import { DispositivoEntrada } from "./DispositivoEntrada.js";

export class Teclado extends DispositivoEntrada{
    static contadorTeclados=0
    constructor(){
        super(DispositivoEntrada)
        this._idTeclado=++Teclado.contadorTeclados;
        
    }
    toString(){
        return `Teclado nº: T${this._idTeclado.formato()} Tipo:  ${this.tipoEntrada} Marca: ${this.marca.primeraP()}`
    }
    
}