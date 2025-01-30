<div class="albaranes">
<h1>Listado de Albaranes</h1>

<table>
    <tr>
        <th>ID</th>
        <th>Fecha Albarán</th>
        <th>Código Producto</th>
        <th>Cantidad</th>
        <th>Usuario ID</th>
    </tr>
    <?php foreach ($albaranes as $albaran) : ?>
        <tr>
            <td><?= htmlspecialchars($albaran->getId()); ?></td>
            <td><?= htmlspecialchars($albaran->getFechaAlbaran()); ?></td>
            <td><?= htmlspecialchars($albaran->getCodProducto()); ?></td>
            <td><?= htmlspecialchars($albaran->getCantidad()); ?></td>
            <td><?= htmlspecialchars($albaran->getUsuarioId()); ?></td>
        </tr>
    <?php endforeach; ?>
</table>

</div>
