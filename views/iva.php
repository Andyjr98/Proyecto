<?php
include '../config/db.php';
include '../controllers/iva_controller.php';

$controller = new IVAController();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['create'])) {
        $controller->create($_POST['detalle'], $_POST['estado'], $_POST['valor']);
    } elseif (isset($_POST['update'])) {
        $controller->update($_POST['id'], $_POST['detalle'], $_POST['estado'], $_POST['valor']);
    } elseif (isset($_POST['delete'])) {
        $controller->delete($_POST['id']);
    }
}

$iva = $controller->read();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>IVA</title>
    <link rel="stylesheet" href="../public/css/style.css">
</head>
<body>
    <?php include '../includes/header.php'; ?>
    <h1>IVA</h1>
    <form action="" method="post">
        <input type="text" name="detalle" placeholder="Detalle" required>
        <input type="number" name="estado" placeholder="Estado (0/1)" required>
        <input type="number" name="valor" placeholder="Valor" required>
        <button type="submit" name="create">Crear IVA</button>
    </form>

    <h2>Lista de IVA</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Detalle</th>
                <th>Estado</th>
                <th>Valor</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($iva as $iva_item): ?>
                <tr>
                    <td><?php echo htmlspecialchars($iva_item['idIVA']); ?></td>
                    <td><?php echo htmlspecialchars($iva_item['Detalle']); ?></td>
                    <td><?php echo htmlspecialchars($iva_item['Estado']); ?></td>
                    <td><?php echo htmlspecialchars($iva_item['Valor']); ?></td>
                    <td>
                        <form action="" method="post" style="display:inline;">
                            <input type="hidden" name="id" value="<?php echo htmlspecialchars($iva_item['idIVA']); ?>">
                            <button type="submit" name="delete">Eliminar</button>
                        </form>
                        <form action="" method="post" style="display:inline;">
                            <input type="hidden" name="id" value="<?php echo htmlspecialchars($iva_item['idIVA']); ?>">
                            <input type="text" name="detalle" value="<?php echo htmlspecialchars($iva_item['Detalle']); ?>" required>
                            <input type="number" name="estado" value="<?php echo htmlspecialchars($iva_item['Estado']); ?>" required>
                            <input type="number" name="valor" value="<?php echo htmlspecialchars($iva_item['Valor']); ?>" required>
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
