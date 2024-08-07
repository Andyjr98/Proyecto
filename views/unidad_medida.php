<?php
include '../config/db.php';
include '../controllers/unidad_medida_controller.php';

$controller = new UnidadMedidaController();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['create'])) {
        $controller->create($_POST['detalle'], $_POST['tipo']);
    } elseif (isset($_POST['update'])) {
        $controller->update($_POST['id'], $_POST['detalle'], $_POST['tipo']);
    } elseif (isset($_POST['delete'])) {
        $controller->delete($_POST['id']);
    }
}

$unidad_medida = $controller->read();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Unidad de Medida</title>
    <link rel="stylesheet" href="../public/css/style.css">
</head>
<body>
    <?php include '../includes/header.php'; ?>
    <h1>Unidad de Medida</h1>
    <form action="" method="post">
        <input type="text" name="detalle" placeholder="Detalle">
        <input type="number" name="tipo" placeholder="Tipo (0/1/2)" required>
        <button type="submit" name="create">Crear Unidad de Medida</button>
    </form>

    <h2>Lista de Unidades de Medida</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Detalle</th>
                <th>Tipo</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($unidad_medida as $unidad): ?>
                <tr>
                    <td><?php echo htmlspecialchars($unidad['idUnidad_Medida']); ?></td>
                    <td><?php echo htmlspecialchars($unidad['Detalle']); ?></td>
                    <td><?php echo htmlspecialchars($unidad['Tipo']); ?></td>
                    <td>
                        <form action="" method="post" style="display:inline;">
                            <input type="hidden" name="id" value="<?php echo htmlspecialchars($unidad['idUnidad_Medida']); ?>">
                            <button type="submit" name="delete">Eliminar</button>
                        </form>
                        <form action="" method="post" style="display:inline;">
                            <input type="hidden" name="id" value="<?php echo htmlspecialchars($unidad['idUnidad_Medida']); ?>">
                            <input type="text" name="detalle" value="<?php echo htmlspecialchars($unidad['Detalle']); ?>">
                            <input type="number" name="tipo" value="<?php echo htmlspecialchars($unidad['Tipo']); ?>" required>
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
