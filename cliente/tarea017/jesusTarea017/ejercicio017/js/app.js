import { Orden } from "./Orden.class.js";
import { Producto } from "./Producto.class.js";

let producto1=new Producto("camisa",26);
let producto2=new Producto("pantalon",73);
let producto3=new Producto("americana", 100);

let PrimeraOrden=new Orden();

PrimeraOrden.addProducto(producto1);
PrimeraOrden.addProducto(producto2);
PrimeraOrden.addProducto(producto3);

let segundaOrden=new Orden();

segundaOrden.addProducto(producto1);
segundaOrden.addProducto(producto1);

console.log(PrimeraOrden.toString());
console.log(segundaOrden.toString());