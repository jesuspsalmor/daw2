import { DispositivoEntrada } from "./DispositivoEntrada.js"

export class Raton  extends DispositivoEntrada{
    static contadorRatones=0
    constructor(){
        super(DispositivoEntrada)
        this._idRaton=++Raton.contadorRatones
       
        
    }
    toString(){
          let cadena=`Raton nº: R${this._idRaton.formato()} Tipo:  ${this.tipoEntrada} Marca: ${this.marca.primeraP()}`
            return cadena
        }
    // set idRaton(idRaton){
    //     this._idRaton=idRaton
    // }
    // get idRaton(){
    //     return this._idRaton
    // }
    // get contadorRatones(){
    //     return this._contadorRatones
    // }
    // set DispositivoEntrada(DispositivoEntrada){
    //     this.DispositivoEntrada=DispositivoEntrada
    // }


}
