<div class="ventas">
<h1>Listado de Ventas</h1>

<table>
    <tr>
        <th>ID</th>
        <th>ID Usuario</th>
        <th>Fecha de Compra</th>
        <th>ID Producto</th>
        <th>Cantidad</th>
        <th>Precio Total</th>
    </tr>
    <?php foreach ($ventas as $venta) : ?>
        <tr>
            <td><?= htmlspecialchars($venta->getId()); ?></td>
            <td><?= htmlspecialchars($venta->getUsuarioId()); ?></td>
            <td><?= htmlspecialchars($venta->getFechaCompra()); ?></td>
            <td><?= htmlspecialchars($venta->getProductoId()); ?></td>
            <td><?= htmlspecialchars($venta->getCantidad()); ?></td>
            <td><?= htmlspecialchars($venta->getPrecioTotal()); ?></td>
        </tr>
    <?php endforeach; ?>
</table>
</div>
