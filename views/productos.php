<?php
include '../config/db.php';
include '../controllers/productos_controller.php';

$controller = new ProductosController();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['create'])) {
        $controller->create($_POST['codigo_barras'], $_POST['nombre_producto'], $_POST['graba_iva']);
    } elseif (isset($_POST['update'])) {
        $controller->update($_POST['id'], $_POST['codigo_barras'], $_POST['nombre_producto'], $_POST['graba_iva']);
    } elseif (isset($_POST['delete'])) {
        $controller->delete($_POST['id']);
    }
}

$productos = $controller->read();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Productos</title>
    <link rel="stylesheet" href="../public/css/style.css">
</head>
<body>
    <?php include '../includes/header.php'; ?>
    <h1>Productos</h1>
    <form action="" method="post">
        <input type="text" name="codigo_barras" placeholder="Código de Barras">
        <input type="text" name="nombre_producto" placeholder="Nombre del Producto" required>
        <input type="number" name="graba_iva" placeholder="Graba IVA (1/0)" required>
        <button type="submit" name="create">Crear Producto</button>
    </form>

    <h2>Lista de Productos</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Código Barras</th>
                <th>Nombre Producto</th>
                <th>Graba IVA</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($productos as $producto): ?>
                <tr>
                    <td><?php echo htmlspecialchars($producto['idProductos']); ?></td>
                    <td><?php echo htmlspecialchars($producto['Codigo_Barras']); ?></td>
                    <td><?php echo htmlspecialchars($producto['Nombre_Producto']); ?></td>
                    <td><?php echo htmlspecialchars($producto['Graba_IVA']); ?></td>
                    <td>
                        <form action="" method="post" style="display:inline;">
                            <input type="hidden" name="id" value="<?php echo htmlspecialchars($producto['idProductos']); ?>">
                            <button type="submit" name="delete">Eliminar</button>
                        </form>
                        <form action="" method="post" style="display:inline;">
                            <input type="hidden" name="id" value="<?php echo htmlspecialchars($producto['idProductos']); ?>">
                            <input type="text" name="codigo_barras" value="<?php echo htmlspecialchars($producto['Codigo_Barras']); ?>">
                            <input type="text" name="nombre_producto" value="<?php echo htmlspecialchars($producto['Nombre_Producto']); ?>" required>
                            <input type="number" name="graba_iva" value="<?php echo htmlspecialchars($producto['Graba_IVA']); ?>" required>
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
