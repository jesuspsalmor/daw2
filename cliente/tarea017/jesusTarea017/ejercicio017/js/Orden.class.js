export class Orden {
  static contador = 0;
  constructor() {
    this.id = ++Orden.contador;
    this.productos = [];
  }
  addProducto(producto) {
    this.productos.push(producto);
  }

  toString() {
    let cadena = `Orden:${this.id} \n `;
    let totalPrecio = this.productos.reduce(
      (total, producto) => total + producto.precio,
      0
    );
    cadena += this.productos.reduce(
      (cadena, producto) => cadena + producto.toString() + `\n `,
      ""
    );

    return (cadena += `\nTotal : ${totalPrecio.toFixed(2)} €`);
  }
}
