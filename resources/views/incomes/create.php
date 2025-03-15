<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de ingresos</title>
    <link rel="stylesheet" href="../../css/forms.css">

</head>

<body>
    <h1>AGREGA UN INGRESO</h1>
    <!-- <form action="/incomes" method="post"> -->
    <form action="presupuestos/public/incomes" method="post">
        <label for="fecha">Fecha</label>
        <input type="datetime-local" name="fecha" id="fecha">

        <label for="valor">Valor</label>
        <input type="number" name="valor" id="valor">

        <label for="motivo">Motivo</label>
        <select name="motivo" id="motivo">
            <option value="pago nomina">Pago nómina</option>
            <option value="pago intereses">Pago intereses</option>
            <option value="bonificaciones">Bonificaciones</option>
        </select>

        <label for="metodo">Método de pago</label>
        <select name="metodo" id="metodo">
            <option value="efectivo">Efectivo</option>
            <option value="cuenta bancaria">Cuenta bancaria</option>
        </select>
        <input type="hidden" name="method" value="post">
        <button type="submit"  class="button">Guardar</button>
        <button type="submit" class="button button-danger">Cancelar</button>
    </form>


</body>

</html>