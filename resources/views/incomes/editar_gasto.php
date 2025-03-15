<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Editar Gasto</title>
    <link rel="stylesheet" href="../../../css/forms.css">
</head>

<body>

    <h1>Editar Gasto</h1>
       
        <!-- <?php 
        // foreach ($_GET as $key => $value) {
        //             echo "$key: $value\n";
        //             echo "<script>console.log('datos en get: " .$value . "');</script>";
        //         }
        ?>  -->
    <form action="/incomes/edit/<?= $_GET['id']?>" method="post">
        <label for="fecha">Fecha:</label>
        <input type="datetime-local" id="fecha" name="fecha" value="<?= htmlspecialchars($gasto['fecha']) ?>" required>

        <label for="valor">Valor:</label>
        <input type="number" id="valor" name="valor" value="<?= htmlspecialchars($gasto['valor']) ?>" step="0.01"
            required>

        <label for="motivo">Motivo:</label>
        <select name="motivo" id="motivo" required>
            <option value="Mercado" <?= htmlspecialchars($gasto['motivo']) == 'Mercado' ? 'selected' : '' ?>>Mercado
            </option>
            <option value="Moto" <?= htmlspecialchars($gasto['motivo']) == 'Moto' ? 'selected' : '' ?>>Moto</option>
            <option value="Gastos necesarios" <?= htmlspecialchars($gasto['motivo']) == 'Gastos necesarios' ? 'selected' : '' ?>>Gastos necesarios</option>
        </select>

        <label for="metodo">Método:</label>
        <select name="metodo" id="metodo" required>
            <option value="efectivo" <?= htmlspecialchars($gasto['metodo']) == 'efectivo' ? 'selected' : '' ?>>Efectivo
            </option>
            <option value="cuenta bancaria" <?= htmlspecialchars($gasto['metodo']) == 'cuenta bancaria' ? 'selected' : '' ?>>Cuenta bancaria</option>
        </select>
        <input type="hidden" name="method" value="post">
        <button type="submit" class="button">Guardar Cambios</button>
        <button type="submit" class="button button-danger" id="cancelButton">Cancelar</button>

    </form>
    <script>
        document.getElementById('cancelButton').addEventListener('click', function () {
            window.location.href = '/incomes';
        });
    </script>
</body>

</html>