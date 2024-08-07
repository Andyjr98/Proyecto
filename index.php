<?php
// Mostrar errores para depuración
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Incluir el archivo de configuración
include 'includes/config.php'; // Asegúrate de que esta ruta sea correcta

// Consulta para obtener todos los registros de la tabla Kardex
$sql = "SELECT * FROM Kardex";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Kardex</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
        }
        th {
            background-color: #f2f2f2;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h1>Listado de Kardex</h1>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Estado</th>
                <th>Fecha de Transacción</th>
                <th>Cantidad</th>
                <th>Valor Compra</th>
                <th>Valor Venta</th>
                <th>Unidad Medida 1</th>
                <th>Unidad Medida 2</th>
                <th>Unidad Medida 3</th>
                <th>Valor Ganancia</th>
                <th>IVA</th>
                <th>IVA ID</th>
                <th>Proveedor ID</th>
                <th>Producto ID</th>
                <th>Tipo Transacción</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($result->num_rows > 0) {
                // Mostrar los datos en la tabla
                while($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($row["idKardex"]) . "</td>";
                    echo "<td>" . htmlspecialchars($row["Estado"]) . "</td>";
                    echo "<td>" . htmlspecialchars($row["Fecha_Transaccion"]) . "</td>";
                    echo "<td>" . htmlspecialchars($row["Cantidad"]) . "</td>";
                    echo "<td>" . htmlspecialchars($row["Valor_Compra"]) . "</td>";
                    echo "<td>" . htmlspecialchars($row["Valor_Venta"]) . "</td>";
                    echo "<td>" . htmlspecialchars($row["Unidad_Medida_idUnidad_Medida"]) . "</td>";
                    echo "<td>" . htmlspecialchars($row["Unidad_Medida_idUnidad_Medida1"]) . "</td>";
                    echo "<td>" . htmlspecialchars($row["Unidad_Medida_idUnidad_Medida2"]) . "</td>";
                    echo "<td>" . htmlspecialchars($row["Valor_Ganacia"]) . "</td>";
                    echo "<td>" . htmlspecialchars($row["IVA"]) . "</td>";
                    echo "<td>" . htmlspecialchars($row["IVA_idIVA"]) . "</td>";
                    echo "<td>" . htmlspecialchars($row["Proveedores_idProveedores"]) . "</td>";
                    echo "<td>" . htmlspecialchars($row["Productos_idProductos"]) . "</td>";
                    echo "<td>" . htmlspecialchars($row["Tipo_Transaccion"]) . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='15'>No se encontraron registros</td></tr>";
            }

            // Cerrar la conexión
            $conn->close();
            ?>
        </tbody>
    </table>
</body>
</html>
