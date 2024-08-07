<?php
include '../config/db.php';
include '../controllers/kardex_controller.php';

$controller = new KardexController();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['create'])) {
        $controller->create($_POST['estado'], $_POST['fecha_transaccion'], $_POST['cantidad'], $_POST['valor_compra'], $_POST['valor_venta'], $_POST['unidad_medida1'], $_POST['unidad_medida2'], $_POST['unidad_medida3'], $_POST['valor_ganancia'], $_POST['iva'], $_POST['proveedor'], $_POST['producto'], $_POST['tipo_transaccion']);
    } elseif (isset($_POST['update'])) {
        $controller->update($_POST['id'], $_POST['estado'], $_POST['fecha_transaccion'], $_POST['cantidad'], $_POST['valor_compra'], $_POST['valor_venta'], $_POST['unidad_medida1'], $_POST['unidad_medida2'], $_POST['unidad_medida3'], $_POST['valor_ganancia'], $_POST['iva'], $_POST['proveedor'], $_POST['producto'], $_POST['tipo_transaccion']);
    } elseif (isset($_POST['delete'])) {
        $controller->delete($_POST['id']);
    }
}

$kardex = $controller->read();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Kardex</title>
    <link rel="stylesheet" href="../public/css/style.css">
</head>
<body>
    <?php include '../includes/header.php'; ?>
    <h1>Kardex</h1>
    <form action="" method="post">
        <input type="number" name="estado" placeholder="Estado (0/1)" required>
        <input type="datetime-local" name="fecha_transaccion" placeholder="Fecha de Transacción" required>
        <input type="text"
        <input type="number" name="cantidad" placeholder="Cantidad" required>
        <input type="number" name="valor_compra" placeholder="Valor Compra" required>
        <input type="number" name="valor_venta" placeholder="Valor Venta" required>
        <input type="number" name="unidad_medida1" placeholder="Unidad Medida 1" required>
        <input type="number" name="unidad_medida2" placeholder="Unidad Medida 2">
        <input type="number" name="unidad_medida3" placeholder="Unidad Medida 3">
        <input type="number" name="valor_ganancia" placeholder="Valor Ganancia" required>
        <input type="number" name="iva" placeholder="IVA" required>
        <input type="number" name="proveedor" placeholder="Proveedor" required>
        <input type="number" name="producto" placeholder="Producto" required>
        <input type="text" name="tipo_transaccion" placeholder="Tipo de Transacción" required>
        <button type="submit" name="create">Crear Kardex</button>
    </form>

    <h2>Lista de Kardex</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Estado</th>
                <th>Fecha Transacción</th>
                <th>Cantidad</th>
                <th>Valor Compra</th>
                <th>Valor Venta</th>
                <th>Unidad Medida 1</th>
                <th>Unidad Medida 2</th>
                <th>Unidad Medida 3</th>
                <th>Valor Ganancia</th>
                <th>IVA</th>
                <th>Proveedor</th>
                <th>Producto</th>
                <th>Tipo Transacción</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($kardex as $item): ?>
                <tr>
                    <td><?php echo htmlspecialchars($item['idKardex']); ?></td>
                    <td><?php echo htmlspecialchars($item['Estado']); ?></td>
                    <td><?php echo htmlspecialchars($item['Fecha_Transaccion']); ?></td>
                    <td><?php echo htmlspecialchars($item['Cantidad']); ?></td>
                    <td><?php echo htmlspecialchars($item['Valor_Compra']); ?></td>
                    <td><?php echo htmlspecialchars($item['Valor_Venta']); ?></td>
                    <td><?php echo htmlspecialchars($item['Unidad_Medida_idUnidad_Medida']); ?></td>
                    <td><?php echo htmlspecialchars($item['Unidad_Medida_idUnidad_Medida1']); ?></td>
                    <td><?php echo htmlspecialchars($item['Unidad_Medida_idUnidad_Medida2']); ?></td>
                    <td><?php echo htmlspecialchars($item['Valor_Ganacia']); ?></td>
                    <td><?php echo htmlspecialchars($item['IVA_idIVA']); ?></td>
                    <td><?php echo htmlspecialchars($item['Proveedores_idProveedores']); ?></td>
                    <td><?php echo htmlspecialchars($item['Productos_idProductos']); ?></td>
                    <td><?php echo htmlspecialchars($item['Tipo_Transaccion']); ?></td>
                    <td>
                        <form action="" method="post" style="display:inline;">
                            <input type="hidden" name="id" value="<?php echo htmlspecialchars($item['idKardex']); ?>">
                            <button type="submit" name="delete">Eliminar</button>
                        </form>
                        <form action="" method="post" style="display:inline;">
                            <input type="hidden" name="id" value="<?php echo htmlspecialchars($item['idKardex']); ?>">
                            <input type="number" name="estado" value="<?php echo htmlspecialchars($item['Estado']); ?>" required>
                            <input type="datetime-local" name="fecha_transaccion" value="<?php echo htmlspecialchars($item['Fecha_Transaccion']); ?>" required>
                            <input type="number" name="cantidad" value="<?php echo htmlspecialchars($item['Cantidad']); ?>" required>
                            <input type="number" name="valor_compra" value="<?php echo htmlspecialchars($item['Valor_Compra']); ?>" required>
                            <input type="number" name="valor_venta" value="<?php echo htmlspecialchars($item['Valor_Venta']); ?>" required>
                            <input type="number" name="unidad_medida1" value="<?php echo htmlspecialchars($item['Unidad_Medida_idUnidad_Medida']); ?>" required>
                            <input type="number" name="unidad_medida2" value="<?php echo htmlspecialchars($item['Unidad_Medida_idUnidad_Medida1']); ?>">
                            <input type="number" name="unidad_medida3" value="<?php echo htmlspecialchars($item['Unidad_Medida_idUnidad_Medida2']); ?>">
                            <input type="number" name="valor_ganancia" value="<?php echo htmlspecialchars($item['Valor_Ganacia']); ?>" required>
                            <input type="number" name="iva" value="<?php echo htmlspecialchars($item['IVA_idIVA']); ?>" required>
                            <input type="number" name="proveedor" value="<?php echo htmlspecialchars($item['Proveedores_idProveedores']); ?>" required>
                            <input type="number" name="producto" value="<?php echo htmlspecialchars($item['Productos_idProductos']); ?>" required>
                            <input type="text" name="tipo_transaccion" value="<?php echo htmlspecialchars($item['Tipo_Transaccion']); ?>" required>
                            <button type="submit" name="update">Actualizar</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <?php include '../includes/footer.php'; ?>
</body>
</html>
