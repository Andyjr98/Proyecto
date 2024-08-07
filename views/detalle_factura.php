<?php
include '../config/db.php';
include '../controllers/detalle_factura_controller.php';

$controller = new DetalleFacturaController();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['create'])) {
        $controller->create($_POST['factura'], $_POST['producto'], $_POST['cantidad'], $_POST['valor_unitario'], $_POST['iva']);
    } elseif (isset($_POST['update'])) {
        $controller->update($_POST['id'], $_POST['factura'], $_POST['producto'], $_POST['cantidad'], $_POST['valor_unitario'], $_POST['iva']);
    } elseif (isset($_POST['delete'])) {
        $controller->delete($_POST['id']);
    }
}

$detalle_factura = $controller->read();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Detalle Factura</title>
    <link rel="stylesheet" href="../public/css/style.css">
</head>
<body>
    <?php include '../includes/header.php'; ?>
    <h1>Detalle de Factura</h1>
    <form action="" method="post">
        <input type="number" name="factura" placeholder="Factura ID" required>
        <input type="number" name="producto" placeholder="Producto ID" required>
        <input type="number" name="cantidad" placeholder="Cantidad" required>
        <input type="number" name="valor_unitario" placeholder="Valor Unitario" required>
        <input type="number" name="iva" placeholder="IVA ID" required>
        <button type="submit" name="create">Crear Detalle Factura</button>
    </form>

    <h2>Lista de Detalles de Factura</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Factura</th>
                <th>Producto</th>
                <th>Cantidad</th>
                <th>Valor Unitario</th>
                <th>IVA</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($detalle_factura as $detalle): ?>
                <tr>
                    <td><?php echo htmlspecialchars($detalle['idDetalle_Factura']); ?></td>
                    <td><?php echo htmlspecialchars($detalle['Factura_idFactura']); ?></td>
                    <td><?php echo htmlspecialchars($detalle['Productos_idProductos']); ?></td>
                    <td><?php echo htmlspecialchars($detalle['Cantidad']); ?></td>
                    <td><?php echo htmlspecialchars($detalle['Valor_Unitario']); ?></td>
                    <td><?php echo htmlspecialchars($detalle['IVA_idIVA']); ?></td>
                    <td>
                        <form action="" method="post" style="display:inline;">
                            <input type="hidden" name="id" value="<?php echo htmlspecialchars($detalle['idDetalle_Factura']); ?>">
                            <button type="submit" name="delete">Eliminar</button>
                        </form>
                        <form action="" method="post" style="display:inline;">
                            <input type="hidden" name="id" value="<?php echo htmlspecialchars($detalle['idDetalle_Factura']); ?>">
                            <input type="number" name="factura" value="<?php echo htmlspecialchars($detalle['Factura_idFactura']); ?>" required>
                            <input type="number" name="producto" value="<?php echo htmlspecialchars($detalle['Productos_idProductos']); ?>" required>
                            <input type="number" name="cantidad" value="<?php echo htmlspecialchars($detalle['Cantidad']); ?>" required>
                            <input type="number" name="valor_unitario" value="<?php echo htmlspecialchars($detalle['Valor_Unitario']); ?>" required>
                            <input type="number" name="iva" value="<?php echo htmlspecialchars($detalle['IVA_idIVA']); ?>" required>
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
