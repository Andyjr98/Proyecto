<?php
include '../config/db.php';
include '../controllers/clientes_controller.php';

$controller = new ClientesController();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['create'])) {
        $controller->create($_POST['nombre'], $_POST['direccion'], $_POST['telefono'], $_POST['correo'], $_POST['estado']);
    } elseif (isset($_POST['update'])) {
        $controller->update($_POST['id'], $_POST['nombre'], $_POST['direccion'], $_POST['telefono'], $_POST['correo'], $_POST['estado']);
    } elseif (isset($_POST['delete'])) {
        $controller->delete($_POST['id']);
    }
}

$clientes = $controller->read();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Clientes</title>
    <link rel="stylesheet" href="../public/css/style.css">
</head>
<body>
    <?php include '../includes/header.php'; ?>
    <h1>Clientes</h1>
    <form action="" method="post">
        <input type="text" name="nombre" placeholder="Nombre" required>
        <input type="text" name="direccion" placeholder="Dirección">
        <input type="text" name="telefono" placeholder="Teléfono">
        <input type="email" name="correo" placeholder="Correo Electrónico">
        <input type="number" name="estado" placeholder="Estado (0/1)" required>
        <button type="submit" name="create">Crear Cliente</button>
    </form>

    <h2>Lista de Clientes</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Dirección</th>
                <th>Teléfono</th>
                <th>Correo Electrónico</th>
                <th>Estado</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($clientes as $cliente): ?>
                <tr>
                    <td><?php echo htmlspecialchars($cliente['idClientes']); ?></td>
                    <td><?php echo htmlspecialchars($cliente['Nombre']); ?></td>
                    <td><?php echo htmlspecialchars($cliente['Direccion']); ?></td>
                    <td><?php echo htmlspecialchars($cliente['Telefono']); ?></td>
                    <td><?php echo htmlspecialchars($cliente['Correo']); ?></td>
                    <td><?php echo htmlspecialchars($cliente['Estado']); ?></td>
                    <td>
                        <form action="" method="post" style="display:inline;">
                            <input type="hidden" name="id" value="<?php echo htmlspecialchars($cliente['idClientes']); ?>">
                            <button type="submit" name="delete">Eliminar</button>
                        </form>
                        <form action="" method="post" style="display:inline;">
                            <input type="hidden" name="id" value="<?php echo htmlspecialchars($cliente['idClientes']); ?>">
                            <input type="text" name="nombre" value="<?php echo htmlspecialchars($cliente['Nombre']); ?>" required>
                            <input type="text" name="direccion" value="<?php echo htmlspecialchars($cliente['Direccion']); ?>">
                            <input type="text" name="telefono" value="<?php echo htmlspecialchars($cliente['Telefono']); ?>">
                            <input type="email" name="correo" value="<?php echo htmlspecialchars($cliente['Correo']); ?>">
                            <input type="number" name="estado" value="<?php echo htmlspecialchars($cliente['Estado']); ?>" required>
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
