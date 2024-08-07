<?php
include '../config/db.php';

class KardexController {
    public function create($estado, $fecha_transaccion, $cantidad, $valor_compra, $valor_venta, $unidad_medida1, $unidad_medida2, $unidad_medida3, $valor_ganancia, $iva, $proveedor, $producto, $tipo_transaccion) {
        global $pdo;
        $stmt = $pdo->prepare("INSERT INTO Kardex (Estado, Fecha_Transaccion, Cantidad, Valor_Compra, Valor_Venta, Unidad_Medida_idUnidad_Medida, Unidad_Medida_idUnidad_Medida1, Unidad_Medida_idUnidad_Medida2, Valor_Ganacia, IVA, IVA_idIVA, Proveedores_idProveedores, Productos_idProductos, Tipo_Transaccion) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        return $stmt->execute([$estado, $fecha_transaccion, $cantidad, $valor_compra, $valor_venta, $unidad_medida1, $unidad_medida2, $unidad_medida3, $valor_ganancia, $iva, $iva, $proveedor, $producto, $tipo_transaccion]);
    }

    public function read() {
        global $pdo;
        $stmt = $pdo->query("SELECT * FROM Kardex");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function update($id, $estado, $fecha_transaccion, $cantidad, $valor_compra, $valor_venta, $unidad_medida1, $unidad_medida2, $unidad_medida3, $valor_ganancia, $iva, $proveedor, $producto, $tipo_transaccion) {
        global $pdo;
        $stmt = $pdo->prepare("UPDATE Kardex SET Estado = ?, Fecha_Transaccion = ?, Cantidad = ?, Valor_Compra = ?, Valor_Venta = ?, Unidad_Medida_idUnidad_Medida = ?, Unidad_Medida_idUnidad_Medida1 = ?, Unidad_Medida_idUnidad_Medida2 = ?, Valor_Ganacia = ?, IVA_idIVA = ?, Proveedores_idProveedores = ?, Productos_idProductos = ?, Tipo_Transaccion = ? WHERE idKardex = ?");
        return $stmt->execute([$estado, $fecha_transaccion, $cantidad, $valor_compra, $valor_venta, $unidad_medida1, $unidad_medida2, $unidad_medida3, $valor_ganancia, $iva, $proveedor, $producto, $tipo_transaccion, $id]);
    }

    public function delete($id) {
        global $pdo;
        $stmt = $pdo->prepare("DELETE FROM Kardex WHERE idKardex = ?");
        return $stmt->execute([$id]);
    }
}
?>
