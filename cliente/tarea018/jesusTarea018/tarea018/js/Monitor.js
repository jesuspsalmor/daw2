 export class Monitor{
    static contadorMonitores=0;
    constructor(marca,tamano){
        this._idMonitor=++Monitor.contadorMonitores
        this._marca=marca
        this._tamano=tamano
        
    }

    toString(){
        return  `Monitor: M${this._idMonitor.formato()} Marca: ${this._marca} Tamaño : ${this._tamano}`
    }
    set idMonitor(idMonitor){
        this._idMonitor=idMonitor
    }
    get idMonitor(){
        return this._idMonitor
    }
    set marca(marca){
        this._marca=marca
    }
    get marca(){
        return this._marca
    }
    set tamano(tamano){
        this._tamano=tamano
    }
    get tamano(){
        return this.tamano
    }
   
    get idMonitor(){
        return this._idMonitor
    }
    get contadorMonitores(){
        return this._contadorMonitores
    }

}