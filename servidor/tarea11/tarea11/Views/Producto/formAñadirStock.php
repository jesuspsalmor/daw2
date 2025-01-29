<div id="error-mensaje">
    
    <?php if (isset($_SESSION['error_mensaje'])) : ?>
        <p style="color: red;"><?= htmlspecialchars($_SESSION['error_mensaje']); ?></p>
        <?php unset($_SESSION['error_mensaje']); ?>
    <?php endif; ?>
</div>
<div class="añadirStock"></div>
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
