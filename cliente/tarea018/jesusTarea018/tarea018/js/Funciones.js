Number.prototype.formato=function(){
    return `${this.toString().padStart(4,"0")}`
}

String.prototype.primeraP=function(){
    return this.split(" ")[0]
}