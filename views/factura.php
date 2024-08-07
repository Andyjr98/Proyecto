<?php
include '../config/db.php';
include '../controllers/factura_controller.php';

$controller = new FacturaController();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['create'])) {
        $controller->create($_POST['fecha_emision'], $_POST['total'], $_POST['cliente'], $_POST['estado']);
    } elseif (isset($_POST['update'])) {
        $controller->update($_POST['id'], $_POST['fecha_emision'], $_POST['total'], $_POST['cliente'], $_POST['estado']);
    } elseif (isset($_POST['delete'])) {
        $controller->delete($_POST['id']);
    }
}

$facturas = $controller->read();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Factura</title>
    <link rel="stylesheet" href="../public/css/style.css">
</head>
<body>
    <?php include '../includes/header.php'; ?>
    <h1>Facturas</h1>
    <form action="" method="post">
        <input type="datetime-local" name="fecha_emision" placeholder="Fecha de Emisión" required>
        <input type="number" name="total" placeholder="Total" required>
        <input type="number" name="cliente" placeholder="Cliente ID" required>
        <input type="number" name="estado" placeholder="Estado (0/1)" required>
        <button type="submit" name="create">Crear Factura</button>
    </form>

    <h2>Lista de Facturas</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Fecha Emisión</th>
                <th>Total</th>
                <th>Cliente</th>
                <th>Estado</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($facturas as $factura): ?>
                <tr>
                    <td><?php echo htmlspecialchars($factura['idFactura']); ?></td>
                    <td><?php echo htmlspecialchars($factura['Fecha_Emision']); ?></td>
                    <td><?php echo htmlspecialchars($factura['Total']); ?></td>
                    <td><?php echo htmlspecialchars($factura['Clientes_idClientes']); ?></td>
                    <td><?php echo htmlspecialchars($factura['Estado']); ?></td>
                    <td>
                        <form action="" method="post" style="display:inline;">
                            <input type="hidden" name="id" value="<?php echo htmlspecialchars($factura['idFactura']); ?>">
                            <button type="submit" name="delete">Eliminar</button>
                        </form>
                        <form action="" method="post" style="display:inline;">
                            <input type="hidden" name="id" value="<?php echo htmlspecialchars($factura['idFactura']); ?>">
                            <input type="datetime-local" name="fecha_emision" value="<?php echo htmlspecialchars($factura['Fecha_Emision']); ?>" required>
                            <input type="number" name="total" value="<?php echo htmlspecialchars($factura['Total']); ?>" required>
                            <input type="number" name="cliente" value="<?php echo htmlspecialchars($factura['Clientes_idClientes']); ?>" required>
                            <input type="number" name="estado" value="<?php echo htmlspecialchars($factura['Estado']); ?>" required>
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
