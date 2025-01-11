import { Computadora } from "./Computadora.js";
import { Monitor } from "./Monitor.js";
import { Raton } from "./Raton.js";
import { Teclado } from "./Teclado.js";
import { Orden } from "./Orden.js";
import { DispositivoEntrada } from "./DispositivoEntrada.js";

let tipoEntrada1= "usb"
let tipoEntrada2="pec"
let marca1="Asus chachi"
let marca2="LG guay"
let tamano1=27
let tamano2=32
let raton1=new Raton()
let raton2=new Raton()

let teclado1=new Teclado()
let teclado2=new Teclado()

let monitor1=new Monitor()
let monitor2=new Monitor()

let pc1=new Computadora()
let pc2=new Computadora()
let orden1=new Orden()


raton1.marca=marca1
raton1.tipoEntrada=tipoEntrada1
raton2.marca=marca2
raton2.tipoEntrada=tipoEntrada2

teclado1.marca=marca2
teclado1.tipoEntrada=tipoEntrada2
teclado2.marca=marca2
teclado2.tipoEntrada=marca2

monitor1.tamano=tamano1
monitor1._marca=marca2
monitor2.tamano=tamano2
monitor2.marca=marca2


pc1.nombre="axus cosa"
pc1.monitor=monitor1
pc1.raton=raton1
pc1.teclado=teclado1

pc2.nombre="hp coso"
pc2.monitor=monitor2
pc2.teclado=teclado2
pc2.raton=raton2
orden1.agregarComputadora(pc1)
orden1.agregarComputadora(pc2)

console.log(orden1.mostrarOrden())



