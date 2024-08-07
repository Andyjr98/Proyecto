<?php
include '../config/db.php';

class DetalleFacturaController {
    public function create($factura, $producto, $cantidad, $valor_unitario, $iva) {
        global $pdo;
        $stmt = $pdo->prepare("INSERT INTO Detalle_Factura (Factura_idFactura, Productos_idProductos, Cantidad, Valor_Unitario, IVA_idIVA) VALUES (?, ?, ?, ?, ?)");
        return $stmt->execute([$factura, $producto, $cantidad, $valor_unitario, $iva]);
    }

    public function read() {
        global $pdo;
        $stmt = $pdo->query("SELECT * FROM Detalle_Factura");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function update($id, $factura, $producto, $cantidad, $valor_unitario, $iva) {
        global $pdo;
        $stmt = $pdo->prepare("UPDATE Detalle_Factura SET Factura_idFactura = ?, Productos_idProductos = ?, Cantidad = ?, Valor_Unitario = ?, IVA_idIVA = ? WHERE idDetalle_Factura = ?");
        return $stmt->execute([$factura, $producto, $cantidad, $valor_unitario, $iva, $id]);
    }

    public function delete($id) {
        global $pdo;
        $stmt = $pdo->prepare("DELETE FROM Detalle_Factura WHERE idDetalle_Factura = ?");
        return $stmt->execute([$id]);
    }
}
?>
