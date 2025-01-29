<div id="error-mensaje">
    <?php if (isset($_SESSION['error_mensaje'])) : ?>
        <p style="color: red;"><?= htmlspecialchars($_SESSION['error_mensaje']); ?></p>
        <?php unset($_SESSION['error_mensaje']); ?>
    <?php endif; ?>
</div>
<div class="crear-producto">
    <form action="./APP/Controllers/ControllerProducto.php" method="post">
        <table>
            <tr>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Precio</th>
                <th>Acción</th>
            </tr>
            <tr>
                <td>
                    <input type="text" name="nombre" required>
                </td>
                <td>
                    <input type="text" name="descripcion" required>
                </td>
                <td>
                    <input type="number" step="0.01" name="precio" required>
                </td>
                <td>
                    <button type="submit" name="accion" value="CrearProducto">Crear Producto</button>
                </td>
            </tr>
        </table>
    </form>
</div>
<div class="modificarproducto">
<table>
    <tr>
        <th>ID</th>
        <th>Nombre</th>
        <th>Descripción</th>
        <th>Precio</th>
        <th>Stock</th>
        <th>Acción</th>
    </tr>
    <?php foreach ($productos as $producto) : ?>
        <tr>
            <form action="./APP/Controllers/ControllerProducto.php" method="post">
                <td><?= htmlspecialchars($producto->getId()); ?></td>
                <td>
                    <input type="text" name="nombre" value="<?= htmlspecialchars($producto->getNombre()); ?>">
                </td>
                <td>
                    <input type="text" name="descripcion" value="<?= htmlspecialchars($producto->getDescripcion()); ?>">
                </td>
                <td>
                    <input type="number" name="precio" step="0.01" value="<?= htmlspecialchars($producto->getPrecio()); ?>">
                </td>
                <td><?= htmlspecialchars($producto->getStock()); ?></td>
                <td>
                    <input type="hidden" name="producto_id" value="<?= htmlspecialchars($producto->getId()); ?>">
                    <button type="submit" name="accion" value="ModificarProducto">Modificar</button>
                </td>
            </form>
        </tr>
    <?php endforeach; ?>
</table>
</div>
<div class="añadirStock">
<table>
    <tr>
        <th>ID</th>
        <th>Nombre</th>
        <th>Descripción</th>
        <th>Precio</th>
        <th>Stock</th>
        <th>Acción</th>
    </tr>
    <?php foreach ($productos as $producto) : ?>
        <tr>
            <td><?= htmlspecialchars($producto->getId()); ?></td>
            <td><?= htmlspecialchars($producto->getNombre()); ?></td>
            <td><?= htmlspecialchars($producto->getDescripcion()); ?></td>
            <td><?= htmlspecialchars($producto->getPrecio()); ?></td>
            <td><?= htmlspecialchars($producto->getStock()); ?></td>
            <td>
                <form action="./APP/Controllers/ControllerAlbaran.php" method="post">
                    <input type="hidden" name="producto_id" value="<?= htmlspecialchars($producto->getId()); ?>">
                    <input type="number" name="cantidad" value="1" min="1">
                    <button type="submit" name="accion" value="AñadirStock">Añadir Stock</button>
                </form>
            </td>
        </tr>
    <?php endforeach; ?>
</table>
</div>