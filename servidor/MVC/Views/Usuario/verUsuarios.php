<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table border="1">
        <tr>
            <th>Nombre</th>
            <th>Apellidos</th>
            <th>Edad</th>
        </tr>
        <?php foreach($usuarios as $usuario){ ?>
            <tr>
                <td><?= $usuario->nombre ?></td>
                <td><?= $usuario->apellidos ?></td>
                <td><?= $usuario->email ?></td>
            </tr>
        <?php } ?>
    </table>
</body>
</html>