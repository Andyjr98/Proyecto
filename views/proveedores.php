<?php
include '../config/db.php';
include '../controllers/proveedores_controller.php';

$controller = new ProveedoresController();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['create'])) {
        $controller->create($_POST['nombre'], $_POST['direccion'], $_POST['telefono'], $_POST['contacto'], $_POST['telefono_contacto']);
    } elseif (isset($_POST['update'])) {
        $controller->update($_POST['id'], $_POST['nombre'], $_POST['direccion'], $_POST['telefono'], $_POST['contacto'], $_POST['telefono_contacto']);
    } elseif (isset($_POST['delete'])) {
        $controller->delete($_POST['id']);
    }
}

$proveedores = $controller->read();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Proveedores</title>
    <link rel="stylesheet" href="../public/css/style.css">
</head>
<body>
    <?php include '../includes/header.php'; ?>
    <h1>Proveedores</h1>
    <!-- Formulario para crear un nuevo proveedor -->
    <form action="" method="post">
        <input type="text" name="nombre" placeholder="Nombre Empresa" required>
        <input type="text" name="direccion" placeholder="Dirección">
        <input type="text" name="telefono" placeholder="Teléfono" required>
        <input type="text" name="contacto" placeholder="Contacto Empresa" required>
        <input type="text" name="telefono_contacto" placeholder="Teléfono Contacto" required>
        <button type="submit" name="create">Crear Proveedor</button>
    </form>

    <h2>Lista de Proveedores</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre Empresa</th>
                <th>Dirección</th>
                <th>Teléfono</th>
                <th>Contacto Empresa</th>
                <th>Teléfono Contacto</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($proveedores as $proveedor): ?>
                <tr>
                    <td><?php echo htmlspecialchars($proveedor['idProveedores']); ?></td>
                    <td><?php echo htmlspecialchars($proveedor['Nombre_Empresa']); ?></td>
                    <td><?php echo htmlspecialchars($proveedor['Direccion']); ?></td>
                    <td><?php echo htmlspecialchars($proveedor['Telefono']); ?></td>
                    <td><?php echo htmlspecialchars($proveedor['Contacto_Empresa']); ?></td>
                    <td><?php echo htmlspecialchars($proveedor['Teleofno_Contacto']); ?></td>
                    <td>
                        <!-- Botones para editar y eliminar -->
                        <form action="" method="post" style="display:inline;">
                            <input type="hidden" name="id" value="<?php echo htmlspecialchars($proveedor['idProveedores']); ?>">
                            <button type="submit" name="delete">Eliminar</button>
                        </form>
                        <form action="" method="post" style="display:inline;">
                            <input type="hidden" name="id" value="<?php echo htmlspecialchars($proveedor['idProveedores']); ?>">
                            <input type="text" name="nombre" value="<?php echo htmlspecialchars($proveedor['Nombre_Empresa']); ?>" required>
                            <input type="text" name="direccion" value="<?php echo htmlspecialchars($proveedor['Direccion']); ?>">
                            <input type="text" name="telefono" value="<?php echo htmlspecialchars($proveedor['Telefono']); ?>" required>
                            <input type="text" name="contacto" value="<?php echo htmlspecialchars($proveedor['Contacto_Empresa']); ?>" required>
                            <input type="text" name="telefono_contacto" value="<?php echo htmlspecialchars($proveedor['Teleofno_Contacto']); ?>" required>
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
