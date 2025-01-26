
    <h1>Listado de Productos</h1>
    <table>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Descripción</th>
            <th>Precio</th>
            <th>Stock</th>
        </tr>
        <?php foreach ($productos as $producto) : ?>
            <tr>
                <td><?= htmlspecialchars($producto->getId()); ?></td>
                <td><?= htmlspecialchars($producto->getNombre()); ?></td>
                <td><?= htmlspecialchars($producto->getDescripcion()); ?></td>
                <td><?= htmlspecialchars($producto->getPrecio()); ?></td>
                <td><?= htmlspecialchars($producto->getStock()); ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
