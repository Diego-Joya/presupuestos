<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Salidas</title>
      <link rel="stylesheet" href="../../css/forms.css">
</head>

<body>

    <h1>Registro de Salidas (Dinero)</h1>
    <form action="/withdrawals" method="post">
        <label for="fecha">Fecha</label>
        <input type="datetime-local" name="fecha" id="fecha" required>

        <label for="valor">Valor</label>
        <input type="number" name="valor" id="valor" required>

        <label for="motivo">Motivo</label>
        <select name="motivo" id="motivo" required>
            <option value="Mercado">Mercado</option>
            <option value="Moto">Moto</option>
            <option value="Gastos necesarios">Gastos necesarios</option>
        </select>

        <label for="metodo">Método de Pago</label>
        <select name="metodo" id="metodo" required>
            <option value="efectivo">Efectivo</option>
            <option value="cuenta bancaria">Cuenta bancaria</option>
        </select>
        
        <input type="hidden" name="method" value="post">
        <button type="submit"  class="button">Guardar</button>
        <button type="submit" class="button button-danger" id="cancelButton">Cancelar</button>
    </form>
    <script>
        document.getElementById('cancelButton').addEventListener('click', function () {
            window.location.href = '/incomes';
        });
    </script>
</body>

</html>
