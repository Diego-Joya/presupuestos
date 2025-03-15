<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ingresos</title>
    <link rel="stylesheet" href="../css/incomes.css">
</head>

<body>

    <h1>Listado de Gastos</h1>
    <div class="create-button">
        <a href="../withdrawals/create" class="button">Crear Nuevo Gasto</a>
    </div>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Fecha</th>
                <th>Valor</th>
                <th>Motivo</th>
                <th>Método</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($resul as $r): ?>
                <tr>
                    <td><?= $r['id'] ?></td>
                    <td><?= date('d/m/Y', strtotime($r['fecha'])) ?></td>
                    <td><?= number_format($r['valor'], 2) ?> </td>
                    <td><?= htmlspecialchars($r["motivo"]) ?></td>
                    <td><?= htmlspecialchars($r["metodo"]) ?></td>
                    <td>
                        <a href="editar_gasto.php?id=<?= $r['id'] ?>" class="button">Editar</a>
                        <a href="eliminar_gasto.php?id=<?= $r['id'] ?>" class="button button-danger">Eliminar</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

</body>

</html>