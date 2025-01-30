
    <div class="ventas">
        <h1>Listado de Ventas</h1>

        <?php if (isset($_SESSION['mensaje'])): ?>
            <div class="mensaje exito">
                <?= htmlspecialchars($_SESSION['mensaje']); ?>
            </div>
            <?php unset($_SESSION['mensaje']); ?>
        <?php endif; ?>

        <?php if (isset($_SESSION['error_mensaje'])): ?>
            <div class="mensaje error">
                <?= htmlspecialchars($_SESSION['error_mensaje']); ?>
            </div>
            <?php unset($_SESSION['error_mensaje']); ?>
        <?php endif; ?>

        <table>
            <tr>
                <th>ID</th>
                <th>IDUsuario</th>
                <th>Fecha de Compra</th>
                <th>ID Producto</th>
                <th>Cantidad</th>
                <th>Precio Total</th>
                <th>Acciones</th>
            </tr>
            <?php foreach ($ventas as $venta) : ?>
                <form method="post" action="./APP/Controllers/ControllerVentas.php">
                    <tr>
                    <input type="hidden" name="id" value="<?= htmlspecialchars($venta->getId()); ?>">
                        <td><?= htmlspecialchars($venta->getId()); ?></td>
                        <td><?= htmlspecialchars($venta->getUsuarioId()); ?></td>
                        <td><?= htmlspecialchars($venta->getFechaCompra()); ?></td>
                        <td><?= htmlspecialchars($venta->getProductoId()); ?></td>
                        <td><input type="number" name="cantidad" value="<?= htmlspecialchars($venta->getCantidad()); ?>"></td>
                        <td><input type="number" name="precio_total" value="<?= htmlspecialchars($venta->getPrecioTotal()); ?>"></td>
                        <td>
                           
                            <button type="submit" name="accion" value="modificarVenta">Modificar</button>
                        </td>
                    </tr>
                </form>
                <form method="post" action="./APP/Controllers/ControllerVentas.php">
                    <input type="hidden" name="id" value="<?= htmlspecialchars($venta->getId()); ?>">
                    <td colspan="7">
                        <button type="submit" name="accion" value="borrarVenta">Borrar</button>
                    </td>
                </form>
            <?php endforeach; ?>
        </table>
    </div>
</body>
</html>

